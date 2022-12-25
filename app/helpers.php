<?php

use App\Models\user_loan_profile;
use Illuminate\Support\Facades\DB;
use Carbon\CarbonPeriod;
function Notification(){
    return DB::table('lon_edit_requests')->whereNull('deleted_at')->where('seenstatus', 'unseen')->get();
}

if (!function_exists('macId')) {
    function macId(){
        return substr(exec('getmac'), 0, 17);
    }
}

function settings(){
    return DB::table('site_settings')->where('id', 1)->first();
}


function OfficerProfile($id){
    return DB::table('officer_profiles')->where('officer_id', $id)->first();
}
function ManagerProfile($id){
    return DB::table('manager_profiles')->where('manager_id', $id)->first();
}




function ManagerNotification($id){

    $notification = user_loan_profile::where('manager_id', $id)->pluck('id');

    $noti = DB::table('notifications')->where('n_for', "manager")->where('n_status', "unseen")->whereIn('n_type_id', $notification)->get();
    return $noti;

}


function OfficerNotification($id){

    $notification = DB::table('user_loan_profiles')->where('loan_officer_id', $id)->pluck('id')->all();
    $noti = DB::table('notifications')->where('n_for', "loanOfficer")->where('n_status', "unseen")->whereIn('n_type_id', $notification)->get();
    return $noti;


    // return DB::table('notifications')->where('n_for', "loanOfficer")->where('n_status', "unseen")->get();
}





function SuperAdminNotification(){
    return DB::table('notifications')->where('n_for', "superAdmin")->where('n_status', "unseen")->get();
}
function NoticeAdminNotification(){
    return DB::table('notifications')->where('n_for', "noticeAdmin")->where('n_status', "unseen")->get();
}


function LoanInfoById($id){
    return DB::table('user_loan_profiles')->where('id', $id)->first();
}


function Days()
{
    $days=[];
 for($i=1; $i<=31; $i++){
    $days[]=$i;
 }
return $days;
}

function Months()
{
    $months=[];
   for ($m=1; $m<=12; $m++) {
     $months[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
}
return $months;
}

function Years()
{
   
    $years=[];
 for($i=1924; $i<=now()->format('Y'); $i++){
    $years[]=$i;
 }

  return $years;
}
