@extends('frontend.layouts.master')
<style>
    .add-cart {
        padding: 4px 6px!important;
        font-size: 12px!important;
    }
</style>
@section('content')

    <section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Product Details</li>
            </ol>
        </div>
    </section>
    <div class="padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{ $product['image_url'] }}" alt="product-photo">

                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Controls -->
                    <a class="left item-control" href="#similar-product" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right item-control" href="#similar-product" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <h2>{{ $product['title'] }}</h2>
                    <p style="text-align: justify;"><b>Product Description:</b> {{ $product['description'] }}</p>

                    <span>
                            <span style="font-size: 25px;">৳ {{ $product['price'] }}</span>
                            <label>Quantity:</label>
                            <input type="number" class="qty" name="qty" value="1" min="1" max="10">
                            <input type="hidden" class="product-id" value="{{ $product['product_id'] }}">
                            <input type="hidden" class="product-title" value="{{ $product['title'] }}">
                            <input type="hidden" class="product-price" value="{{ $product['price'] }}">
                            <input type="hidden" class="product-image-url" value="{{ $product['image_url'] }}">
                            @if(Session::get('customer_name'))
                            <button type="button" class="btn btn-default cart add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                            @else
                            <a href="{{ url('customer-login') }}"><button type="button" class="btn btn-default cart add-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button></a>
                            @endif
					</span>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

    </div>


@endsection
