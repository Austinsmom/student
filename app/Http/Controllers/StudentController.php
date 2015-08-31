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
        return Student::all();

    }

    public function showStudent($id)
    {
        return view('student', ['id' => $id]);
    }

}
