<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Rules\CheckSamePassword;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;

class SettingsController extends Controller
{

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $this->validate($request,[
            "residence" => 'required|string',
            "home_address" => 'required|string',
            'profile_photo' => ['required', 'mimes:jpeg,gif,bmp,png', 'max:2048'],
            'national_id' => ['required', 'mimes:jpeg,gif,bmp,png,pdf', 'max:2048']
        ]);

        $profile_photo = $request->file('profile_photo');
        //$profile_photo = $profile_photo->getPathName();

        //get the original file name and replace any spaces with _
        $profile_photo_name = time()."_".  preg_replace('/\s+/', '_', strtolower($profile_photo->getClientOriginalName()));

        //move image to the temporary storage
        $profile_photo->move(public_path('portal/images/profiles'), $profile_photo_name);
    

        $national_id = $request->file('national_id');
        //$national_id = $profile_photo->getPathName();

        //get the original file name and replace any spaces with _
        $national_id_name = time()."_".  preg_replace('/\s+/', '_', strtolower($national_id->getClientOriginalName()));

        //move image to the temporary storage
        $national_id->move(public_path('portal/images/national_ids'), $national_id_name);

        





        $user =  $user->update([
            "residence" => $request->residence,
            "home_address" => $request->home_address,
            "profile_photo" => $profile_photo_name,
            "national_id" => $national_id_name
        ]);
        
        return redirect()->route('student.settings')->with('success','Succesfully updated your profile information. Proceed to the Course Information tab and fill the form before applying for bursary');
        

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

            $request->user()->update([
                "password" => bcrypt($request->password) 
            ]);

            return redirect()->route('student.settings')->with('success','Password changed successfully');

    }


}
