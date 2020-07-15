<?php

namespace App\OneToOne;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public function imageable(){
        return $this->morphTo();
    }
}
