<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\project;
use App\timetrack;
use App\Checknode;
use App\Checklist;


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

        $projects = project::with(['Checknode'])->where("project.manager_id", auth()->id())->get();
        //   dd($projects);


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
        } else {
            return view("tdg_member.dashboard");
        }
    }
    public function addCheckNode(Request $request)
    {

        // dd($request);
        if ($request->ajax()) {
            $node =  Checknode::create([

                'project_id' => $request->idm,

                'node_name' => $request->node_name,

                'added_member' => auth()->id(),
            ]);
            // //    dd($node);
            return response()->json(array('msg' => "Sucessfull"), 200);
        } else {
            return view("tdg_member.dashboard");
        }
    }

    public function addlist(Request $request)
    {
        if ($request->ajax()) {
            $list = Checklist::create([
                'checknode_id' => $request->idl,
                'list_body' => $request->list_body,
                'stage' => 0,
                'added_member' => auth()->id(),
            ]);

            return response()->json(array('msg' => "Sucessfull"), 200);
        }
        return view("tdg_member.dashboard");
    }
}
