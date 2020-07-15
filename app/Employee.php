<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function roles(){
        // return $this->belongsToMany(Role::class);
        return $this->belongsToMany(Role::class, 'role_users')->using(RoleUser::class);
    }
}
