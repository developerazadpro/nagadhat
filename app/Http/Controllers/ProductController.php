<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $products;

    public function __construct()
    {
        $this->products = json_decode(file_get_contents(public_path('file/product-list.json')), true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products  = $this->products;
        return view('public.layouts.home', compact('products'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PublicProduct  $fontend
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products  = $this->products;

        foreach ($products as $key => $list) {
            if($list['product_id'] == $id){
                $product = $list;
            }
        }
        return view('public.layouts.product_details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PublicProduct  $fontend
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
     * @param  \App\PublicProduct  $fontend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PublicProduct  $fontend
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    }
