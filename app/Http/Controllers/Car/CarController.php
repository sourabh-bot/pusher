<?php

namespace App\Http\Controllers\Car;

use App\Car;
use App\Http\Controllers\Controller;
use App\Mechanic;
use App\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    public function index(){
        $mechanics = Mechanic::all('id', 'name')->sortBy('name');
        return view('car.car', ['mechanics'=>$mechanics]);
    }

    public function add(Request $request){
        $car = new Car();
        $car->model = $request->model;
        $car->mechanic_id = $request->mechanic_id;
        $car->save();
        $car->refresh();

        $owner = new Owner();
        $owner->name = $request->owner;
        $owner->car_id = $car->id;
        $owner->save();

        return "Car is add";
    }
}
