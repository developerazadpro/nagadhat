<section id="do_action">
    <div class="row" style="margin:0!important;">
           <div class="shopper-info">
                <div class="table-responsive">
                    <table class="table table-responsive table-bordered table-hover">
                        <thead>
                        <tr style="background-color: #F0F0E9;">
                            <td>Sl.</td>
                            <td>Photo</td>
                            <td>Product Name</td>
                            <td>Order Qty</td>
                            <td>Unit Price</td>
                            <td>Sub Total</td>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- pending orders-->
                        @if(isset($order_details))
                            @foreach($order_details as $key => $order)
                                <tr>
                                    <td> {{ ++$key }} </td>
                                    <td><img src="{{ $order->product_image }}" alt="product_photo" width="40px" height="40px"></td>
                                    <td>{{ $order->product_title }}</td>
                                    <td class="text-center">{{ $order->product_qty }}</td>
                                    <td class="text-right"> ৳ {{ number_format($order->unit_price,2) }}</td>
                                    <td class="text-right"> ৳ {{ number_format($order->subtotal_price,2) }}</td>
                                </tr>
                            @endforeach
                        @endif
                        <!--/. pending orders -->
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</section>
