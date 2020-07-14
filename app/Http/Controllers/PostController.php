<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Swift_Plugins_Loggers_EchoLogger;

class PostController extends Controller
{
    //

    public function index(Request $request){
        $responsed = Gate::inspect('create-post');
        if($responsed->allowed()){
            echo $responsed->message();
        }else{
            echo $responsed->message();
        }
    }

    public function update(Request $request){ 
        // if(Gate::allows('update-post')){
        //     echo "Allowed";
        // }else{
        //     echo "Not Allowed";
        // }

        // echo dd($post);
        // if(auth)

        // $responsed = Gate::inspect('update-post');
        // if($responsed->allowed()){
        //     echo $responsed->message();
        // }else{
        //     echo $responsed->message();
        // }
        // echo dd($responsed);

        if(Gate::denies('update-post')){
            echo "Not Allowed";
        }else{
            echo "Allow";
        }
        
    }

    public function view(){
        // if(Gate::allows('view-post')){
        //     echo "Allow";
        // }else{
        //     echo "Not Allow";
        // }
        echo "Allowed";
        // echo dd(Gate::allows('view-post'));
    }   
}
