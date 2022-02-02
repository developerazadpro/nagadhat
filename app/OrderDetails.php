<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class OrderDetails extends Model
{
    protected $table = 'orderchd';

    public function __construct() {
        parent::__construct();
    }
}
