<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PrintController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function singleUser_print($id)
    {
        $recived_history = DB::table('recived_loans')->where('loan_id', $id)->get();
        $data = DB::table('user_loan_profiles')->where('id', $id)->first();
        return view('manager.single_user_print', compact('data', 'recived_history'));
    }
}
