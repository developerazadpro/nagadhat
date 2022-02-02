<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function index()
    {

        return view('frontend.layouts.customer.carts');
    }



    public function store(Request $request)
    {
        $productId   = $request->input('productId');
        $qty         = $request->input('qty');
        $title       = $request->input('title');
        $price       = $request->input('price');
        $image_url   = $request->input('imageUrl');

        $data = Cart::add([
            'id'     => $productId,
            'name'   => $title,
            'qty'    => $qty,
            'price'  => $price,
            'options'=> array(
                'image_url' => $image_url,
            )
        ]);
        if($data){
            echo json_encode(array(
                'qty' => Cart::count()
            ));
        }


    }

    public function update(Request $request, $id)
    {
        $rowId = $id;
        $qty   = $request->input('qty');
        Cart::update($rowId, $qty);
    }


    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('carts');
    }


    public function checkout(){
        return view('frontend.layouts.customer.checkout');
    }


}
