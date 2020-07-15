<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    //

    public function carOwner(){
        return $this->hasManyThrough(Owner::class, Car::class);
    }
}
