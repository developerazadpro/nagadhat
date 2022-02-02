<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    public function __construct() {
        parent::__construct();
    }
    protected $fillable = [
        'name', 'email', 'password',
    ];



    protected $hidden = [
        'password', 'remember_token',
    ];



}
