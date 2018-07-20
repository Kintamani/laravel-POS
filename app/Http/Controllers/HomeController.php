<?php

namespace POS\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       if (Auth::user()->level == 1) return view('home.admin');
       else return view('home.kasir');
    }
}
