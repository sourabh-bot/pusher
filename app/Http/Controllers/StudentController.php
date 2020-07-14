<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    public function index(){
        $classes = DB::table('student_classes')->select('id', 'name')->orderBy('name')->get();
        return view('student.student', ['classes'=>$classes]);
    }

    public function insert(Request $request){
       $student = new Student;
       $student->name = $request->name;
       $student->email = $request->email;
       $student->student_class_id = $request->class_id;

       if($student->save())
            echo "Student is add";
        else
            echo "Student is not add";

    }

    public function getClassWithStudent($id){
        return StudentClass::find($id)->student_class;
    }

    
}
