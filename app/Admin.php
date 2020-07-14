<?php

namespace App;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    //

    use Notifiable;

    protected $guard = 'admin';

    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    public $incrementting = true;

    protected $fillable = [
        'username', 'email', 'password',
    ];

}
