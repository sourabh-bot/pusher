<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    // protected $redirectTo = RouteServiceProvider::H;
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        return view('admin.register');
    }

    public function save(Request $request){
        // $request->validate([
        //     'username'=>'required',
        //     'email'=>'required',
        //     'password'=>'required'
        // ])
        $admin = new Admin;
        $admin->username = $request->username;
        $admin->email= $request->email;
        $admin->password = Hash::make($request->password);
        if($admin->save()){
            $con = $request->only('email', 'password');
            if(Auth::guard('admin')->attempt($con)){
                return redirect()->intended(route('dashboard'));
            }else{
                echo "error";
            }
        }
            
        else
            echo "Some error";
    }
}
