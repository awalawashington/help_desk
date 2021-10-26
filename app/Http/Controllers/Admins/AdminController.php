<?php

namespace App\Http\Controllers\Admins;

use App\Models\Help;
use App\Models\User;
use App\Models\Admin;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Models\CourseDepartment;
use App\Models\SchoolDepartment;
use App\Rules\CheckSamePassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function index()
    {

        $department = auth()->user('admin')->adminable_type::findOrFail(auth()->user('admin')->adminable_id);
        
        return view('admin.admin.dashboard',[
            'users' => User::orderByDesc('id')->get(),
            'issues' => $department->helps
        ]);
    }

    public function settingsView()
    {   
        return view('admin.admin.settings');
    }

    public function updatePassword(Request $request)
    {
        
        //current password
        //new password
        //password confirmation
        
        $this->validate($request,[
            'current_password' => ['required',new MatchOldPassword],
            'password' => [
                'required', 
                'confirmed',
                Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised(),
                 new CheckSamePassword
                 ]
            ]);

            auth()->user('admin')->update([
                "password" => bcrypt($request->password) 
            ]);

            return redirect()->route('admin.settings')->with('success','Password changed successfully');

    }


    public function issue($id)
    {
        return view('admin.admin.issue', [
            'issue' => Help::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {

        
        $this->validate($request,[
            "response" => 'required|string|max:500',
            'issue' => 'required'
        ]);

        $issue = Help::findOrFail($request->issue);

        $issue->update([
            'response' => $request->response,
            'admin_id' => auth()->id(),   
        ]);


        return redirect()->back()->with('success','Response sent successfully');

    }

    public function adminsView()
    {
        return view('admin.admin.admins', [
            'admins' => Admin::all(),
            'school_departments' => SchoolDepartment::all(),
            'course_departments' => CourseDepartment::all(),
            'faculties' => Faculty::all()
        ]);
    }

    public function storeAdmin(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string'],
            'phone_number' => ['required', 'numeric', 'unique:admins'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $pieces = explode("-", $request->department);
        $department = $pieces[0]; 
        $id = $pieces[1]; 

        
        if ($department == 'department') {
            $department = CourseDepartment::findOrFail($id);
            $department->admins()->create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }elseif ($department == 'faculty') {
            $department = Faculty::findOrFail($id);
            $department->admins()->create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            
        }else {
            $department = SchoolDepartment::findOrFail($id);
            $department->admins()->create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->back()->with('success','Admin added successfuly');

    }


}
