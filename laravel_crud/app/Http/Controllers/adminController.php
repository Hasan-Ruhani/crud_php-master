<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class adminController extends Controller
{
    function getAdmin(){
        return  view('admin.admin_login');
    }

    function getAdmin_login(Request $request){
        $request -> validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/home');
        }
        else{
            Session::flash('error-msg', 'Invalid Email or Password');
            return redirect() -> back();
        }
    }
}
