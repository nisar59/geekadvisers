<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RejectedProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rejectedProfile()
    {
        try {
            $data = DB::table('user_loan_profiles')->where('status', 3)->whereNull('deleted_at')->get();
            if ($data) {
                return view('admin.profile.rejected-profile', ['data' => $data]);
            } else {
                return back()->with('error', 'No Data Found');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }
}
