<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifaction;

use App\User;

use App\project;


use Mockery\Matcher\Not;

class NotificationController extends Controller
{

    public function Getnotify(Notifaction $notification, Request $request)
    {
        return response()->json($request->notification()->latest()->get());
    }
    public function Postnotify(project $project, request $request)
    {

        return 'echo <script>console.log("I am working"); </script> ';
        // $user = User::where('id', '=', '$project->manager_id')->get();
        // $notification = $user->notification()->create([
        //     'sender' => $request->id(),
        //     'receiver' => $project->manager_id,
        //     'body' => "Project: " . $project->title . " has been assigned to you",
        //     'readed' => 0,
        //     'type' => "Project assign",
        // ]);
        // $notification = Notifaction::Where('id', '=', $notification->id)->with('user')->first();
        // return $notification->toJson();
    }
}
