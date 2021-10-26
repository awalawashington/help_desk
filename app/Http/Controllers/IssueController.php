<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolDepartment;

class IssueController extends Controller
{
    public function index()
    {
        return view('students.students.help', [
            'school_department' => SchoolDepartment::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "department" => 'required',
            "title" => 'required|string|max:60',
            "message" => 'required|string|max:500',
            //'evidence' => ['required', 'mimes:jpeg,gif,bmp,png,pdf,jpg', 'max:2048']
        ]);

        //$evidence = $request->file('evidence');
        //$evidence_name = time()."_".  preg_replace('/\s+/', '_', strtolower($evidence->getClientOriginalName()));
        //$evidence->move(public_path('student/evidence'), $evidence_name);

        if ($request->department == 'department') {
            auth()->user()->course->course->course_department->issues()->create([
                'title' => $request->title,
                'body' => $request->message,
                'user_id' => auth()->id(),
                //'evidence' => $evidence_name
            ]);
        }elseif ($request->department == 'faculty') {
            
        }else {
            
        }

        return redirect()->route('student.help')->with('success','Message successfully sent');


    }
}
