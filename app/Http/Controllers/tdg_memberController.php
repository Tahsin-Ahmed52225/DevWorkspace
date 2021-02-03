<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use Auth;

use App\User;

use Illuminate\Support\Facades\Hash;

class tdg_memberController extends Controller
{
    //Dashboard
    public function login(){
        return view("tdg_member.login");
    }
}
