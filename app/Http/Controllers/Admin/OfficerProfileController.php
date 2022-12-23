<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficerProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function allOfficer()
    {
        try {
            $data = DB::table('officer_profiles')->get();
            if ($data) {
                return view('admin.profile.officer-profile', ['data' => $data]);
            } else {
                return back()->with('error', 'No Data Found');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }
}
