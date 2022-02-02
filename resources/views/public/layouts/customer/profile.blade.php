@extends('public.layouts.master')
<style>
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

    .breadcrumbs .breadcrumb li a:after {
        left:75px!important;
    }
    .success-msg{
        background-color: lightgray;
        width: 75%;
        padding: 3px 195px;
    }
</style>

@section('content')

    <section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Customer</a></li>
                <li class="active">Profile</li>
                @if(session('success'))
                <li class="pull-right success-msg text-success">{{ session('success') }}</li>
                @endif
            </ol>
        </div>
    </section>
    <section id="do_action">
            <div class="row" style="margin:0!important;">
                <div class="col-md-3">
                    @include('public.layouts.customer.menus')
                </div>
                <div class="col-md-9">
                    <div class="shopper-info">
                        <table class="table no-border table-hover table-responsive">
                            <tr>
                                <td>Full Name</td>
                                <td>: {{ $customer->customer_name }}</td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td>: {{ $customer->customer_email }}</td>
                            </tr>
                            <tr>
                                <td>District</td>
                                <td>: {{ $customer->customer_district }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>: {{ $customer->customer_address }}</td>
                            </tr>
                            <tr>
                                <td>Contact</td>
                                <td>: {{ $customer->customer_phone }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
    </section>

@endsection
<script>
    setTimeout(function () {
        $('.success-msg').hide();
    },5000);
</script>


