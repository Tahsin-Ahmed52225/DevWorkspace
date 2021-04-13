<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

use App\User;

use Illuminate\Http\Request;

class tdg_siteController extends Controller
{
    //Manager and Member login function
    public function login(Request $request)
    {
        if ($request->isMethod("POST")) {
            $validator = Validator::make($request->all(), [

                'email' => 'required',

                'password' => 'required|min:6',

            ]);
            $email = $request->post("tdg_email");
            $password = $request->post("tdg_password");
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                if (Auth::user()->type == "Manager") {
                    return redirect()->route("tdg-manager.dashboard");
                } else {
                    return redirect()->route("tdg.dashboard");
                }
            } else {


                $status = '<div class="alert alert-warning   show m-0 mt-2 mb-2 p-2" role="alert">

                               Wrong credentials ! Please try again

                          <button type="button" class="close pb-2" data-dismiss="alert" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                          </button>

                        </div>';

                return redirect()->back()->with('status', $status)->withInput();
            }
        } else {
            return view("tdg_member.login");
        }
    }

    //Logout function

    public function logout(Request $request)
    {
        if (Auth::user()->type == "SuperAdmin") {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/sadmin-login');
        } else {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login');
        }
    }
}
