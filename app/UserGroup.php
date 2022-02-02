<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserGroup extends Model
{
    protected $table = 'user_groups';

    public function __construct() {
        parent::__construct();
    }


}
