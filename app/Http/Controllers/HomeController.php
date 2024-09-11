<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        return view("home");
    }

    public function configUsers()
    {
        $users = User::all();
        return view("config.indexUsers", compact('users'));
    }

    public function configPermission()
    {
        return view("config.indexPermission");
    }

    public function configNewUser()
    {
        return view("config.newUser");
    }
}
