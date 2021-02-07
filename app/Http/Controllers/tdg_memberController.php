<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use Auth;

use App\User;

use Illuminate\Support\Facades\Hash;

class tdg_memberController extends Controller
{
    //Dashboard
    public function login(Request $request){
        if($request->isMethod("POST")){
            $validator = Validator::make($request->all(), [
    
                'email' => 'required',
    
                'password' => 'required|min:6',
    
            ]);
            $email = $request->post("tdg_email");
            $password = $request->post("tdg_password");
            if(Auth::attempt(['email' => $email, 'password' => $password ])){
                return redirect()->route('tdg.dashboard');
            }else{
              
    
                    $status = '<div class="alert alert-warning   show m-0 mt-2 mb-2 p-2" role="alert">
    
                               Wrong credentials ! Please try again 
    
                          <button type="button" class="close pb-2" data-dismiss="alert" aria-label="Close">
    
                            <span aria-hidden="true">&times;</span>
    
                          </button>
    
                        </div>';
    
                    return redirect()->back()->with('status', $status)->withInput();
            }
        
    }
    else{
        return view("tdg_member.login");
    }
 }

  public function dashboard(){
      return view("tdg_member.dashboard");
  }
}
