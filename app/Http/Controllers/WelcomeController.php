<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller{
    public function welcome()
    {
    	// $data = DB::table('site_settings')->get();
    	// $notice = DB::table('notice_tbls')->get();
    	// return view('welcome', ['data'=>$data,'notice'=>$notice]);
        return redirect()->route('login');
    }
}
