<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\OneToOne\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function index($id){
        return Image::find($id)->imageable;
    }
}
