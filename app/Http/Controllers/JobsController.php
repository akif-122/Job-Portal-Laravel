<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    //
    function index(){
        $categories = Category::where("status", 1)->orderBy("name", "ASC")->get();
        $jobTypes = JobType::where("status", 1)->get();
        $jobs = Job::where("status", 1)->with("JobType")->orderBy("created_at", "DESC")->paginate(9);
        return view("front.jobs", [
            "categories"=>$categories,
            "jobTypes"=> $jobTypes,
            "jobs"=> $jobs
        ]);
    }


    function jobDetail($id){
        $jobDetail = Job::where(
            [
                "id"=> $id,
                "status"=> 1
            ]
        )->with("jobType", "category")->get()->first();

        return view("front.job-detail", ["jobDetail"=>$jobDetail]);
    }
    
}
