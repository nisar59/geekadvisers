<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DisclaimerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function disclaimerPage()
    {
    	$data = DB::table('disclaimer_content_tbls')->get();
    	return view('admin.menu.disclaimer', ['data'=>$data]);
    }

    public function disclaimer_content(Request $request)
    {
    	$data = DB::table('disclaimer_content_tbls')->update([
    		'content'=> $request->editor1
    	]);
    	return back()->with('success', 'Disclaimer Content Updated Successfully');
    }
}
