<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoanReciveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function loanEntry(){

        $id = Auth::user()->id;
        $data = DB::table('user_loan_profiles')->where('loan_officer_id', $id)->get();
        return view('loan_officer.recived-amount', ['data' => $data]);
    }




}
