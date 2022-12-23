<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class DashboardController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboardView()
    {
        // $data = DB::table('users')->where('is_admin', 3)->count();
        $data = DB::table('notice_tbls')->get();
        // return view('admin.notice-page', ['data' => $data]);
        return view('admin.dashboard', ['data' => $data]);
    }

    /*----------Change Password----------*/
    public function changePassword_Page()
    {
        return view('admin.change-password');
    }

    public function changePassword_update(Request $request)
    {


        $request->validate(
            [
                'password'        => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            ]
        );


        $id = Auth::user()->id;

        $data = DB::table('users')->where('id', $id)->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password Updated Successfull');
    }
}
