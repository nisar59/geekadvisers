@extends('admin.layout.master')
@section('title', 'List Admin')
@section('content')
<style>
@media only screen and (max-width: 600px) {
.tile {
overflow-x: scroll;
}
}
</style>
<main class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="tile" style="    border-top: 3px solid #009688;border-radius: 13px 13px 0px 0px;">
                <!---Success Message--->
                <!---Error Message--->
                <div class="tile-body">
                    <form method="post">
                        @csrf
                        <div class="form-group col-md-12">
                            <label class="control-label">Name</label>
                            <input class="form-control" name="name" id="category" type="text" placeholder="Name">
                            @if ($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">User Name</label>
                            <input class="form-control" name="email" id="category" type="text"
                            placeholder="User Name">
                            @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Mobile No</label>
                            <input class="form-control" name="phone" type="text" placeholder="Mobile No">
                            @if ($errors->has('phone'))
                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                        <style>
                        .toggle-password {
                        float: right;
                        cursor: pointer;
                        margin-right: 10px;
                        margin-top: -25px;
                        }
                        </style>
                        <div class="form-group col-md-12">
                            <label class="control-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" value="">
                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                            @if ($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-12" style="display:none;" id="branch">
                            <label class="control-label">Manager Branch Name</label>
                            <input class="form-control" name="manager_branch" type="text"
                            placeholder="Manager Branch Name">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Role</label>
                            <select name="is_admin" id="val" class="form-control">
                                <option value="">--Select Role--</option>
                                <option value="2"> Manager</option>
                                <option value="3">Loan Officer</option>
                                <option value="4">Notice Admin</option>
                            </select>
                            @if ($errors->has('is_admin'))
                            <div class="text-danger">{{ $errors->first('is_admin') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-4 align-self-end">
                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Create">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile" style="    border-top: 3px solid #009688;border-radius: 13px 13px 0px 0px;">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="dt-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Login Info</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


@section('js')

<script>
$(document).ready(function(){
    var dt_table=null;
    function dt_datatable(data={}) {
      console.log(data);
       dt_table=$("#dt-table").DataTable({
        processing:true,
        serverSide: true,
        select:true,
        paging:true,
        ajax: {
              url:"{{ url('admin/list-admin') }}",
              data:data,
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'is_admin', name: 'is_admin',orderable: false, searchable: false},
            {data: 'loginfo', name: 'loginfo', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
       });
    }
  dt_datatable();



    $("#val").on('change', function() {
        if ($(this).val() == 2) {
            $('#branch').show();
        } else {
            $('#branch').hide();
        }
    });
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        input = $(this).parent().find("input");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
});
</script>
@endsection