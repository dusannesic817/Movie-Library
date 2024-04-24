<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    

    public function isAdmin(){


        return auth()->user()->user_type == "admin";
        
    }
}
