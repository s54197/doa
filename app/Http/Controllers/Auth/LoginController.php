<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Change default login view
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // include additional validation function to framework login
    protected function validateLogin(Request $request)
    {
        // Get the user details from database and check if user is exist and active.
        $user = User::where('email', $request->{$this->username()})->first();
        if ($user && $user->status == 'inactive') {
            throw ValidationException::withMessages([$this->username() => __('Your request is pending for approval. Please contact system admin.')]);
        }
        else if ($user && $user->status == 'disabled') {
            throw ValidationException::withMessages([$this->username() => __('Your access has been disabled. Please contact system admin.')]);
        }

        // Then, validate input.
        return $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }
}
