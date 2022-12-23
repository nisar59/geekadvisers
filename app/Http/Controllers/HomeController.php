<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = DB::table('notice_tbls')->get();
        return view('home',['data' => $data]);
    }


    public function NotificationView($id){
        $notification = DB::table('notifications')->where('id', $id)->first();
        $data = DB::table('user_loan_profiles')->where('id', $notification->n_type_id)->first();

        if ($data) {
            $notification = DB::table('notifications')->where('id', $id)->update([
                'n_status' => "seen"
            ]);
            return view('n-view-form', ['data' => $data]);
        }else{
            DB::table('notifications')->where('id', $id)->delete();
            return back();
        }

    }


}
