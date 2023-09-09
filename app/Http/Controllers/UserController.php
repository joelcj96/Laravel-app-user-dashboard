<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Home

    public function home(){
         return view('users.home');
    }

        // ABOUT

        public function about(){
           return view('users.about');
        }


            // CONTACT

    public function contact(){
         return view('users.contact');
    }
}
