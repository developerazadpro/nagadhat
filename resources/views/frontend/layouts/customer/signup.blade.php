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
                    <li class="active">Signup</li>
                </ol>
            </div>
    </section>
    <section id="do_action">
            <div class="heading">
                <p>Please provide your information</p>
            </div>
            <div class="row" style="margin:0!important;">
                <div class="shopper-info">
                    <form action="{{ url('signup') }}" method="post">
                        @php csrf_token(); @endphp
                        <div class="heading">
                            <h3>Fill up the forms</h3>
                        </div>

                            <input type="hidden"  name="customer_id" value="{{ session('customer_id') }}">
                            <input type="text" placeholder="Your Name" name="customer_name" value="{{ session('customer_name') }}">
                            <input type="email" placeholder="Your email" name="customer_email" value="{{ session('customer_email') }}">
                            <input type="password" placeholder="Chose a Password" name="customer_pwd" required>
                            <input type="text" placeholder="Your Address" name="customer_address" value="{{ session('customer_address') }}">
                            <input type="text" placeholder="Your Phone" name="customer_phone" value="{{ session('customer_phone') }}">
                            <select name="customer_district" required>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Rangpur">Rangpur</option>
                            </select>



                        <br>
                        <p><input type="checkbox" name="agree_fg" checked> I agree with your <a href="https://www.daraz.com.bd/wow/i/bd/help-pages/terms-and-conditions" target="_blank">terms and conditions</a>.</p>

                        <a class="btn btn-default update" href="{{ url('carts') }}">Back</a>
                        <button class="btn btn-default check_out sign-up">Sign up</button>
                    </form>
                </div>
            </div>
    </section>

@endsection




