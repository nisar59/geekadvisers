<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PrivacyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function privacy_policy()
    {
    	return view('privacy');
    }


}
