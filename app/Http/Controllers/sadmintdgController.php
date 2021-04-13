<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

use App\User;

use App\timetrack;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class sadmintdgController extends Controller
{


    //sadminlogin

    //super admin Dashboard

    public function dashboard()
    {
        return view("sadmin.dashboard");
    }

    //super admin login

    public function sadmin_login(Request $request)
    {
        if ($request->isMethod("POST")) {
            $validator = Validator::make($request->all(), [

                'email' => 'required',

                'password' => 'required|min:6',

            ]);
            $email = $request->post("tdg_email");
            $password = $request->post("tdg_password");
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return redirect()->route('sadmin.dashboard');
            } else {


                $status = '<div class="alert alert-warning   show m-0 mt-2 mb-2 p-2" role="alert">

                           Wrong credentials Admin! try again

                      <button type="button" class="close pb-2" data-dismiss="alert" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                      </button>

                    </div>';


                return redirect()->back()->with('status', $status)->withInput();
            }
        } else if ($request->isMethod("GET")) {
            return view('sadmin.login');
        }
    }





    //super add member
    public function addmember(Request $request)
    {
        if ($request->isMethod("GET")) {
            return view('sadmin.addMember');
        } else if ($request->isMethod("POST")) {
            $input_array = [

                'name' => $request->post('tdg_username'),

                'phone' => $request->post('tdg_contact'),

                'email' =>  $request->post('tdg_email'),

                'password'  =>  $request->post('tdg_password'),

                'position'  =>  $request->post('tdg_position'),

                'department'  =>  $request->post('tdg_department'),

                'state'  =>  $request->post('tdg_state'),

            ];



            $validator = Validator::make($input_array, [

                'name' => 'required',

                'phone' => 'required',

                'email' => 'required|email|unique:users',

                'password' => 'required|min:6',

                'position'  =>  'required',

                'department'  => 'required',

                'state'  =>  'required',
            ]);

            $user = User::create([

                'name' => $input_array['name'],

                'email' => $input_array['email'],

                'password' => Hash::make($input_array['password']),

                'api_token' => Str::random(60),

                'type' => $input_array['position'],

                'department' => $input_array['department'],

                'state' => $input_array['state'],


            ]);
            $status = '<div class="alert alert-success   show m-0 mt-2 mb-2 p-2" role="alert">

                           Member added to TDG wordspace

                      <button type="button" class="close pb-2" data-dismiss="alert" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                      </button>

                    </div>';


            return redirect()->back()->with('status', $status);
        }
    }
    public function viewMember()
    {
        $user = User::where('id', '!=', auth()->id())->get();

        return view('sadmin.viewMember', compact('user'));
    }
    public function timesheet()
    {
        $user_time = DB::table('timetrack')
            ->join('users', 'users.id', '=', 'timetrack.memberID')
            ->get(['users.name', 'timetrack.created_at', 'timetrack.description', 'timetrack.hour', 'timetrack.min']);
        return view("sadmin.timesheet", compact('user_time'));
    }
}
