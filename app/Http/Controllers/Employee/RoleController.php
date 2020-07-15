<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index(){
        return view('employee.role');
    }

    public function add(Request $request){
        $role = new Role;
        $role->name = $request->name;
        $role->save();
        return $role->name." is add";
    }

    public function show($id){
        return Role::find($id)->users;
    }
}
