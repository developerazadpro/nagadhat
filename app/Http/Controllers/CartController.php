<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('public.layouts.customer.carts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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


    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rowId = $id;
        $qty   = $request->input('qty');
        Cart::update($rowId, $qty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('carts');
    }


    public function checkout(){
        return view('public.layouts.customer.checkout');
    }


}
