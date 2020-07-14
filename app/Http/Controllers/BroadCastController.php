<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use Illuminate\Http\Request;

class BroadCastController extends Controller
{
    //

    public function index(){
        $con = true;
        // while($con){
        //     event(new SendMessage('This is broadcast message'));
        // }
        event(new SendMessage('This is broadcast message'));
        
        // return view('broadcast');
    }

    public function view(){
        return view('broadcast');
    }
}
