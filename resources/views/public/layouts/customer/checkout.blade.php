@extends('public.layouts.master')
<style>
    .cart_product {
        display: block;
        margin: 10px -25px 10px 25px!important;
    }
    .update, .check_out{
        margin-left: 0!important;
        margin-top: 0!important;
    }
    .check_out{
        margin-left: 20px!important;
    }
    .shopper-info p{
        font-size: 15px!important;
    }
    .shopper-info > form > select{
        background: #F0F0E9;
        border: 0 none;
        margin-bottom: 10px;
        padding: 10px;
        width: 100%;
        font-weight: 300;
    }
</style>

@section('content')

    <section id="cart_items">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Order</a></li>
                    <li class="active">Checkout</li>
                </ol>
            </div>
    </section>
    <section id="do_action">
            <div class="heading">
                <p>Please fill up your information</p>
            </div>
            <div class="row" style="margin:0!important;">
                <div class="shopper-info">
                    <form action="{{ url('order-submit') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="heading">
                            <h3>Shipping Information</h3>
                        </div>

                            <input type="hidden"  name="customer_id" value="{{ session('customer_id') }}">
                            <input type="text" placeholder="Your Name" name="customer_name" value="{{ session('customer_name') }}">
                            <input type="email" placeholder="Your Email" name="customer_email" value="{{ session('customer_email') }}">
                            <input type="text" placeholder="Your Address" name="customer_address" value="{{ session('customer_address') }}">
                            <input type="text" placeholder="Your Phone" name="customer_phone" value="{{ session('customer_phone') }}">
                        <div class="heading">
                            <h3>Delivery Type</h3>
                        </div>
                        <p>
                            <input type="checkbox" name="shipping_method" class="shipping_method" value="insight" checked>
                            Regular Home Delivery within 1 - 3 days in Dhaka City, Free</p>
                        <p>
                            <input type="checkbox" name="shipping_method" class="shipping_method" value="outside">
                            Regular Home Delivery within 1 - 3 days outside of Dhaka City, 200 BDT</p>
                        <p>
                            <input type="checkbox" name="shipping_method" class="shipping_method" value="express">
                            Express Home Delivery on same day in Dhaka City, 200 BDT</p>

                        <div class="heading">
                            <h3>Payment Method</h3>
                        </div>
                        <p><input type="checkbox" name="payment_method" class="payment_method" value="cod" checked> Cash On Delivery(COD)</p>

                        <br>
                        <p><input type="checkbox" name="agree_fg" checked> I agree with your <a href="#">terms and conditions</a>.</p>

                        <a class="btn btn-default update" href="{{ url('carts') }}">Back</a>
                        <button class="btn btn-default check_out confirm-order">Confirm</button>
                    </form>
                </div>
            </div>
    </section>

@endsection




