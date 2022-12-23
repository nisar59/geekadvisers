<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SettingsController extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settings_Page()
    {
        $data = DB::table('site_settings')->get();
        return view('admin.settings', ['data' => $data]);
    }

    public function settings_Update(Request $request){

        $settings = [];
        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo');
            $ext = $image->extension();
            $file = time() . '.' . $ext;
            $image->move('uploads/logo', $file);
            $settings['site_logo'] = $file;
        }

        if ($request->hasFile('fb_page_img')) {
            $image = $request->file('fb_page_img');
            $ext = $image->extension();
            $file = time() . '.' . $ext;
            $image->move('uploads/logo', $file);
            $settings['fb_page_img'] = $file;
        }


        $settings['fb_link'] = $request->fb_link;
        $settings['twitter_link'] = $request->twitter_link;
        $settings['insta_link'] = $request->insta_link;
        $settings['linkdin_link'] = $request->linkdin_link;
        $settings['mobile_no'] = $request->mobile_no;
        $settings['office_address'] = $request->office_address;
        $settings['email'] = $request->email;
        $settings['map'] = $request->map;

        $data = DB::table('site_settings')->update($settings);
        return back()->with('success', 'Site Settings Updated Successfull');

    }
}
