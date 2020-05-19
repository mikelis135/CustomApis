<?php

namespace App\Http\Controllers;

use App\Studentmodel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
    public function create(Request $request){

        $students = new Studentmodel();

        $students->firstname = $request->input('firstname');
        $students->lastname = $request->input('lastname');
        $students->email = $request->input('email');
        $students->password = $request->input('password');

        $students->save();

        return response()->json($students);

    }

    public function getstudent(){

        // $students = Studentmodel::all();

        $students = DB::table('students')->get();

        return response()->json($students);

    }

    public function getStudentById($id){

        $students = Studentmodel::find($id);

        return response()->json($students);

    }

    public function deleteStudentById($id){

        $students = Studentmodel::find($id);

        $students -> delete();

        return response()->json($students);

    }

    public function updateStudentById(Request $request){

        $student = DB::table('students')->where('email', $request -> input('email'));
        $result = $student->update(['firstname' => $request -> input('firstname'), 
        'lastname' => $request -> input('lastname')
        ]);

        return response()->json($result);

    }

}
