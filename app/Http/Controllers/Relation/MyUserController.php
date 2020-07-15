<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\OneToOne\Image;
use App\OneToOne\MyUser;
use Illuminate\Http\Request;

class MyUserController extends Controller
{
    //
    public function index(){
        return view('relation.user');
    }

    public function create(Request $request){
        $name = $request->name;
        $img = $request->image;

        $user = new MyUser();
        $user->name = $name;
        $user->save();
        $user->refresh();

        $image = new Image();
        $image->name = $img;
        $image->imageable_id = $user->id;
        $image->imageable_type = MyUser::class;
        $image->save();

        return "User is created";
    }

    public function getImg($id){
        $user = MyUser::find($id);
        return $user->image;
    }
}
