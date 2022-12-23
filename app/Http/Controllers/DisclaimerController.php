<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DisclaimerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function disclaimer()
    {
    	return view('disclaimer');
    }
}
