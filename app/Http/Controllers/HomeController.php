<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //This method will show Home Page
    public function index(){
        return view("front.home");
    }
}
