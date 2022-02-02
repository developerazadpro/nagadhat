<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderchdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderchd', function (Blueprint $table) {
            $table->increments('orderchd_id');
            $table->integer('ordermst_id');
            $table->integer('product_id');
            $table->integer('product_qty');
            $table->float('unit_price');
            $table->float('subtotal_price');
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
        Schema::dropIfExists('orderchd');
    }
}
