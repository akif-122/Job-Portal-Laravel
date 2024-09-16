<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    //

    function index()
    {
        $jobs = Job::orderBy("created_at", "DESC")->with("user", "applications")->paginate(5);
        // return $jobs;
        return view("admin.jobs.list", ["jobs" => $jobs]);
    }

    function edit($id)
    {
        $job = Job::findOrFail($id);
        $categories = Category::where("status", "1")->get();
        $jobTypes = JobType::where("status", "1")->get();

        return view("admin.jobs.edit", ["job" => $job, "categories" => $categories, "jobTypes" => $jobTypes]);
    }


    function updateJob(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            "title" => "required",
            "category" => "required",
            "job_type" => "required",
            "vacancy" => "required",
            "location" => "required",
            "description" => "required",
            "company_name" => "required",
            "experience" => "required"
        ]);

        if ($validator->passes()) {

            $job = Job::find($id);
            $job->title  = $req->title;
            $job->category_id  = $req->category;
            $job->job_type_id  = $req->job_type;
            $job->vacancy  = $req->vacancy;
            $job->salary  = $req->salary;
            $job->location  = $req->location;
            $job->description  = $req->description;
            $job->benefits  = $req->benefits;
            $job->responsibility  = $req->responsibility;
            $job->qualification  = $req->qualification;
            $job->keywords  = $req->keywords;
            $job->experience  = $req->experience;
            $job->company_name  = $req->company_name;
            $job->company_location  = $req->company_location;
            $job->company_website  = $req->company_website;

            $job->status  = $req->status;

            $job->isFeatured  = (!empty($req->isFeatured)) ? $req->isFeatured : 0;

            $job->save();

            session()->flash("success", "Job Updated Successfully");
            // session(["success" => "Job Updated Successfully"]);

            return response()->json([
                "status" => true,
                "errors" => []
            ]);
        } else {
            return response()->json([
                "status" => false,
                "errors" => $validator->errors()
            ]);
        }
    }


    function deleteJob(Request $req)
    {
        $job = Job::find($req->id);

        if ($job == null) {
            session()->flash("error", "Job Not Found!");
            return [
                "status" => false
            ];
        }

       $delete =  $job->delete();
       if($delete){
           session()->flash("success", "Job Deleted");
           return [
               "status"=> true
           ];

       }
        
    }
}
