<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

use App\StudentClass;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class StudentClassController extends Controller
{
    //
    public function index(){
        
        return view('student.class');
    }

    public function insert(Request $request){
        $class = new StudentClass;
        $class->name = $request->name;
        

        if($class->save())
            echo "Class is add";
        else
            echo "Class is not add";
    }

    public function getStudentWithClass($id){
        $studet_class = StudentClass::find($id)->student()->where('name', 'Chirag')->first();
        return $studet_class;
    }
}
