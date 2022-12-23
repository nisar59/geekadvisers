<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AboutusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function about_us()
    {
    	return view('about-us');
    }
}
