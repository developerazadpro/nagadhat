<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_module_links', function (Blueprint $table) {
            $table->increments('module_link_id');
            $table->string('module_link_name');
            $table->integer('module_id');
            $table->string('route_url');
            $table->string('controller_method');
            $table->string('method_type')->nullable();
            $table->string('module_link_type')->nullable();
            $table->integer('userdsl_no')->nullable();
            $table->integer('active_fg');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('module_links');
    }
}
