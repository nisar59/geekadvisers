<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function contact()
    {
    	return view('contact');
    }
}
