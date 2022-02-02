@extends('frontend.layouts.master')
<style>
    .recommended-item-control i {
        background: none repeat scroll 0 0 #00BCD4!important;
    }
    .add-to-cart{
        padding: 4px 6px!important;
        font-size: 12px!important;
    }

</style>
@section('content')

    <div class="features_items">
        <h2 class="title text-center">New Arrival</h2>
            @foreach($products as $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="{{ url('product-details/'.$product['product_id']) }}"><img src="{{ $product['image_url'] }}" alt="" style="width: 200px;"/></a>
                            <h2>৳ {{ $product['price'] }}</h2>
                            <p>{{ $product['title'] }}</p>
                            <input type="hidden" class="qty" name="qty" value="1" min="1" max="10">
                            <input type="hidden" class="product-id" value="{{ $product['product_id'] }}">
                            <a href="{{ url('product-details/'.$product['product_id']) }}" class="btn btn-default add-to-cart">View Details</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
    </div>





@endsection
