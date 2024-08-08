<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //This method will show Register Page
    function registration(){
        return view("front.account.registration");
    }

    // This method will show Login Page
    function login(){

    }

}
