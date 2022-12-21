<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class DashboardController extends Controller
{
    //Shows user details
    public function show($username)
    {
        $user = User::find($username);

        //Check if currently logged in user's username == to the username retrieved
        if(auth()->user()->username != $username)
        {
            return redirect('home')->with('danger', 'Invalid Username');
        }

        //Get all details of the user currently logged in...
        $users = User::all()->where('username', $username);

        //... and returns a view and an associative array
        return view('dashboard',[
                'users' => $users]);
    }
}

