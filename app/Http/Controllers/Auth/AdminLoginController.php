<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Admin;
use Illuminate\Support\Facades\Hash; // <-- import it at the top
class AdminLoginController extends Controller
{
    //

    public function __construct(){
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
        return View('admin.login');
    }

    public function login(Request $request){
        //Validate
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]
        );
        //Attemp to log admin in
        if(Auth::guard('admin')->attempt(['email' =>$request->email, 'password' => $request->password]))
            return redirect()->intended(route('admin'));
        else{
            return redirect()->back()->withInput();

        }
    }


}
