<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    //
    public function index(){
        return view('car.mechanic');
    }

    public function add(Request $request){
        $mechanic = new Mechanic;
        $mechanic->name = $request->name;
        $mechanic->save();
        return $mechanic->name." is add";
    }

    public function getCarOwner($id){
        return Mechanic::find($id)->carOwner;
    }
}
