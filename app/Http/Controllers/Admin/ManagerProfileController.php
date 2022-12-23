<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function allManager()
    {
        try {
            $data = DB::table('manager_profiles')->get();
            if ($data) {
                return view('admin.profile.manager-profile', ['data' => $data]);
            } else {
                return back()->with('error', 'No Data Found');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }
}
