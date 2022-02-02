<?php

namespace App\Http\Controllers;

use App\OrderManage;
use Illuminate\Http\Request;

class OrderManageController extends Controller
{

    public function index()
    {
        $header =[
            'title'      => 'Ordered Product',
            'pageTitle'  => 'List',
            'modalSize'  => 'modal-lg',
         ];
        $orders = OrderManage::all();
        return view('backend.layouts.orderManage.pending', compact('orders','header'));
    }


    public function show($id)
    {
        $order = OrderManage::find($id);
        return view('backend.layouts.orderManage.details', compact('order'));
    }



}
