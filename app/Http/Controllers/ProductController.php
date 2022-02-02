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

    public function index()
    {

        $products  = $this->products;
        return view('frontend.layouts.home', compact('products'));
    }


    public function show($id)
    {
        $products  = $this->products;

        foreach ($products as $key => $list) {
            if($list['product_id'] == $id){
                $product = $list;
            }
        }
        return view('frontend.layouts.product_details', compact('product'));
    }


}
