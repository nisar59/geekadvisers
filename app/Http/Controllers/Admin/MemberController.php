<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;

class MemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function allMemberList()
    {
        $req = request();
        if ($req->ajax()) {
          $strt   = $req->start;
          $length = $req->length;

        $status = ["1","2"];
        
        $members = DB::table('user_loan_profiles')->whereNull('deleted_at');

          $total = $members->count();
          $members = $members->offset($strt)->limit($length)->get();

          return DataTables::of($members)
            ->setOffset($strt)
            ->with([
              "recordsTotal"    => $total,
              "recordsFiltered" => $total,
            ])
            ->addColumn('action', function ($row) {
              return '<a href="' . url('/admin/dashboard/member-edit/' . $row->id) . '" class="btn btn-info">Edit <i class="fa fa-edit"></i></a>
                      <a href="' . url('admin/list-admin/' . $row->id.'/delete') . '" class="btn btn-danger">Delete <i class="fa fa-edit"></i></a>';
            })

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
              return '<a href="' . url('home/loan-officer/view-member-profile/' . $row->id) . '" class="btn btn-primary">View <i class="fa fa-edit"></i></a>';
            })


            ->addColumn('status', function ($row) {
              
              if($row->status==2){
              return '<button type="button" class="btn btn-success">Approved</button>';
              }
              elseif($row->status==3){
              return '<button type="button" class="btn btn-danger">Rejected</button><br>';
              }
              else{
              return '<button type="button" class="btn btn-info">Pending</button>';
              }

              return '<button type="button" class="btn btn-danger">'.$sts.'</button>';
            })
            ->addColumn('print', function ($row) {
              return '<a href="' . url('home/manager/print-single-user/' . $row->id) . '" class="btn btn-dark">Print <i class="fa fa-print"></i></a>';
            })


            ->rawColumns(['image','view','status','print','action'])
            ->make(true);
        }



    return view('admin.all-member-list');
        
    }


    // Requested Fun
    public function allEditRequestMember()
    {
        try {
            $data = DB::table('lon_edit_requests')->whereNull('deleted_at')->latest()->get();
            return view('admin.all-edit-request-member-list', ['data' => $data]);
        } catch (Exception $e) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }



    public function loanmember_EditRequestView($id)
    {
        DB::table('lon_edit_requests')->whereNull('deleted_at')->where('seenstatus', 'unseen')->where('id', $id)->update([
            'seenstatus' => 'seen'
        ]);

        $data = DB::table('lon_edit_requests')->where('id', $id)->first();
        return view('admin.view-member-request-edit-profile', compact('data'));
    }



    public function loanmember_EditRequestAprove($id)
    {

        $edit_data = DB::table('lon_edit_requests')->where('id', $id)->first();

        try {
            $loan = [];
            $loan['chk_img']                     = $edit_data->chk_img;
            $loan['loan_owner_image']            = $edit_data->loan_owner_image;
            $loan['loan_owner_id_card']          = $edit_data->loan_owner_id_card;
            $loan['loan_owner_id_bk_img']        = $edit_data->loan_owner_id_bk_img;
            $loan['granter_image']               = $edit_data->granter_image;
            $loan['granter_id_card']             = $edit_data->granter_id_card;
            $loan['name']                        = $edit_data->name;
            $loan['mobile']                      = $edit_data->mobile;
            $loan['fathers_name']                = $edit_data->fathers_name;
            $loan['mothers_name']                = $edit_data->mothers_name;
            $loan['loan_owner_card_no']          = $edit_data->loan_owner_card_no;
            $loan['day']                         = $edit_data->day;
            $loan['month']                       = $edit_data->month;
            $loan['year']                        = $edit_data->year;
            $loan['loan_owner_zila']             = $edit_data->loan_owner_zila;
            $loan['loan_owner_upazila']          = $edit_data->loan_owner_upazila;
            $loan['loan_owner_union']            = $edit_data->loan_owner_union;
            $loan['loan_owner_pincode']          = $edit_data->loan_owner_pincode;
            $loan['loan_owner_gram']             = $edit_data->loan_owner_gram;
            $loan['loan_owner_branch']           = $edit_data->loan_owner_branch;
            $loan['loan_amount']                 = $edit_data->loan_amount;
            $loan['granter_name']                = $edit_data->granter_name;
            $loan['granter_day']                 = $edit_data->granter_day;
            $loan['granter_month']               = $edit_data->granter_month;
            $loan['granter_year']                = $edit_data->granter_year;
            $loan['granter_mobile']              = $edit_data->granter_mobile;
            $loan['granter_fathers_name']        = $edit_data->granter_fathers_name;
            $loan['granter_mothers_name']        = $edit_data->granter_mothers_name;
            $loan['granter_id_card_no']          = $edit_data->granter_id_card_no;
            $loan['granter_zila']                = $edit_data->granter_zila;
            $loan['granter_upazila']             = $edit_data->granter_upazila;
            $loan['granter_union']               = $edit_data->granter_union;
            $loan['granter_pincode']             = $edit_data->granter_pincode;
            $loan['granter_2_name']              = $edit_data->granter_2_name;
            $loan['granter_2_mobile']            = $edit_data->granter_2_mobile;
            $loan['granter_2_fathers_name']      = $edit_data->granter_2_fathers_name;
            $loan['granter_2_mothers_name']      = $edit_data->granter_2_mothers_name;
            $loan['granter_2_id_card_no']        = $edit_data->granter_2_id_card_no;
            $loan['granter_2_day']               = $edit_data->granter_2_day;
            $loan['granter_2_month']             = $edit_data->granter_2_month;
            $loan['granter_2_year']              = $edit_data->granter_2_year;
            $loan['granter_2_zila']              = $edit_data->granter_2_zila;
            $loan['granter_2_upazila']           = $edit_data->granter_2_upazila;
            $loan['granter_2_union']             = $edit_data->granter_2_union;
            $loan['granter_2_pincode']           = $edit_data->granter_2_pincode;
            $loan['granter_2_gram']              = $edit_data->granter_2_gram;
            $loan['granter__2_image']            = $edit_data->granter__2_image;
            $loan['granter_gram']                = $edit_data->granter_gram;

            DB::table('user_loan_profiles')->where('id', $edit_data->loan_id)->update($loan);

            DB::table('lon_edit_requests')->where('id', $id)->update(['deleted_at' => Carbon::now()]);


            DB::table('notifications')->insert([
                'user_id' => Auth::user()->id,
                'n_for' => 'manager',
                'n_type' => "Aproved Edit Request",
                'n_type_id' => '1',
            ]);

            return redirect('admin/dashboard/member-edit/list')->with('success', 'User Loan Profile Updated Successfully');

        } catch (Exception $th) {
            return redirect('admin/dashboard/member-edit/list')->with('error', 'Oops! Something Went Wrong');
        }
    }

    public function loanmember_EditRequestRejected($id){
        DB::table('lon_edit_requests')->where('id', $id)->update(['deleted_at' => Carbon::now()]);
        // DB::table('notifications')->insert([
        //     'user_id' => Auth::user()->id,
        //     'n_for' => 'manager',
        //     'n_type' => "Rejected Edit Request",
        //     'n_type_id' => '1',
        // ]);

        return redirect('admin/dashboard/member-edit/list')->with('error', 'User Loan Profile Edit Request Delete Successfully');

    }




























    /*--------Member Delete----------*/
    public function MemberDelete($id)
    {
        try {
            $data = DB::table('user_loan_profiles')->where('id', $id)->update(['deleted_at' => Carbon::now()]);
            return back()->with('success', 'Member Deleted Successfull');
        } catch (Exception $e) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }



    /*--------Profile View---------*/
    public function MemberView($id)
    {
        try {
            $data = DB::table('user_loan_profiles')->where('id', $id)->first();
            return view('admin.member-view-profile', compact('data'));
        } catch (Exception $e) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }






    public function loanmember_EditByAdmin($id)
    {
        $data = DB::table('user_loan_profiles')->where('id', $id)->first();
        return view('admin.admin-mamber-edit', compact('data'));
    }





    public function loanmember_EditByAdminPost(Request $request, $id)
    {



        try {
            $loan = [];
            $loan['chk_img']   = $request->chk_img;
            if ($request->hasFile('loan_owner_image')) {
                $image = $request->file('loan_owner_image');
                $ext = $image->extension();
                $file = time() . '.' . $ext;
                $image->move('uploads/loan_profile', $file);
                $loan['loan_owner_image'] = $file;
            }
            if ($request->hasFile('loan_owner_id_card')) {
                $image = $request->file('loan_owner_id_card');
                $ext = $image->extension();
                $file = time() . '.' . $ext;
                $image->move('uploads/loan_profile', $file);
                $loan['loan_owner_id_card'] = $file;
            }
            if ($request->hasFile('loan_owner_id_bk_img')) {
                $image = $request->file('loan_owner_id_bk_img');
                $ext = $image->extension();
                $file = rand(0000, 9999) . '.' . $ext;
                $image->move('uploads/loan_profile', $file);
                $loan['loan_owner_id_bk_img'] = $file;
            }
            if ($request->hasFile('granter_image')) {
                $image = $request->file('granter_image');
                $ext = $image->extension();
                $file = time() . '.' . $ext;
                $image->move('uploads/loan_profile', $file);
                $loan['granter_image'] = $file;
            }
            if ($request->hasFile('granter_id_card')) {
                $image = $request->file('granter_id_card');
                $ext = $image->extension();
                $file = time() . '.' . $ext;
                $image->move('uploads/loan_profile', $file);
                $loan['granter_id_card'] = $file;
            }

            $loan['name']                        = $request->name;
            $loan['mobile']                      = $request->mobile;
            $loan['fathers_name']                = $request->fathers_name;
            $loan['mothers_name']                = $request->mothers_name;
            $loan['loan_owner_card_no']          = $request->loan_owner_card_no;
            $loan['day']                         = $request->day;
            $loan['month']                       = $request->month;
            $loan['year']                        = $request->year;
            $loan['loan_owner_zila']             = $request->loan_owner_zila;
            $loan['loan_owner_upazila']          = $request->loan_owner_upazila;
            $loan['loan_owner_union']            = $request->loan_owner_union;
            $loan['loan_owner_pincode']          = $request->loan_owner_pincode;
            $loan['loan_owner_gram']             = $request->loan_owner_gram;
            $loan['loan_owner_branch']           = $request->loan_owner_branch;
            $loan['loan_amount']                 = $request->loan_amount;
            $loan['granter_name']                = $request->granter_name;
            $loan['granter_day']                 = $request->granter_day;
            $loan['granter_month']               = $request->granter_month;
            $loan['granter_year']                = $request->granter_year;
            $loan['granter_mobile']              = $request->granter_mobile;
            $loan['granter_fathers_name']        = $request->granter_fathers_name;
            $loan['granter_mothers_name']        = $request->granter_mothers_name;
            $loan['granter_id_card_no']          = $request->granter_id_card_no;
            $loan['granter_zila']                = $request->granter_zila;
            $loan['granter_upazila']                = $request->granter_upazila;
            $loan['granter_union']                = $request->granter_union;
            $loan['granter_pincode']             = $request->granter_pincode;
            $loan['granter_2_name']                            = $request->granter_2_name;
            $loan['granter_2_mobile']                            = $request->granter_2_mobile;
            $loan['granter_2_fathers_name']                            = $request->granter_2_fathers_name;
            $loan['granter_2_mothers_name']                            = $request->granter_2_mothers_name;
            $loan['granter_2_id_card_no']                            = $request->granter_2_id_card_no;
            $loan['granter_2_day']                            = $request->granter_2_day;
            $loan['granter_2_month']                            = $request->granter_2_month;
            $loan['granter_2_year']                            = $request->granter_2_year;
            $loan['granter_2_zila']                            = $request->granter_2_zila;
            $loan['granter_2_upazila']                            = $request->granter_2_upazila;
            $loan['granter_2_union']                            = $request->granter_2_union;
            $loan['granter_2_pincode']                            = $request->granter_2_pincode;
            $loan['granter_2_gram']                            = $request->granter_2_gram;
            if ($request->hasFile('granter__2_image')) {
                $image = $request->file('granter__2_image');
                $ext = $image->extension();
                $file = time() . '.' . $ext;
                $image->move('uploads/loan_profile', $file);
                $loan['granter__2_image'] = $file;
            }
            $loan['granter_gram']                = $request->granter_gram;


            $data = DB::table('user_loan_profiles')->where('id', $id)->update($loan);
            return back()->with('success', 'User Loan Profile Updated Successfully');
        } catch (Exception $th) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }






    /*--------Member Loan Approve From Super Admin-----------*/
    public function MemberLoanApprove($id)
    {

        try {
            $data = DB::table('user_loan_profiles')->where('id', $id)->update([
                'status'     => '2'
            ]);

            DB::table('notifications')->insert([
                'user_id' => Auth::user()->id,
                'n_for' => 'loanOfficer',
                'n_type' => "Approve Form",
                'n_type_id' => $id,
            ]);
            DB::table('notifications')->insert([
                'user_id' => Auth::user()->id,
                'n_for' => 'manager',
                'n_type' => "Approve Form",
                'n_type_id' => $id,
            ]);





            $loaninfo = DB::table('user_loan_profiles')->where('id', $id)->first();


            if ($loaninfo) {
                if ($loaninfo->mobile) {

                    $message = urlencode("Congratulations! Dear BFSS-Ltd. Customer. Your loan successfully approved. Loan amount BDT ".$loaninfo->loan_amount."৳ as on ". Carbon::now()->format('d-M, Y, h:m a').". For details please visit your offices.");

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





            return back()->with('success', 'Loan Approve Successfull');
        } catch (Exception $e) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }

    public function MemberLoanRejected($id)
    {
        try {
            $data = DB::table('user_loan_profiles')->where('id', $id)->update([
                'status'     => '3'
            ]);
            DB::table('notifications')->insert([
                'user_id' => Auth::user()->id,
                'n_for' => 'loanOfficer',
                'n_type' => "Rejected Form",
                'n_type_id' => $id,
            ]);

            DB::table('notifications')->insert([
                'user_id' => Auth::user()->id,
                'n_for' => 'manager',
                'n_type' => "Rejected Form",
                'n_type_id' => $id,
            ]);

            return back()->with('success', 'Loan Rejected Successfull');
        } catch (Exception $e) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }
}
