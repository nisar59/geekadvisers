<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\RecivedLoan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoanEntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getForminfo(Request $request)
    {
        $id = $request->post('did');
        $state = DB::table('user_loan_profiles')->whereNull('deleted_at')->where('form_id', $id)->where('status', 2)->get();
        echo $state;
    }




    public function loanEntry(Request $request)
    {

        $request->validate(
            [
                '*'            => 'required'
            ]
        );


        $loaninfo = DB::table('user_loan_profiles')->whereNull('deleted_at')->where('id', $request->id)->first();



        $data = DB::table('user_loan_profiles')->where('id', $request->id)->update([
            'loan_entry'    => $loaninfo->loan_entry + $request->loan_entry_amount,
            'sms' => 'send'
        ]);


        if ($data) {

            $update_loan_info = DB::table('user_loan_profiles')->whereNull('deleted_at')->where('id', $request->id)->first();
            RecivedLoan::insert([
                'loan_id' => $request->id,
                'recived_amount' => $request->loan_entry_amount,
                'due_amount' => $loaninfo->loan_amount -  $update_loan_info->loan_entry,
                'created_at' => Carbon::now(),
            ]);


            if ($loaninfo->mobile) {

                $message = urlencode("Dear Sir, BFSS-Ltd. deposit balance of your account ".$loaninfo->form_id." is BDT ".$request->loan_entry_amount."৳ as on ". Carbon::now()->format('d-M, Y, h:m a').". For details please visit your offices.");

                $reciver_mobile = $loaninfo->mobile;

                $username = "8809601004416";

                $smsresult = file_get_contents("https://bulksmsbd.net/api/smsapi?api_key=GjKDTrfYuQrhlDA0IOy1&type=text&number=$reciver_mobile&senderid=$username&message=$message");

                if ($smsresult) {
                    return back()->with('success', 'Loan Submitted Successfully This User');
                } else {
                    return back()->with('error', 'Something Went Wrong');
                }
            }
        }






    }
}
