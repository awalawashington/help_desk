<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        $this->validate($request,[
            "course" => 'required|string',
            "department" => 'required|string',
            'faculty' => 'required|string',
            'year' => 'required|string',
            'semister' => 'required|string'
        ]);



        $user =  $user->course()->create([
            "course" => $request->course,
            "department" => $request->department,
            'faculty' => $request->faculty,
            'year' => $request->year,
            'semister' => $request->semister

        ]);

        return redirect()->route('student.settings')->with('success','Succesfully submitted your course information.');

    }

}
