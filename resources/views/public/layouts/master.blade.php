<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | EShop</title>
    <link href="{{ asset('assets/fontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontend/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{URL::TO('assets/fontend/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::TO('assets/fontend/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::TO('assets/fontend/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::TO('assets/fontend/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::TO('assets/fontend/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->
<style>
    @if(Request::is('/'))
        .left-sidebar h2{
            margin-top: 0!important;
        }
    @else
    .left-sidebar h2{
        margin-top: 30px!important;
    }
    @endif
     h2.title,
    .productinfo h2,
    .left-sidebar h2,
    .brands_products h2,
    .product-information span span  {
        color: #444c50;
    }

    .add-to-cart,
    .breadcrumbs .breadcrumb li a,
    .cart,.or,
    #cart_items .cart_info .cart_menu,
    .view-product h3,
    .update, .check_out,
    .login-form form button,
    .signup-form form button {
        background: #00BCD4;
        color: #f9f9f9;
    }
    .category-products .panel-default .panel-heading {
        background-color: #FFFFFF;
        border-bottom: 1px solid #ddd!important;
        color: #FFFFFF;
        padding: 8px 20px!important;
    }
    .breadcrumbs .breadcrumb li a:after{
        border-color: transparent transparent transparent #00BCD4;
    }
    .breadcrumbs .breadcrumb {
        margin-top: 22px;
        margin-bottom: 20px!important;
    }
    a#scrollUp {
     -webkit-animation: bounce 0s ease infinite;
     animation: bounce 0s ease infinite;
    }
    #cart_items .cart_info .cart_total_price{
        color: #000;
    }
    .shop-menu ul li a:active{
        color: #FFAC40;
    }
    .add-to-cart,
    .breadcrumbs .breadcrumb li a,
    .cart,
    .get ,
    .or,
    #cart_items .cart_info .cart_menu,
    .view-product h3,
    .update,
    .check_out,
    .login-form form button,
    .signup-form form button,
    .carousel-indicators li.active,
    .nav-tabs li.active a, .nav-tabs li.active a:hover, .nav-tabs li.active a:focus,
    .recommended-item-control i,
    .searchform button, .searchform button:focus,
    a#scrollUp{
        background: #0A27A9!important;
        color: #f9f9f9;
    }
    /* product details page */
    .add-to-cart{
        padding: 4px 6px!important;
        font-size: 12px!important;
    }
    /*.productinfo img {
        width: 100px!important;
        height: 115px!important;
    }*/
    /*.view-product img{*/
    /*width: 100%;*/
    /*height: 230px!important;*/
    /*}*/
    .item-control i{
        background: #0A27A9!important;
    }
    .breadcrumbs .breadcrumb li a:after {
        border-color: transparent transparent transparent #1d1baf!important;
    }
    /* product details page */
</style>
<body>
<header id="header"><!--header-->

    @include('public.inc.header')

</header><!--/header-->



<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">

                </div>
            </div>

            <!-- main dynamic content -->
            <div class="col-sm-9 padding-right" style="margin-top: 50px">
                @yield('content')
            </div>
            <!--/. main content -->
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->


</footer><!--/Footer-->


<script src="{{ asset('assets/fontend/js/jquery.js') }}"></script>
<script src="{{ asset('assets/fontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/fontend/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('assets/fontend/js/price-range.js') }}"></script>
<script src="{{ asset('assets/fontend/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('assets/fontend/js/main.js') }}"></script>

@include('public.inc.global_script');
</body>
</html>
