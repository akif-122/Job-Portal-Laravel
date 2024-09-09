<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //This method will show Home Page
    public function index(){
        $category = Category::where("status", 1)->orderBy("name", "ASC")->take("8")->get();

        $allCategories = Category::where("status", 1)->orderBy("name", "ASC")->get();

        $featuredJobs = Job::where(["status"=>1, "isFeatured"=> 1])->with("jobType")->orderBy("created_at", "DESC")->take(6)->get();

        $latestJobs = Job::where("status", 1)->with("jobType")->orderBy("created_at", "DESC")->take(6)->get();

        return view("front.home", [
            "categories"=>$category,
            "featuredJobs"=>$featuredJobs,
            "latestJobs"=>$latestJobs,
            "allCategories"=> $allCategories,
        ]);
    }
}
