<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //This method will show Register Page
    function registration(){
        return view("front.account.registration");
    }

    // SAVE USER REGISTRATION
    function processRegistration(Request $request){
        $validor = Validator::make($request->all(), [
            "name"=>"required",
            "email"=>"required|email",
            "password"=>"required|min:3|same:confirm_password",
            "confirm_password"=> "required|min:3",
        ]);

        if($validor->passes()){
            return response()->json([
                "status" => true,
            ]);
        }else{
            return response()->json([
                "status"=> false,
                "errors"=> $validor->errors(),
            ]);
        }

        
        
    }
    

    // This method will show Login Page
    function login(){

    }

}
