@extends('backend.layouts.master')
<?php
    use App\Customer AS Customer;
?>
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="bg-primary">
                                <tr>
                                    <td>Sl.</td>
                                    <td>Customer Name</td>
                                    <td>Order No</td>
                                    <td>Order Total</td>
                                    <td>Order Date</td>
                                    <td>Status</td>
                                    <td>Details</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $row)
                                <?php
                                $customer_name = "-";
                                $customer__ = Customer::find($row->customer_id);
                                if( !empty($customer__) ) {
                                    $customer_name = $customer__->customer_name;
                                }
                                ?>
                                <tr>
                                    <td> {{ ++$key }} </td>
                                    <td> {{ $customer_name }} </td>
                                    <td> Order# {{ $row->udorder_no }} </td>
                                    <td> ৳ {{ number_format($row->order_total,2) }} </td>
                                    <td> {{ date('d-M-Y', strtotime($row->order_date)) }} </td>
                                    <td>
                                        <button class="btn btn-xs btn-danger">Pending</button>
                                    </td>
                                    <td style="text-align: center;">
                                        <button type="button" data-toggle="modal" data-action="{{ url('order-details-view/'.$row->id) }}" data-modal="{{ $header['modalSize'] }}" data-title="View Order Details" data-target="#myModal" class="btn btn-info btn-xs modal-link">view</button>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


@endsection
