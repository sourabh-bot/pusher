<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Role;
use App\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    //
    public function index(){
        $roles = Role::all('id', 'name')->sortBy('name');
        return view('employee.employee', ['roles'=>$roles]);
    }

    public function add(Request $request){
        $name =  $request->name;
        $empolyee = new Employee;
        $empolyee->name = $name;
        $empolyee->save();
        $empolyee->refresh();
        $roles = $request->role;
        foreach($roles as $role){
            
            // $role_emp->employees_id = $empolyee->id;
            // $role_emp->roles_id = $role;
            // $role_emp->save();
            DB::table('employee_role')->insert(
                ['employee_id'=>$empolyee->id,
                 'role_id'=>$role,
                ]
            );
        }

        return "Employee Add";
    }

    public function show($id){
        return Employee::find($id)->roles;
    }
}
