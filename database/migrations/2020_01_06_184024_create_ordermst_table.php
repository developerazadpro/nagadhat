<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdermstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordermst', function (Blueprint $table) {
            $table->increments('ordermst_id');
            $table->integer('customer_id');
            $table->string('udorder_no');
            $table->string('order_place');
            $table->string('contact_no');
            $table->date('order_date');
            $table->float('order_total');
            $table->string('shipping_method');
            $table->string('payment_method');
            $table->string('order_status')->default('P'); // 'P' for 'Pending', 'R' for 'Received', 'PR' for 'Processing', 'D' for 'Delivered'
            $table->integer('agree_fg')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordermst');
    }
}
