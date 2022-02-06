<?php

namespace App\Http\Controllers;


use App\Order;
use App\OrderDetails;
use App\OrderManage;
use Illuminate\Http\Request;
use App\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{

    public function index()
    {
        $customerId = session('customer_id');
        $customer   = Customer::find($customerId);
        return view('frontend.layouts.customer.profile', compact('customer'));
    }


    public function login(){
        return view('frontend.layouts.customer.login');
    }
    public function userValidation(Request $request){
        $email     = $request->input('customer_email');
        $password  = $request->input('customer_pwd');
        $checkUser = Customer::where('customer_email',$email)->first();

        if($checkUser){
            $checkPassword = Hash::check($password, $checkUser->customer_pwd);
            if($checkPassword){
                Session::put([
                    'customer_id'      => $checkUser->id,
                    'customer_email'   => $checkUser->customer_email,
                    'customer_name'    => $checkUser->customer_name,
                    'customer_address' => $checkUser->customer_address,
                    'customer_phone'   => $checkUser->customer_phone
                ]);
                if(Cart::count() > 0) {
                    return redirect('checkout');
                }else{
                    return redirect('customer-profile')->with('success', 'Successfully logged in');
                }
            }else{
                return redirect('customer-login')->with('error', 'Invalid username or password');
            }
        }else{
            return redirect('customer-login')->with('error', 'Invalid username or password');
        }
    }

    public function orderSubmit(Request $request){
        $customer = array(
            'customer_name'     => $request->input('customer_name'),
            'customer_email'    => $request->input('customer_email'),
            'customer_pwd'      => Hash::make($request->input('customer_pwd')),
            'customer_address'  => $request->input('customer_address'),
            'customer_district' => $request->input('customer_district'),
            'customer_phone'    => $request->input('customer_phone')
        );
        $customerId = $request->input('customer_id');

        $totalAmount = Cart::total();
        $total = str_replace(',','', $totalAmount);
        // user define order no
        $udorderNo = rand(10000, 99999);
        $orderMst = new OrderManage();
        $orderMst->customer_id = $customerId;
        $orderMst->udorder_no  = $udorderNo;
        $orderMst->order_place = $request->input('customer_address');
        $orderMst->contact_no  = $request->input('customer_phone');
        $orderMst->order_date  = date('Y-m-d');
        $orderMst->order_total = $total;
        $orderMst->shipping_method = $request->input('shipping_method');
        $orderMst->payment_method = $request->input('payment_method');


        $orderMst->save();
        $carts = Cart::content();
        $orderChd = array();
        foreach ($carts as $cart){
                $orderDetails = new OrderDetails();
                $orderDetails->ordermst_id = $orderMst->id;
                $orderDetails->product_id  = $cart->id;
                $orderDetails->product_title = $cart->name;
                $orderDetails->product_image = $cart->options->image_url;
                $orderDetails->product_qty = $cart->qty;
                $orderDetails->unit_price = $cart->price;
                $orderDetails->subtotal_price = $cart->total;
                $orderDetails->save();


        }

        if($orderDetails){
            Cart::destroy();
            Session::put([
                'customer_id'    => $customerId,
                'customer_email' => $request->input('customer_email'),
                'customer_name'  => $request->input('customer_name'),
                'customer_phone' => $request->input('customer_phone')
            ]);
            return redirect('order-tracking');

        }

    }

    public function signUp(){
        return view('frontend.layouts.customer.signup');

    }

    public function signUpSubmit(Request $request){
        $customer = new Customer();
        $customer->customer_name = $request->input('customer_name');
        $customer->customer_email = $request->input('customer_email');
        $customer->customer_pwd = Hash::make($request->input('customer_pwd'));
        $customer->customer_address = $request->input('customer_address');
        $customer->customer_district = $request->input('customer_district');
        $customer->customer_phone = $request->input('customer_phone');
        if($customer->save()){
            Session::put([
                'customer_id'    => $customer->id,
                'customer_email' => $request->input('customer_email'),
                'customer_name'  => $request->input('customer_name'),
                'customer_phone' => $request->input('customer_phone')
            ]);
            return redirect('customer-profile');
        }else{
            return redirect('customer-login')->with('error', 'Invalid username or password');
        }


    }

    // customer profile update
    public function updateProfile(Request $request){
        $customerId = session('customer_id');
        $customer   = Customer::find($customerId);

        if($_POST){
            $data = array(
                'customer_name'     => $request->input('customer_name'),
                'customer_email'    => $request->input('customer_email'),
                'customer_address'  => $request->input('customer_address'),
                'customer_district' => $request->input('customer_district'),
                'customer_phone'    => $request->input('customer_phone')
            );
            $customer = Customer::find($customerId)->update($data);
            if($customer) {
                return redirect('customer-profile')->with('success', 'Profile updated successfully.');
            }
        }
        return view('frontend.layouts.customer.updateProfile', compact('customer'));
    }

    // order status tracking
    public function orderTrack(){
        $customerId = session('customer_id');
        $orders     = OrderManage::where('customer_id',$customerId)->where('order_status', '!=', 'D')->get();
        return view('frontend.layouts.customer.orders', compact('orders'));
    }


    public function orderDetails($orderId){
        $order_details = OrderDetails::where('ordermst_id', $orderId)->get();
        return view('frontend.layouts.customer.order_details', compact('order_details'));
    }

}
