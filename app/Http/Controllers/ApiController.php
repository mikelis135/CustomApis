<?php

namespace App\Http\Controllers;

use App\Studentmodel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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

        $students = Studentmodel::all();

        return response()->json($students);

    }
}
