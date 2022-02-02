@extends('frontend.layouts.master')
<style>
    .cart_product {
        display: block;
        margin: 10px -25px 10px 25px!important;
    }
    .update, .check_out{
        margin-left: 0!important;
        margin-top: 0!important;
    }
    /*.check_out{
        margin-left: 20px!important;
    }*/
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
    .breadcrumbs .breadcrumb li a:after {
        left:75px!important;
    }
</style>

@section('content')

    <section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Customer</a></li>
                <li class="active">Login</li>
            </ol>
        </div>
    </section>
    <section id="do_action">
            <div class="heading">
                <p>Please provide your credentials</p>
                @if(session('error'))
                <p style="color: red">{{ session('error') }}</p>
                @endif
            </div>
            <div class="row" style="margin:0!important;">
                <div class="col-md-6 shopper-info">
                    <form action="{{ url('user-validate') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="email" placeholder="Email" name="customer_email">
                            <input type="password" placeholder="Password" name="customer_pwd">

                        <button class="btn btn-default check_out" type="submit" style="text-align: left;">Login</button>
                    </form>
                    <p>Don't have an account? <a href="{{ url('signup') }}">Signup</a></p>
                </div>
            </div>
    </section>

@endsection


