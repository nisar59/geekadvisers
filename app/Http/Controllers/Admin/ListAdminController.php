<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use DataTables;
class ListAdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listadmin_Page()
    {

        $req = request();
        if ($req->ajax()) {
          $strt   = $req->start;
          $length = $req->length;

          $users=DB::table('users');

          $total = $users->count();
          $users   = $users->offset($strt)->limit($length)->get();

          return DataTables::of($users)
            ->setOffset($strt)
            ->with([
              "recordsTotal"    => $total,
              "recordsFiltered" => $total,
            ])
            ->addColumn('action', function ($row) {
              return '<a href="' . url('admin/list-admin/' . $row->id.'/edit') . '" class="btn btn-info">Edit <i class="fa fa-edit"></i></a>
                      <a href="' . url('admin/list-admin/' . $row->id.'/delete') . '" class="btn btn-danger">Delete <i class="fa fa-edit"></i></a>';
            })

            ->addColumn('loginfo', function ($row) {
              return '<a href="' . url('admin/list-admin/' . $row->id.'/edit') . '" class="btn btn-info">Login Info <i class="fa fa-edit"></i></a>';
            })

            ->editColumn('id', function ($row) {
              return $row->id;
            })
            ->editColumn('name', function ($row) {
              return $row->name;
            })
            ->editColumn('email', function ($row) {
              return $row->email;
            })
            ->addColumn('is_admin', function ($row) {
              $role='';
              if($row->is_admin==1){$role='Super Admin';}
              if($row->is_admin==2){$role='Loan Manager <br> <b>(Branch Name: '.$row->manager_branch.')</b>';}
              if($row->is_admin==3){$role='Loan Manager <br> <b>(Under: '.$row->manager_branch.' Branch)</b>';}
              if($row->is_admin==4){$role='Notice Admin';}
              return $role;
            })
            ->rawColumns(['is_admin','loginfo','action'])
            ->make(true);
        }


        return view('admin.list-admin');
    }



    public function listadmin_Post(Request $request)
    {
        $request->validate(
            [
                'name'            => 'required',
                'email'           => 'required||string||max:255||unique:users',
                'password'        => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
                'is_admin'        => 'required'
            ],
            [
                'email.required' => 'User Name Fild id Required',
                'email.unique'   => 'User Name Must be Unique',
            ]
        );


        $data = DB::table('users')->insert([
            'name'               =>  $request->name,
            'email'              => $request->email,
            'phone'              => $request->phone,
            'manager_branch'     => $request->manager_branch,
            'password'           => Hash::make($request->password),
            'is_admin'           => $request->is_admin
        ]);


        return back()->with('success', 'Admin Created Successully');
    }


    public function listadmin_Edit($id)
    {
        $data = DB::table('users')->where('id', $id)->first();
        return view('admin.admin-edit', compact('data'));
    }

    public function listadmin_Update(Request $request, $id){



        $request->validate(
            [
                'name'            => 'required',
                'email'           => 'required||string||max:255||unique:users,email,'.$id,
                'is_admin'        => 'required'
            ],
            [
                'email.required' => 'User Name Fild id Required',
                'email.unique'   => 'User Name Must be Unique',
            ]
        );

        if ($request->password) {
            $request->validate(
                [
                'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
                ]
            );

        }

        $data = DB::table('users')->where('id', $id)->update([
            'name'   =>  $request->name,
            'email'        => $request->email,
            'phone'     => $request->phone,
            'manager_branch'    => $request->manager_branch,
            'password'    => Hash::make($request->password),
            'is_admin'    => $request->is_admin
        ]);

        return back()->with('success', 'Admin Updated Successully');
    }

    public function listadmin_Delete($id)
    {
        $data = DB::table('users')->where('id', $id)->delete();
        return back()->with('success', 'Admin Deleted Successfully');
    }
}
