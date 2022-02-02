<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class OrderDetails extends Model
{
    protected $table = 'orderchd';

    public function __construct() {
        parent::__construct();
    }
}
