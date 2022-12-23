<?php

namespace App\Http\Controllers;

use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id){
        $loginfo =UserLog::where('user_id', $id)->first();
        $user_info = DB::table('users')->where('id', $id)->first();
        return view('admin.profile.progile-log-info',[
            'loginfo' => $loginfo,
            'user_info' => $user_info,
        ]);
    }


}
