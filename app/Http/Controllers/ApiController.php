<?php

namespace App\Http\Controllers;

use App\Studentmodel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    //
    public function create(Request $request)
    {

        $data = array();
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:55',
            'lastname' => 'required|max:55',
            'email' => 'email|required|unique:students',
            'password' => 'required|min:6',

        ]);



        if ($validator->fails()){
            return response()->json(['status' => 'error','message' => 'invalid data', 'data' => $data], 400);
        }

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $students = Studentmodel::create($data);
        unset($students['password']);
        unset($students['updated_at']);
        unset($students['created_at']);

        return response()->json(['status' => 'success', 'message' => 'Student added', 'data' => $students], 200);
    }

    public function getstudent()
    {

        // $students = Studentmodel::all();

        $students = DB::table('students')->get();

        return response()->json($students);
    }

    public function getStudentById($id)
    {

        $students = Studentmodel::find($id);

        return response()->json($students);
    }

    public function deleteStudentById($id)
    {

        $students = Studentmodel::find($id);

        $students->delete();

        return response()->json($students);
    }

    public function updateStudentById(Request $request)
    {

        $student = DB::table('students')->where('email', $request->input('email'));
        $result = $student->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname')
        ]);

        return response()->json($result);
    }
}
