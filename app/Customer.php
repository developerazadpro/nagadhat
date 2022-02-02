<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['customer_name', 'customer_email','customer_pwd' ,'customer_address','customer_phone','customer_district'];



}
