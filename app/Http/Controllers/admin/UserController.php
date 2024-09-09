<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function index()
    {
        $users = User::orderBy("created_at", "DESC")->paginate(5);
        return view("admin.user.list", ["users" => $users]);
    }

    function edit($id)
    {
        $user = User::where("id", $id)->first();
        return view("admin.user.edit", ["user" => $user]);
    }

    function update(Request $req)
    {

        $user = User::find($req->id);

        $user->name = $req->name;
        $user->email = $req->email;
        $user->mobile = $req->mobile;
        $user->designation = $req->designation;
        $user->save();

        session("success", "User Updated Successfully!");
        return response()->json([
            "status" => true,
        ]);
    }

    function delete(Request $req){
        $user = User::where("id", $req->id)->delete();

        if($user){
            session()->flash("success", "User Deleted!");
            return response()->json([
                "status"=> true
            ]);
        }

        session()->flash("error", "User not Deleted!");
        return response()->json([
            "status"=> true
        ]);
    }
    
    
}
