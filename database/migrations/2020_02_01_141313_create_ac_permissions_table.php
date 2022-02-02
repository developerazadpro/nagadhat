<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_permissions', function (Blueprint $table) {
            $table->increments('permission_id');
            $table->integer('user_group_id');
            $table->integer('module_link_id');
            $table->integer('create_fg')->default(0);
            $table->integer('read_fg')->default(0);
            $table->integer('update_fg')->default(0);
            $table->integer('delete_fg')->default(0);
            $table->integer('active_fg')->default(0);
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
        Schema::dropIfExists('ac_permissions');
    }
}
