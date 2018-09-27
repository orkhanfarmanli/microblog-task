<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tweet;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::inRandomOrder()->whereNotIn('id', [auth()->user()->id])->take(3)->get();
        $tweets = Tweet::latest()->take(100)->get();
        return view('home', ['users' => $users, 'tweets' => $tweets]);
    }

    /**
     *
     * Profile page
     *
     */
    
    public function profile(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        return view('profile', ['user' => $user]);
    }
}
