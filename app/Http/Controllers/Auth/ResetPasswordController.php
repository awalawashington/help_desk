<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Rules\CheckSamePassword;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = 'student/dashboard';

    public function resetPasswordView(Request $request)
    {
        if (!session('email')) {
            return redirect('student/password/email');
        }
        return view('students.auth.reset_password');
    }


    public function reset(Request $request)
    {
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
        $user = User::where('email' , $request->email)->first();
        $user->update([
            "password" => bcrypt($request->password) 
        ]);

        

        return redirect()->route('student.login')->with('success','Password reset, Success!');
    }

}
