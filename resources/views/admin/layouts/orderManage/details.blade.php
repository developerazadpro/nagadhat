<?php
    use App\Customer AS Customer;
    use App\OrderDetails AS OrderDetails;
?>
<div class="box-body">

    <div class="row">
        <div class="col-md-6 col-lg-6">
            <h4 class="text-left" style="font-weight: bold;">Order Info:</h4>
            <hr>
            <p>Order No # {{ $order->udorder_no }}</p>
            <p>Order Date:  {{ date('d-M-Y', strtotime($order->order_date)) }} </p>
            <p>Order Status:
                @if($order->order_status==='P')
                    <button class="btn btn-xs btn-danger">Pending</button>
                @elseif($order->order_status==='R')
                    <button class="btn btn-xs btn-primary">Received</button>
                @elseif($order->order_status==='PR')
                    <button class="btn btn-xs btn-info">Processing</button>
                @elseif($order->order_status==='D')
                    <button class="btn btn-xs btn-success">Delivered</button>
                @endif
            </p>
            <p>Order Total: ৳ {{ number_format($order->order_total,2) }}</p>
        </div>

        <div class="col-md-6 col-lg-6">
            <?php
                $customer_name = "-";
                $customer__ = Customer::find($order->customer_id);
                if( !empty($customer__) ) {
                    $customer_name = $customer__->customer_name;
                }
                $orderDetails = OrderDetails::where('ordermst_id',$order->id)->get();
            ?>
            <h4 class="text-left" style="font-weight: bold;">Shipping Address:</h4>
            <hr>
            <p>Name:  {{ $customer_name }} </p>
            <p>Address:  {{ $order->order_place }} </p>
            <p>Contact:  {{ $order->contact_no }} </p>
            <p>Payment Type:
                @if($order->payment_method==='cod')
                    <button class="btn btn-xs btn-primary">COD</button>
                @elseif($order->payment_method==='bkash')
                    <button class="btn btn-xs btn-primary">bKash</button>
                @endif
            </p>
        </div>
    </div>
    <h4 style="font-weight: bold;">Product(s) Details:</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-hover col-md-12 col-lg-12 col-sm-12 col-xm-12" width="100%" cellspacing="0">
            <thead>
            <tr style="background-color: #e6e5dd;">
                <th>Sl.</th>
                <th>Name</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Sub Total</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orderDetails as $key => $row)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $row->product_title }}</td>
                    <td><a href="{{ $row->product_image }}" target="_blank"><img src="{{ $row->product_image }}" class="img-responsive" alt="Product Image" style="width: 45px;height: 30px;"></a></td>
                    <td>{{ $row->product_qty }}</td>
                    <td>৳ {{ number_format($row->unit_price,2) }}</td>
                    <td>৳ {{ number_format($row->subtotal_price,2) }}</td>
                </tr>
                @endforeach
            <tr>
                <td colspan="5"><strong>Total Amount To Pay</strong></td>
                <td><strong> ৳ {{ number_format($order->order_total, 2) }}</strong></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="box-footer" style="border-top: 0!important;float: right;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>


</div>
