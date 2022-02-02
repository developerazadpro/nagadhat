@extends('frontend.layouts.master')


@section('content')
    <style>
        .cart_product {
            display: block;
            margin: 10px -25px 10px 25px!important;
        }
    </style>

    <section id="cart_items">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="quantity">Quantity</td>
                        <td class="price">Unit Price</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @php $carts = Cart::content(); @endphp
                    @foreach($carts as $cart)
                    <tr>
                        <td class="cart_product">
                            <a href="{{ url('product-details/'.$cart->id) }}"><img src="{{ $cart->options->image_url }}" style="height: 110px;width: 110px;" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href=""> {{ $cart->name }}</a></h4>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_down update-cart" data-status="dec" href=""> - </a>
                                <input class="cart_quantity_input qty" type="text" name="quantity" value="{{ $cart->qty }}" autocomplete="off" size="2">
                                <input class="rowId" type="hidden" name="rowId" value="{{ $cart->rowId }}" >
                                <a class="cart_quantity_up update-cart" data-status="inc" href=""> + </a>
                            </div>
                        </td>
                        <td class="cart_price">
                            <h4>৳ {{ $cart->price }}</h4>
                        </td>

                        <td class="cart_total">
                            <h4>৳ {{ $cart->total }}</h4>
                        </td>
                        <td class="cart_delete" style="margin-right: 0!important;">
                            <a class="cart_quantity_delete" href="{{ url('remove-cart/'.$cart->rowId) }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach

                    <tr class="bg-success">
                        <td class="text-center"><h4>Cart Sub Total</h4></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h4>৳ {{ Cart::subtotal() }}</h4></td>
                    </tr>
                    </tbody>
                </table>
            </div>
    </section>
    <section id="do_action">

            <div class="row" style="margin:0!important;">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>৳ {{ Cart::subtotal() }}</span></li>
                        <li>Tax <span>৳ {{ Cart::tax() }}</span></li>
                        <li>Shipping Cost <span>৳ 0.00</span></li>
                        <li>Total <span>৳ {{ Cart::total() }}</span></li>
                    </ul>
                    <a class="btn btn-default update" href="{{ url('/') }}">Continue Shopping</a>
                    <a class="btn btn-default check_out pull-right" href="{{ url('checkout') }}">Check Out</a>
                </div>
            </div>
    </section>

@endsection


