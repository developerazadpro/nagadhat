<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderManage extends Model
{

    protected $table = 'ordermst';

    public function __construct() {
        parent::__construct();
    }


}
