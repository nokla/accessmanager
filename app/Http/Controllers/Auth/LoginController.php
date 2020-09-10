<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            if ($user->super == 1) {
                return redirect()->intended('dashboard.index');
            }
            else{
                return redirect()->intended('employe.index');
            }
        }
    }
}
