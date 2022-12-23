<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrivacyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function privacyPolicy()
    {
    	$data = DB::table('privacy_content_tbls')->get();
    	return view('admin.menu.privacy-page', ['data'=>$data]);
    }

    public function privacy_content(Request $request)
    {
    	$data = DB::table('privacy_content_tbls')->update([
    		'content'=> $request->editor1
    	]);

    	return back()->with('success', 'Privacy Content Updated Successfully');
    }
}
