<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OfficerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userProfile_form()
    {
        return view('loan_officer.user-form');
    }

    public function userProfile_post(Request $request)
    {


        $request->validate(
            [
                '*'                      => 'required',
                'loan_owner_image'       => 'mimes:jpeg,jpg,png',
                'loan_owner_id_card'     => 'mimes:jpeg,jpg,png',
                'loan_owner_id_bk_img'   => 'mimes:jpeg,jpg,png',
                'granter_image'          => 'mimes:jpeg,jpg,png',
                'granter__2_image'       => 'mimes:jpeg,jpg,png',
            ]
        );



        $loan_officer_id = Auth::user()->id;
        $manager_id = Auth::user()->manager_id;
        $manager_branch = Auth::user()->manager_branch;

        try {
            $loan = [];
            $loan['chk_img']   = null;
            $loan['status']                     = '0';
            $loan['loan_officer_id']            = $loan_officer_id;
            $loan['manager_id']                 = $manager_id;
            $loan['manager_branch']             = $manager_branch;
            $loan['name']                       = $request->name;
            $loan['mobile']                     = $request->mobile;
            $loan['fathers_name']               = $request->fathers_name;
            $loan['mothers_name']               = $request->mothers_name;
            $loan['loan_owner_card_no']         = $request->loan_owner_card_no;
            $loan['day']                        = $request->day;
            $loan['month']                      = $request->month;
            $loan['year']                       = $request->year;
            $loan['loan_owner_zila']            = $request->loan_owner_zila;
            $loan['loan_owner_upazila']         = $request->loan_owner_upazila;
            $loan['loan_owner_union']           = $request->loan_owner_union;
            $loan['loan_owner_pincode']         = $request->loan_owner_pincode;
            $loan['loan_owner_gram']            = $request->loan_owner_gram;
            $loan['loan_owner_branch']          = $request->loan_owner_branch;
            $loan['loan_amount']                = $request->loan_amount;
            $loan['granter_name']               = $request->granter_name;
            $loan['granter_day']                = $request->granter_day;
            $loan['granter_month']              = $request->granter_month;
            $loan['granter_year']               = $request->granter_year;
            $loan['granter_mobile']             = $request->granter_mobile;
            $loan['granter_fathers_name']       = $request->granter_fathers_name;
            $loan['granter_mothers_name']       = $request->granter_mothers_name;
            $loan['granter_id_card_no']         = $request->granter_id_card_no;
            $loan['granter_zila']               = $request->granter_zila;
            $loan['granter_upazila']            = $request->granter_upazila;
            $loan['granter_union']              = $request->granter_union;
            $loan['granter_pincode']            = $request->granter_pincode;
            $loan['granter_2_name']             = $request->granter_2_name;
            $loan['granter_2_mobile']           = $request->granter_2_mobile;
            $loan['granter_2_fathers_name']     = $request->granter_2_fathers_name;
            $loan['granter_2_mothers_name']     = $request->granter_2_mothers_name;
            $loan['granter_2_id_card_no']       = $request->granter_2_id_card_no;
            $loan['granter_2_day']              = $request->granter_2_day;
            $loan['granter_2_month']            = $request->granter_2_month;
            $loan['granter_2_year']             = $request->granter_2_year;
            $loan['granter_2_zila']             = $request->granter_2_zila;
            $loan['granter_2_upazila']          = $request->granter_2_upazila;
            $loan['granter_2_union']            = $request->granter_2_union;
            $loan['granter_2_pincode']          = $request->granter_2_pincode;
            $loan['granter_2_gram']             = $request->granter_2_gram;
            $loan['granter_gram']               = $request->granter_gram;
            $loan['loan_entry']                 = "0";


            $dataId = DB::table('user_loan_profiles')->insertGetId($loan);

            if ($dataId) {
                if ($request->hasFile('loan_owner_image')) {
                    $image = $request->file('loan_owner_image');
                    $ext = $image->extension();
                    $file = rand(0000, 9999) . '.' . $ext;
                    $image->move('uploads/loan_profile', $file);
                    $loan['loan_owner_image'] = $file;
                }
                if ($request->hasFile('loan_owner_id_card')) {
                    $image = $request->file('loan_owner_id_card');
                    $ext = $image->extension();
                    $file = rand(0000, 9999) . '.' . $ext;
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
                    $file = rand(0000, 9999) . '.' . $ext;
                    $image->move('uploads/loan_profile', $file);
                    $loan['granter_image'] = $file;
                }

                if ($request->hasFile('granter__2_image')) {
                    $image = $request->file('granter__2_image');
                    $ext = $image->extension();
                    $file = rand(0000, 9999) . '.' . $ext;
                    $image->move('uploads/loan_profile', $file);
                    $loan['granter__2_image'] = $file;
                }


                if ($request->hasFile('granter_id_card')) {
                    $image = $request->file('granter_id_card');
                    $ext = $image->extension();
                    $file = rand(0000, 9999) . '.' . $ext;
                    $image->move('uploads/loan_profile', $file);
                    $loan['granter_id_card'] = $file;
                }

                DB::table('user_loan_profiles')->where('id', $dataId)->update($loan);
            }



            $form_id = sprintf("%04d", $dataId);
            $data = DB::table('user_loan_profiles')->where('id', $dataId)->update([
                'form_id' => $form_id
            ]);


            DB::table('notifications')->insert([
                'user_id' => $loan_officer_id,
                'n_for' => 'manager',
                'n_type' => "New form",
                'n_type_id' => $dataId,
            ]);


            return back()->with('success', 'User Loan Profile Created Successfully');
        } catch (Exception $th) {
            return back()->with('error', 'Oops! Something Went Wrong');
        }
    }


    public function getUpazila(Request $request)
    {
        $did = $request->post('did');
        $state = DB::table('upazilas')->where('district_id', $did)->orderBy('name', 'asc')->get();
        $html = '<option value="">--Select Thana / Upazila --</option>';
        foreach ($state as $list) {
            $html .= '<option value="' . $list->id . ':' . '' . $list->name . '">' . $list->name . '</option>';
        }
        echo $html;
    }

    public function getUnions(Request $request)
    {
        $uid = $request->post('uid');
        $state = DB::table('unions')->where('upazilla_id', $uid)->orderBy('name', 'asc')->get();
        $html = '<option value="">--Select Union--</option>';
        foreach ($state as $list) {
            $html .= '<option value="' . $list->id . ':' . '' . $list->name . '">' . $list->name . '</option>';
        }
        echo $html;
    }

    public function getgranter_Upazila(Request $request)
    {
        $did = $request->post('did');
        $state = DB::table('upazilas')->where('district_id', $did)->orderBy('name', 'asc')->get();
        $html = '<option value="">--Select Thana / Upazila --</option>';
        foreach ($state as $list) {
            $html .= '<option value="' . $list->id . ':' . '' . $list->name . '">' . $list->name . '</option>';
        }
        echo $html;
    }

    public function getgranter_Unions(Request $request)
    {
        $uid = $request->post('uid');
        $state = DB::table('unions')->where('upazilla_id', $uid)->orderBy('name', 'asc')->get();
        $html = '<option value="">--Select Union--</option>';
        foreach ($state as $list) {
            $html .= '<option value="' . $list->id . ':' . '' . $list->name . '">' . $list->name . '</option>';
        }
        echo $html;
    }


    public function getgranter_2_Upazila(Request $request)
    {
        $did = $request->post('did');
        $state = DB::table('upazilas')->where('district_id', $did)->orderBy('name', 'asc')->get();
        $html = '<option value="">--Select Thana / Upazila --</option>';
        foreach ($state as $list) {
            $html .= '<option value="' . $list->id . ':' . '' . $list->name . '">' . $list->name . '</option>';
        }
        echo $html;
    }

    public function getgranter_2_Unions(Request $request)
    {
        $uid = $request->post('uid');
        $state = DB::table('unions')->where('upazilla_id', $uid)->orderBy('name', 'asc')->get();
        $html = '<option value="">--Select Union--</option>';
        foreach ($state as $list) {
            $html .= '<option value="' . $list->id . ':' . '' . $list->name . '">' . $list->name . '</option>';
        }
        echo $html;
    }
}
