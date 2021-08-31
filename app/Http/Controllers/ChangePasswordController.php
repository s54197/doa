<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\MatchOldPassword;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    // make sure user login
    public function __construct(){
        $this->middleware('auth');
    }

    //display change password page
    public function index(){
        return view('change_password');
    }

    public function store(Request $request){
        // validate form
        $request->validate([
            // 'old_password' => ['required', new MatchOldPassword],
            'old_password' => ['required'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            'new_password_confirmation' => ['required'],
        ]);

        try{

            // check if old password does not match
            if (!Hash::check($request->old_password, auth()->user()->password)) {
                return redirect('/change_password')->withWarning('Kata laluan lama tidak sama, sila masukkan sekali lagi!');
            }
            // if validation is successful, update password
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            // return to the same page with successful message
            return redirect('/change_password')->withSuccess('Anda berjaya menukar kata laluan yang baru!');
        } catch(Exception $e) {
            // return to the same page with failed message           
            return redirect('/change_password')->withWarning('Anda tidak berjaya menukar kata laluan baru - ('.$e.')');
        }
    }
}
