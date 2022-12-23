<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AboutusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function aboutUs()
    {
    	$data = DB::table('about_content_tbls')->get();
    	return view('admin.menu.about-us', ['data'=>$data]);
    }

    public function aboutUs_content(Request $request){
    	$data = DB::table('about_content_tbls')->update([
    		'content'=> $request->editor1
    	]);
    	return back()->with('success', 'About Us Content Updated Successfully');
    }
}
