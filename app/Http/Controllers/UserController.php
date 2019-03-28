<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{

    public function profile() {
      return view('profile')->withUser($user = Auth::user());
    }
}
