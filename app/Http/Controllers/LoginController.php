<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $remeber_me = $request->remember_me ? true : false;
        $credentials = $request->validate(
            ['email' => ['required','email'],
            'password' =>'required',
        ]);

        if(auth::attempt($credentials,$remeber_me))
        {
            echo "innnn";
           
            $request->session()->regenerate();
            return response()->json(['status'=>"success","redirect_url"=> '/']); 
        }
        return  response()->json(['status'=>"error","error_msg"=> 'Please try again'],401); 
    }


    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
