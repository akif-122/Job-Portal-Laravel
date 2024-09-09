<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get("/", [HomeController::class, "index"])->name('home');
Route::get("/jobs", [JobsController::class, "index"])->name("jobs");
Route::get("/jobs/job-detail/{id}", [JobsController::class, "jobDetail"])->name("jobDetail");
Route::post("/apply-job", [JobsController::class, "applyJob"])->name("applyJob");

// ADMIN ROUTES
Route::group(["prefix"=> "admin", "middleware"=> "isAdmin"], function(){
    Route::get("/dashboard", [DashboardController::class, "index"])->name("admin.dashboard");
    Route::get("/users", [UserController::class, "index"])->name("admin.users");
    Route::get("/users/{id}", [UserController::class, "edit"])->name("admin.users.edit");
    Route::post("/users/update", [UserController::class, "update"])->name("admin.users.update");
    Route::post("/users/delete", [UserController::class, "delete"])->name("admin.users.delete");
});



// USER ROUTES
Route::group(["prefix" => "account"], function () {

    // GUEST ROUTES
    Route::group(["middleware" => "guest"], function(){
        Route::get("/register", [AccountController::class, "registration"])->name("account.registration");
        Route::get("/login", [AccountController::class, "login"])->name("account.login");
        Route::post("/process-register", [AccountController::class, "processRegistration"])->name("account.processRegistration");
        Route::post("account/authenticate", [AccountController::class, "authenticate"])->name("account.autheticate");
    });
    
    
    // AUTH ROUTES

    Route::group(["middleware" => "auth"], function(){
        Route::get("/profile", [AccountController::class, "profile"])->name("account.profile");
        Route::put("/updateProfile", [AccountController::class, "updateProfile"])->name("account.updateProfile");
        Route::get("/logout", [AccountController::class, "logout"])->name("account.logout");
        Route::post("/update-profile-pic", [AccountController::class, "updateProfilePic"])->name("account.updateProfilePic");
        Route::get("/create-job", [AccountController::class, "createJob"])->name("account.createJob");
        Route::post("/create-save-job", [AccountController::class, "createSaveJob"])->name("account.createSaveJob");
        Route::get("/my-jobs", [AccountController::class, "myJobs"])->name("account.myJobs");
        Route::get("/my-jobs/edit/{id}", [AccountController::class, "editJob"])->name("account.editJob");
        Route::post("/update-job/{id}", [AccountController::class, "updateJob"])->name("account.updateJob");
        Route::post("/delete-job", [AccountController::class, "deleteJob"])->name("account.deleteJob");
        Route::get("/my-job-applications", [AccountController::class, "myJobApplication"])->name("account.myJobApplication");
        Route::post("/my-job-applications/delete", [AccountController::class, "deleteMyJobApplication"])->name("account.deleteMyJobApplication");
        Route::post("/save-job", [AccountController::class, "savedJob"])->name("account.savedJob");
        Route::get("/saved-jobs", [AccountController::class, "savedJobs"])->name("account.savedJobs");

        // CHANGE PASSWORD
        Route::post("/change-password", [AccountController::class, "changePassword"])->name("changePassword");
        
    });
});
