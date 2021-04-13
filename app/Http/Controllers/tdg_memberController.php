<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use Validator;

use Auth;

use App\User;

use App\timetrack;

use Illuminate\Support\Facades\Response;

use App\project;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class tdg_memberController extends Controller
{
    //Dashboard
    public function dashboard()
    {
        return view("tdg_member.dashboard");
    }
    public function profile()
    {
        return view("tdg_member.profile");
    }
    public function timeTraker(Request $request)
    {
        if ($request->ajax()) {
            if ($request->hr == "00" && $request->min == "00") {
                $msg = "<div class='alert alert-warning fade show' role='alert'>
                            Less than one minite will not be added
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
            } else {
                $new_count = timetrack::create([


                    'memberID' => auth()->id(),

                    'description' => $request->description,

                    'hour' => (int) $request->hr,

                    'min' => (int) $request->min,

                ]);


                $msg = "<div class='alert alert-success fade show' role='alert'>"
                    . $request->hr . " Hour " . $request->min . " Min added to today
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
            }
            return response()->json(array('msg' => $msg), 200);
        } else {
            return redirect()->route('tdg.dashboard');
        }
    }
    public function timesheet()
    {
        $timer = timetrack::where("memberID", '=', auth()->id())->get();
        return view("tdg_member.timesheet", compact('timer'));
    }

    public function projects()
    {
        $projects = project::where('manager_id', '=', auth()->id())->get();
        //dd($projects);
        return view('tdg_member.projects', compact('projects'));
    }

    public function downloadfile($id)
    {
        $link = project::where("id", "=", $id)->get('DocumentName');
        $file =  public_path('storage') . $link[0]['DocumentName'];
        return Response::download($file);
    }
    public function changeStage(Request $request)
    {
        if ($request->ajax()) {
            project::where('id', $request->p_id)
                ->update(['project_board' => $request->stage]);
            // return response()->json(array('msg' => $msg), 200);
        } else {
            return view("tdg_member.dashboard");
        }
    }
}
