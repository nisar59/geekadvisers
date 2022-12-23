<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function LoanOfficerMemberList()
    {

        $id = Auth::user()->id;
        $data = DB::table('user_loan_profiles')->whereNull('deleted_at')->where('loan_officer_id', $id)->get();
        return view('loan_officer.approve-member-list', ['data' => $data]);
    }

    public function OfficerMemberView($id)
    {
        try {
            $data = DB::table('user_loan_profiles')->whereNull('deleted_at')->where('id', $id)->first();
            return view('loan_officer.application-view', compact('data'));
        } catch (Exception $e) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }






}
