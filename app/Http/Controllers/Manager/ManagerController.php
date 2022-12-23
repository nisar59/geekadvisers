<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\LonEditRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ManagerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $manager_id = Auth::user()->id;
        $data = DB::table('users')->where('manager_id', $manager_id)->get();
        return view('manager.create-loan-officer', ['data' => $data]);
    }









    public function create_loan_officer(Request $request)
    {

        $request->validate(
            [
                'name'            => 'required',
                'email'           => 'required||string||max:255||unique:users',
                'phone'           => 'required',
                'password'        => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            ],
            [
                'email.required' => 'User Name Fild id Required',
                'email.unique'   => 'User Name Must be Unique',
            ]
        );


        $manager_id = Auth::user()->id;
        $manager_branch = Auth::user()->manager_branch;
        $data = DB::table('users')->insert([
            'name'              =>  $request->name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'manager_branch'    => $manager_branch,
            'manager_id'        => $manager_id,
            'password'          => Hash::make($request->password),
            'is_admin'          => $request->is_admin
        ]);
        return back()->with('success', 'Loan Officer Created Successully');
    }

    public function loan_officer_edit($id)
    {
        $data = DB::table('users')->where('id', $id)->first();
        return view('manager.loan-officer-edit', compact('data'));
    }

    public function loan_officer_update(Request $request, $id)
    {
        $request->validate(
            [
                'name'            => 'required',
                'email'           => 'required||string||max:255||unique:users,email,'.$id,
                'phone'           => 'required',
            ],
            [
                'email.required' => 'User Name Fild id Required',
                'email.unique'   => 'User Name Must be Unique',
            ]
        );

        if (!empty($request->password)) {
            $request->validate(
                [
                    'password'        => [Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
                ]
            );
        }

        $manager_branch = Auth::user()->manager_branch;
        $data = DB::table('users')->where('id', $id)->update([
            'name'   =>  $request->name,
            'email'        => $request->email,
            'phone'     => $request->phone,
            'manager_branch'    => $manager_branch,
            'password'    => Hash::make($request->password),
            'is_admin'    => $request->is_admin
        ]);
        return back()->with('success', 'Loan Officer Updated Successully');
    }



    /*-------Loan Member List--------*/
    public function loanMemberList()
    {
        $manager_id = Auth::user()->id;
        $data = DB::table('user_loan_profiles')->whereNull('deleted_at')->where('manager_id', $manager_id)->get();
        return view('manager.loan-member-list', ['data' => $data]);
    }





    /*------Member Profile View--------*/
    public function memberProfileView($id)
    {
        $data = DB::table('user_loan_profiles')->where('id', $id)->first();
        return view('manager.member-profile-view', compact('data'));
    }

    public function memberProfileEdit($id)
    {
        $data = DB::table('user_loan_profiles')->where('id', $id)->first();
        return view('manager.member-profile-edit', compact('data'));
    }


    /*--------Loan Approve Logic--------------*/
    public function loanApprove($id){
        try {
            $data = DB::table('user_loan_profiles')->whereNull('deleted_at')->where('id', $id)->update([
                'status'       => '1'
            ]);

            DB::table('notifications')->insert([
                'user_id' => Auth::user()->id,
                'n_for' => 'superAdmin',
                'n_type' => "Approve Form",
                'n_type_id' => $id,
            ]);

            DB::table('notifications')->insert([
                'user_id' => Auth::user()->id,
                'n_for' => 'noticeAdmin',
                'n_type' => "Approve Form",
                'n_type_id' => $id,
            ]);

            DB::table('notifications')->insert([
                'user_id' => Auth::user()->id,
                'n_for' => 'loanOfficer',
                'n_type' => "Approve Form",
                'n_type_id' => $id,
            ]);



            return back()->with('success', 'Loan Approve Successully');
        } catch (Exception $e) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }


    public function loanRejected(Request $request, $id)
    {
        try {
            $manager_name = Auth::user()->name;
            $data = DB::table('user_loan_profiles')->where('id', $id)->update([
                'rejected_reason'   => $request->rejected_reason,
                'status'       => '3',
                'manager_name'  => $manager_name,
            ]);


            DB::table('notifications')->insert([
                'user_id' => Auth::user()->id,
                'n_for' => 'superAdmin',
                'n_type' => "Rejected Form",
                'n_type_id' => $id,
            ]);

            DB::table('notifications')->insert([
                'user_id' => Auth::user()->id,
                'n_for' => 'noticeAdmin',
                'n_type' => "Rejected Form",
                'n_type_id' => $id,
            ]);

            DB::table('notifications')->insert([
                'user_id' => Auth::user()->id,
                'n_for' => 'loanOfficer',
                'n_type' => "Rejected Form",
                'n_type_id' => $id,
            ]);


            return back()->with('success', 'Loan Rejected Successully');
        } catch (Exception $e) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }



    /*--------Loan Member Edit--------------*/
    public function loanmember_Edit($id)
    {
        $data = DB::table('user_loan_profiles')->where('id', $id)->first();
        return view('manager.loan-member-edit', compact('data'));
    }

    /*---------Loan Member Update-------------*/
    public function loanmember_UpdateRequest(Request $request, $id)
    {

        $user_loan_profile_data = DB::table('user_loan_profiles')->where('id', $id)->first();

        $request->validate([
            'edit_reason' => 'required'
        ]);

        try {
            $loan = [];
            $loan['chk_img']   = $request->chk_img;
            if ($request->hasFile('loan_owner_image')) {
                $image = $request->file('loan_owner_image');
                $ext = $image->extension();
                $file = time() . '.' . $ext;
                $image->move('uploads/loan_profile', $file);
                $loan['loan_owner_image'] = $file;
            } else {
                $loan['loan_owner_image'] = $user_loan_profile_data->loan_owner_image;
            }

            if ($request->hasFile('loan_owner_id_card')) {
                $image = $request->file('loan_owner_id_card');
                $ext = $image->extension();
                $file = time() . '.' . $ext;
                $image->move('uploads/loan_profile', $file);
                $loan['loan_owner_id_card'] = $file;
            } else {
                $loan['loan_owner_id_card'] = $user_loan_profile_data->loan_owner_id_card;
            }
            if ($request->hasFile('loan_owner_id_bk_img')) {
                $image = $request->file('loan_owner_id_bk_img');
                $ext = $image->extension();
                $file = rand(0000, 9999) . '.' . $ext;
                $image->move('uploads/loan_profile', $file);
                $loan['loan_owner_id_bk_img'] = $file;
            } else {
                $loan['loan_owner_id_bk_img'] = $user_loan_profile_data->loan_owner_id_bk_img;
            }
            if ($request->hasFile('granter_image')) {
                $image = $request->file('granter_image');
                $ext = $image->extension();
                $file = time() . '.' . $ext;
                $image->move('uploads/loan_profile', $file);
                $loan['granter_image'] = $file;
            } else {
                $loan['granter_image'] = $user_loan_profile_data->granter_image;
            }
            if ($request->hasFile('granter_id_card')) {
                $image = $request->file('granter_id_card');
                $ext = $image->extension();
                $file = time() . '.' . $ext;
                $image->move('uploads/loan_profile', $file);
                $loan['granter_id_card'] = $file;
            } else {
                $loan['granter_id_card'] = $user_loan_profile_data->granter_id_card;
            }

            if ($request->hasFile('granter__2_image')) {
                $image = $request->file('granter__2_image');
                $ext = $image->extension();
                $file = time() . '.' . $ext;
                $image->move('uploads/loan_profile', $file);
                $loan['granter__2_image'] = $file;
            } else {
                $loan['granter__2_image'] = $user_loan_profile_data->granter__2_image;
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
            $loan['granter_upazila']             = $request->granter_upazila;
            $loan['granter_union']               = $request->granter_union;
            $loan['granter_pincode']             = $request->granter_pincode;
            $loan['granter_2_name']              = $request->granter_2_name;
            $loan['granter_2_mobile']            = $request->granter_2_mobile;
            $loan['granter_2_fathers_name']      = $request->granter_2_fathers_name;
            $loan['granter_2_mothers_name']      = $request->granter_2_mothers_name;
            $loan['granter_2_id_card_no']        = $request->granter_2_id_card_no;
            $loan['granter_2_day']               = $request->granter_2_day;
            $loan['granter_2_month']             = $request->granter_2_month;
            $loan['granter_2_year']              = $request->granter_2_year;
            $loan['granter_2_zila']              = $request->granter_2_zila;
            $loan['granter_2_upazila']           = $request->granter_2_upazila;
            $loan['granter_2_union']             = $request->granter_2_union;
            $loan['granter_2_pincode']           = $request->granter_2_pincode;
            $loan['granter_2_gram']              = $request->granter_2_gram;
            $loan['granter_gram']                = $request->granter_gram;
            $loan['edit_reason']                 = $request->edit_reason;
            $loan['edit_by']                     = Auth::user()->id;
            $loan['loan_id']                     = $id;
            $loan['status']                      = $user_loan_profile_data->status;
            $loan['loan_officer_id']             = $user_loan_profile_data->loan_officer_id;
            $loan['manager_id']                  = $user_loan_profile_data->manager_id;
            $loan['manager_branch']              = $user_loan_profile_data->manager_branch;
            $loan['manager_name']                = $user_loan_profile_data->manager_name;

            $request_check = DB::table('lon_edit_requests')->whereNull('deleted_at')->where('loan_id', $id)->exists();

            if ($request_check) {
                DB::table('lon_edit_requests')->where('loan_id', $id)->update($loan);
            } else {
                DB::table('lon_edit_requests')->insert($loan);
            }

            return back()->with('success', 'User Loan Profile Update Request Send Successfully');


        } catch (Exception $th) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }
}
