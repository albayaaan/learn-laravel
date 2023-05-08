<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $student = new Student;
        $student->full_name = $request->full_name;
        $student->gender = $request->gender;
        $student->save();

        return response()->json($student);
        // return response()->json(['msg' => 'success']);
    }
}
