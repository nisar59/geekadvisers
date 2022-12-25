<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DataTables;
class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function LoanOfficerMemberList()
    {

        $req = request();
        if ($req->ajax()) {
          $strt   = $req->start;
          $length = $req->length;

        $id = Auth::user()->id;
        $members = DB::table('user_loan_profiles')->whereNull('deleted_at')->where('loan_officer_id', $id);

          $total = $members->count();
          $members = $members->offset($strt)->limit($length)->get();

          return DataTables::of($members)
            ->setOffset($strt)
            ->with([
              "recordsTotal"    => $total,
              "recordsFiltered" => $total,
            ])
            ->editColumn('form_id', function ($row) {
              return $row->form_id;
            })
            ->addColumn('image', function ($row) {
             return '<img src="'.url('uploads/loan_profile/'. $row->loan_owner_image).'"style="width: 78px;height: 78px;">';
            })
            ->editColumn('name', function ($row) {
              return $row->name;
            })
            ->editColumn('loan_owner_branch', function ($row) {
              return $row->loan_owner_branch;
            })      
            ->editColumn('loan_amount', function ($row) {
              return $row->loan_amount;
            }) 
            ->addColumn('view', function ($row) {
              return '<a href="' . url('home/loan-officer/view-member-profile/' . $row->id) . '" class="btn btn-primary">View <i class="fa fa-eye"></i></a>';
            })
            ->addColumn('status', function ($row) {
              
              if($row->status==2){
              return '<button type="button" class="btn btn-success">Approved</button>';
              }
              elseif($row->status==3){
              return '<button type="button" class="btn btn-danger">Rejected</button>';
              }
              else{
              return '<button type="button" class="btn btn-info">Pending</button>';
              }

              return '<button type="button" class="btn btn-danger">'.$sts.'</button>';
            })
            


            ->rawColumns(['image','view','status'])
            ->make(true);
        }

      return view('loan_officer.approve-member-list');
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
