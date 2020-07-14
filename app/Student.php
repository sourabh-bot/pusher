<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    public function student_class(){
        return $this->belongsTo(StudentClass::class);
    }
}
