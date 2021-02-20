<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\project;

use App\timetrack;

use Carbon\Carbon;

class tdg_managerController extends Controller
{

 //Manager Dashboard 
 public function dashboard(){
     return view("tdg_manager.dashboard");
 }
 //Manager Profile
 public function profile(){
    return view("tdg_manager.profile");
 }
 //Manager timetraker
  public function timeTraker(Request $request){
    if($request->ajax()){
     
                    if($request->hr == "00" && $request->min == "00"){
                        $msg = "<div class='alert alert-warning fade show' role='alert'>
                                Less than one minite will not be added
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button> 
                            </div>"
                            ;

                    }else{
                    $new_count = timetrack::create([
                        

                        'memberID' => auth()->id(),

                        'description' => $request->description,

                        'hour' => (int) $request->hr,

                        'min' => (int) $request->min,

                    ]);
                    
                    
                    $msg = "<div class='alert alert-success fade show' role='alert'>"
                                . $request->hr ." Hour " . $request->min . " Min added to today
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button> 
                            </div>"
                            ;
                    }
                    return response()->json(array('msg'=> $msg), 200);
    }else{
        return redirect()->route('tdg-manager.dashboard');
    }
 }
 // Manager Time sheet
 public function timesheet(){
    $timer = timetrack::where("memberID",'=', auth()->id())->get();
    return view("tdg_manager.timesheet",compact('timer'));
}
// Manger Add project
 public function addProject(Request $request){
    if($request->isMethod("GET")){
        return view('tdg_manager.addproject');
    }else if($request->isMethod("POST")){
       
        $project_manager = User::where("name","=",$request->tdg_projectManager)->get('id')->first();
        $title = $request->tdg_projectTitle;
        $project_id = $request->tdg_projectID;
        $department = $request->tdg_projectDepartment;
        $deadline   = \Carbon\Carbon::parse( $request->tdg_projectDeadline)->format('d/m/y');
        $description = $request->tdg_projectDescription;
        $priority = $request->priority;
        
        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $path = '/storage/' . $filePath.'/'.$fileName;
        }

        $project = project::create([
            'title' => $title,

            'description' => $description,
            'department' => $department,
            'deadline' => $deadline,
            'manager_id' => $project_manager->id,
            'DocumentName' => $path,
            'project_id' => $project_id,
            'project_board' => 'None',
            'priority' => $priority,     
        ]);
        $status = '<div class="alert alert-success   show m-0 mt-2 mb-2 p-2" role="alert">

                                   Project assigned to the Department

                                <button type="button" class="close pb-2" data-dismiss="alert" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                            </button>

                </div>';
        return redirect()->back()->with('status', $status);
    }


 }
 public function getdepartmentPerson(Request $request){
            $output="";
            if($request->ajax()){
                $person = User::where('department','=',$request->data)->get('name');
                if(count($person)>0) {
                            foreach ($person as $person) {
                            $output.= '<option>'. $person->name.'</option>';
                            }
                            return Response($output);
                         }
                else{
                    $output = '<option>-none-</option>';
                    return Response($output);
                }

            
        }else{
            return redirect()->route("tdg-manager.dashboard");
        }



}
}