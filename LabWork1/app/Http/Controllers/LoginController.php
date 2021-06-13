<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){

        return view('login.index');
    }

    public function verify(Request $req){
       
        if($req->uname == $req->password){
        
            return view('home.index') 
            -> with("name", $req->uname);
             
        }
        else
        {
            echo 'password didnt match';
        }
    }
}
