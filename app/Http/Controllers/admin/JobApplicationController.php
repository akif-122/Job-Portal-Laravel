<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    //
    function index(){
        $jobApplications = JobApplication::orderBy("created_at", "DESC")->with("job", "user", "employer")->paginate();
        // return $jobApplications;
        return view("admin.job-applications.list", ["jobApplications"=> $jobApplications]);
    }

    function delete(Request $req){
        $jobApplication = JobApplication::find($req->id);

        if($jobApplication == null){
            session()->flash("error", "Job Application not found!");
            return [
                "status"=> false
            ];
        }


        $delete = $jobApplication->delete();

        if($delete){
            session()->flash("success", "Job Application deleted!");
            return [
                "status" => true
            ];
        }
        
        
    }
    
}
