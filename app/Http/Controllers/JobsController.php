<?php

namespace App\Http\Controllers;

use App\Mail\JobNotificationMail;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobType;
use App\Models\SavedJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobsController extends Controller
{
    //
    function index(Request $req)
    {
        $categories = Category::where("status", 1)->orderBy("name", "ASC")->get();
        $jobTypes = JobType::where("status", 1)->get();


        $jobs = Job::where("status", 1);

        // KERYWORDS
        if (!empty($req->keyword)) {
            $jobs = $jobs->where(function ($query) use ($req) {
                $query->orWhere("title", "like", "%$req->keyword%");
                $query->orWhere("keywords", "like", "%$req->keyword%");
            });
        }
        // LCOATION
        if (!empty($req->location)) {
            $jobs = $jobs->where("location", $req->location);
        }

        // CATEGORY
        if (!empty($req->category)) {
            $jobs = $jobs->where("category_id", $req->category);
        }


        // TYPE
        $types = [];
        if (!empty($req->job_type)) {
            $types = explode(",", $req->job_type);
            $jobs = $jobs->whereIn("job_type_id", $types);
        }

        if (!empty($req->experience)) {
            $jobs = $jobs->where("experience", $req->experience);
        }

        $jobs = $jobs->with(["JobType", "category"]);

        if ($req->sort == "0") {
            $jobs = $jobs->orderBy("created_at", "ASC");
        } else {
            $jobs = $jobs->orderBy("created_at", "DESC");
        }

        $jobs = $jobs->paginate(9);


        return view("front.jobs", [
            "categories" => $categories,
            "jobTypes" => $jobTypes,
            "jobs" => $jobs,
            "types" =>  $types,
        ]);
    }


    function jobDetail($id)
    {
        $jobDetail = Job::where(
            [
                "id" => $id,
                "status" => 1
            ]
        )->with("jobType", "category")->get()->first();
        //   return  $jobDetail;
        $saveJob = [];
        if (Auth::check()) {
            $saveJob = SavedJob::where(["job_id"=> $id, "user_id"=> Auth::user()->id])->first();
        }
        // dd($saveJob);
        // return $jobDetail;
        if ($jobDetail == null) {
            abort(404);
        }

        $jobApplications = JobApplication::where([
            "job_id"=>$id,
        ])->with("user")->get();
        // return $jobApplications;

        return view("front.job-detail", ["jobDetail" => $jobDetail, "saveJob" => $saveJob, "jobApplications"=> $jobApplications]);
    }


    function applyJob(Request $req)
    {

        $job = Job::where("id", $req->id)->first();
        // IF JOB NOT AVAILABLE
        if ($job == null) {
            session()->flash("error", "This job is not available.");
            return response()->json([
                "status" => false,
                "message" => "This job is not available."
            ]);
        }

        // ON OWN JOB

        $employe_id = $job->user_id;
        if ($employe_id == Auth::user()->id) {
            session()->flash("error", "You can't apply on your own job.");
            return response()->json([
                "status" => false,
                "message" => "You can't apply on your own job."
            ]);
        }


        // YOU CAN'T APPLY MORE THAN ONCE
        $isApplied = JobApplication::where([
            "job_id" => $req->id,
            "user_id" => Auth::user()->id
        ])->first();



        if ($isApplied) {
            session()->flash("error", "You have already applied to this job.");
            return response()->json([
                "status" => false,
                "message" => "You have already applied to this job."
            ]);
        }


        $jobApplications = new JobApplication();
        $jobApplications->job_id = $req->id;
        $jobApplications->user_id = Auth::user()->id;
        $jobApplications->employer_id = $employe_id;
        $jobApplications->applied_date = now();
        $jobApplications->save();

        // SEND NOTIFICATION MAIL
        $employer = User::where("id", $employe_id)->first();
        $mailData = [
            "employer" => $employer,
            "user" => Auth::user(),
            "job" => $job
        ];
        Mail::to($employer->email)->send(new JobNotificationMail($mailData));

        session()->flash("success", "You have Successfully applied.");

        return response()->json([
            "status" => true,
            "message" => "You have Successfully applied."
        ]);
    }
}
