<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use Auth;

class sadmintdgController extends Controller
{


//sadminlogin

//super admin Dashboard

public function dashboard(){
    return view("sadmin.dashboard");
}

//super admin login 

public function sadmin_login(Request $request){
    if($request->isMethod("POST")){
        $validator = Validator::make($request->all(), [

            'email' => 'required',

            'password' => 'required|min:6',

        ]);
        $email = $request->post("tdg_email");
        $password = $request->post("tdg_password");
        if(Auth::attempt(['email' => $email, 'password' => $password ])){
            return redirect()->route('sadmin.dashboard');
        }else{
            return "echo 'mismatch'";
        }
        
        
    }
    
    else if  ($request->isMethod("GET")){   
        return view('sadmin.login');
    }   
}

//super admin login 

public function logout(){
    Auth::logout();
    return redirect(route('sadminLogin'));
}

//super add member 
public function addmember(Request $request){
    if ($request->isMethod("GET")){
        return view('sadmin.addMember');
    }
} 




}
