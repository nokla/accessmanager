<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
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
