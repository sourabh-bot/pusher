<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\OneToOne\Image;
use App\OneToOne\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        return view('relation.post');
    }

    public function create(Request $request){
        $name = $request->name;
        $img = $request->image;

        $post = new Post();
        $post->name = $name;
        $post->save();
        $post->refresh();

        $image = new Image();
        $image->name = $img;
        $image->imageable_id = $post->id;
        $image->imageable_type = Post::class;
        $image->save();

        return "Post is created";
    }

    public function getImg($id){
        $user = Post::find($id);
        return $user->image;
    }
}
