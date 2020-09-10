<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            if ($user->super == 1) {
                return Redirect::route('dashboard');
            }
            else{
                return Redirect::route('employe.index');
            }
        }
        else{
            return Redirect::back();
        }
    }
}
