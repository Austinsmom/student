<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{

    public function show()
    {
        $students = Student::all();

//        dd($students);

        return view('student.index', compact('students'));

    }

    public function showStudent($id)
    {
        $student = Student::find($id);

        return view('student.single', compact('student'));
    }

}
