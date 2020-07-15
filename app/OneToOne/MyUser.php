<?php

namespace App\OneToOne;

use Illuminate\Database\Eloquent\Model;

class MyUser extends Model
{
    //
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
