<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AllNoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all_notice()
    {
    	return view('all-notice');
    }
}
