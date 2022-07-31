<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
        
    /**
     * Show admin login page 
     */
    public function showLoginPage()
    {
        return view('admin.pages.login');
    }

    /**
     * Admin login system 
     */
    public function login(Request $request)
    {
        
        // validation 
        $this -> validate($request, [
            'auth'      => 'required',
            'password'  => 'required',
        ]);

        // try to login 
        if( Auth::guard('admin') -> attempt([ 'email' => $request -> auth  , 'password' => $request -> password ]) || Auth::guard('admin') -> attempt([ 'cell' => $request -> auth  , 'password' => $request -> password ]) || Auth::guard('admin') -> attempt([ 'username' => $request -> auth  , 'password' => $request -> password ]) ){
            
            return redirect() -> route('admin.dashboard');

        }else {

            return redirect() -> route('admin.login.page') -> with('warning', 'Email or Password not match');

        }



        

    }


}
