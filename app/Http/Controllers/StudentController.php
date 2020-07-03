<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DB;
class StudentController extends Controller
{
    public function index()
    {
        echo "hello World";
        $users = Student::get();
       // return view('user.index', ['users' => $users]);
    }

    public function addStudent(Request $request)
    {
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration. error:" . $e );
        }
       
        $student = new Student;
        $student->salutation = $request->salutation;
        $student->first_name = $request->firstName;
        $student->last_name = $request->lastName;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
       
    }
}
