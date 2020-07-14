<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_role', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function receivesBroadcastNotificationsOn()
    // {
    //     return 'users.'.$this->id;
    // }

    public function create_admin_user(array $details): array{
        // $user = new self();
        if($this->checkAdminExistOrNot($details['email'])){
            return array('result'=> false, 'msg'=>'User already exist');
        }else{
            $user = new self($details);
            $user->user_role = 'admin';
            $user->save();
            return array('result'=> true, 'msg'=>'Admin created successfully');
        }

    }

    public function checkAdminExistOrNot($email): int{
        return self::where('email', $email)->count();
    }

}
