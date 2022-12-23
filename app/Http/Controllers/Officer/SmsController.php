<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class SmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function LoanSubmit (){
    	$id = Auth::user()->id;
    	$data = DB::table('user_loan_profiles')->where('loan_officer_id', $id)->get();
    	return view('loan_officer.loan-submit', ['data'=>$data]);
    }



    public function sendSms($id){
    	$data = DB::table('user_loan_profiles')->where('id', $id)->get();
    	DB::table('user_loan_profiles')->where('id',$id)->update([
    		'sms'=> 'send'
    	]);

    	foreach ($data as $val) {
    		# code...
    	}


    	$message = urlencode("Hello" .'<br>'.$val->name."আপনার লোন টি Approve করা হলো। লোণের পরিমান" . '<br>'. $val->loan_amount);

    	$reciver_mobile = $val->mobile;

    	$username = env('SMS_USERNAME','');
    	$password = env('SMS_PASSWORD','');

		$smsresult = file_get_contents("http://66.45.237.70/api.php?username=$username&password=$password&number=$reciver_mobile&message=$message");

		if($smsresult)
		{
			return back()->with('success', 'Loan Submitted Successfully This User');
		}else{
			return back()->with('error', 'Something Went Wrong');
		}




    }
}
