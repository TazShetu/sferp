<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }


    public function user()
    {
        return view('user.index');
    }


    public function test()
    {
        return view('test');
    }


}
