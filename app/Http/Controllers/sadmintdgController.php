<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

class sadmintdgController extends Controller
{

//sadminlogin
//super admin login controller

public function sadmin_login(Request $request){
    if($request->isMethod("POST")){
        $validator = Validator::make($request->all(), [

            'email' => 'required',

            'password' => 'required|min:6',

        ]);

        if ($validator->fails()) {

            return redirect()->back()

                ->withErrors($validator)

                ->withInput();

        }
        $email = $request->post("tdg_email");
        $password = $request->post("tdg_password");
        if(Auth::attempt(['email' => $email, 'password' => $password ])){
            return redirect()->route('sadmin.dashboard');
        }
        
    }
    
    else if  ($request->isMethod("GET")){   
        return view('sadmin.login');
    }


}

}
