<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth.login');
    }

   public function register()
   {
    return view('auth.register');
   }
}
