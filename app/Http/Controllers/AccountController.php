<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobType;
use App\Models\SavedJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use PDO;

class AccountController extends Controller
{
    //This method will show Register Page
    function registration()
    {
        return view("front.account.registration");
    }

    // SAVE USER REGISTRATION
    function processRegistration(Request $request)
    {
        $validor = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:3|same:confirm_password",
            "confirm_password" => "required|min:3",
        ]);

        if ($validor->passes()) {

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash("success", "You have registered Successfully!");

            return response()->json([
                "status" => true,
            ]);
        } else {
            return response()->json([
                "status" => false,
                "errors" => $validor->errors(),
            ]);
        }
    }


    // This method will show Login Page
    function login()
    {
        return view("front.account.login");
    }

    // AUTHENTICATION
    function authenticate(Request $request)
    {
        $validor = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required"
        ]);

        if ($validor->passes()) {

            if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                return redirect()->route("account.profile");
            } else {
                return redirect()->route("account.login")->with("error", "Email or Password is incorrect!");
            }
        } else {
            return redirect()->route("account.login")->withErrors($validor)->withInput($request->only("email"));
        }
    }


    function profile()
    {

        $id = Auth::user()->id;

        $user = User::find($id);


        return view("front.account.profile", ["user" => $user]);
    }

    function updateProfile(Request $request)
    {
        $id = Auth::user()->id;

        $validor = Validator::make($request->all(), [
            "name" => "required|min:3|max:20",
            "email" => "required|email|unique:users,email," . $id . ",id"
        ]);


        if ($validor->passes()) {

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->designation = $request->designation;
            $user->save();

            session()->flash("success", "Profile updated Successfully!");

            return response()->json([
                "status" => true,
                "errors" => []
            ]);
        } else {
            return response()->json([
                "status" => false,
                "errors" => $validor->errors()
            ]);
        }
    }


    function updateProfilePic(Request $request)
    {
        $id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            "image" => "required|image"
        ]);

        if ($validator->passes()) {
            $image = $request->image;

            $ext = $image->getClientOriginalExtension();
            $imgName = $id . "-" . time() . "." . $ext;

            $image->move(public_path("/profile_pic"), $imgName);
            $user = User::find($id);

            $user->image = $imgName;

            $user->save();

            session()->flash("success", "Profile Picture Updated!");

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



    function logout()
    {
        Auth::logout();
        return redirect()->route("account.login");
    }


    function createJob()
    {
        $categories = Category::orderBy("name", "ASC")->where("status", 1)->get();

        $jobTypes = JobType::orderBy("name", "ASC")->where("status", 1)->get();

        return view("front.account.job.create", [
            "categories" => $categories,
            "jobTypes" => $jobTypes,
        ]);
    }

    function createSaveJob(Request $req)
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

            $job = new Job();
            $job->title  = $req->title;
            $job->category_id  = $req->category;
            $job->job_type_id  = $req->job_type;
            $job->user_id  = Auth::user()->id;
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
            $job->save();

            session()->flash("success", "New Job Created Successfully");

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


    function myJobs()
    {
        $jobs = Job::where("user_id", Auth::user()->id)->with("jobType")->paginate("10");
        return view("front.account.job.my-jobs", ["jobs" => $jobs]);
    }

    function editJob($id)
    {
        $categories = Category::orderBy("name", "ASC")->where("status", 1)->get();
        $jobTypes = JobType::orderBy("name", "ASC")->where("status", 1)->get();

        $job = Job::where([
            "user_id" => Auth::user()->id,
            "id" => $id
        ])->first();

        if ($job == null) {
            abort(404);
        }

        return view("front.account.job.edit", [
            "categories" => $categories,
            "jobTypes" => $jobTypes,
            "job" => $job
        ]);
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

            $job =  Job::find($id);
            $job->title  = $req->title;
            $job->category_id  = $req->category;
            $job->job_type_id  = $req->job_type;
            $job->user_id  = Auth::user()->id;
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
        $job = Job::where([
            "user_id" => Auth::user()->id,
            "id" => $req->jobId
        ])->first();

        if ($job == null) {
            session()->flash("error", "Something goes wrong.");
            return response()->json([
                "status" => false,
            ]);
        }

        Job::where("id", $req->jobId)->delete();
        session()->flash("success", "Job Deleted Successfully");
        return response()->json([
            "status" => true
        ]);
    }


    function myJobApplication()
    {
        $jobs = JobApplication::where("user_id", Auth::user()->id)->with(["job", "job.jobType"])->get();
        // return $jobs;
        // $application = JobApplication::where("job_id", $jobs->job->id)->count();
        // return $application;
        return view("front.account.job.my-job-application", ["jobsApplied" => $jobs]);
    }

    function deleteMyJobApplication(Request $req)
    {
        $job = JobApplication::where("id", $req->id)->delete();

        if ($job) {
            session()->flash("success", "Removed Successfully!");
            return response()->json([
                "status" => true,
                "message" => "Deleted Successfully."
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Something goes wrong."
            ]);
        }
    }


    function savedJob(Request $req)
    {
        $saveJob = SavedJob::where(["job_id" => $req->id, "user_id" => Auth::user()->id])->first();
        // return response()->json([
        //     $saveJob
        // ]);
        if (!$saveJob) {
            $savedJob = new SavedJob();
            $savedJob->job_id = $req->id;
            $savedJob->user_id = Auth::user()->id;
            $savedJob->save();

            session()->flash("success", "Job saved successfully!");
            return response()->json([
                "status" => true,
                "message" => "Job Saved",
            ]);
        } else {
            $saveJob = SavedJob::where(["job_id" => $req->id, "user_id" => Auth::user()->id])->first()->delete();
            session()->flash("success", "Job removed successfully!");
            return response()->json([
                "status" => true,
                "message" => "Job Saved",
            ]);
        }
    }

    // MY SAVED JOB VIEW
    function savedJobs()
    {
        $savedJobs = SavedJob::where("user_id", Auth::user()->id)->with("job", "job.jobType")->get();
        return view("front.account.job.saved-jobs", ["savedJobs" => $savedJobs]);
    }



    // CHANGE PASSWORD
    function changePassword(Request $req)
    {

        $validator = Validator::make($req->all(), [
            "old_password" => "required",
            "new_password" => "required|min:3|same:confirm_password",
            "confirm_password" => "required|min:3|same:new_password",
        ]);

        if ($validator->passes()) {
            $oldPassword = Hash::check($req->old_password, Auth::user()->password);

            if (!$oldPassword) {
                session()->flash("error", "Your old password is incorrect!");
                return response()->json([
                    "status" => true,
                    "errors" => []
                ]);
            }

            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($req->new_password);
            $user->save();
            session()->flash("success", "Password Change successfully!");

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
}
