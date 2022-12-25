@extends('admin.layout.master')
@section('title', 'List Member')
@section('content')
    <style>
        @media only screen and (max-width: 600px) {
            .tile {
                overflow-x: scroll;
            }
        }
    </style>

    <main class="app-content">
        <h3>Member List</h3>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="tile" style="    border-top: 3px solid #009688;border-radius: 13px 13px 0px 0px;">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="dt-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Print</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            

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
              url:"{{ url('home/loan-member-list') }}",
              data:data,
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image',orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'view', name: 'view',orderable: false, searchable: false},
            {data: 'edit', name: 'edit', orderable: false, searchable: false},
            {data: 'print', name: 'print', orderable: false, searchable: false},
            {data: 'status', name: 'status', orderable: false, searchable: false},
        ],
       });
    }
  dt_datatable();

});
</script>
@endsection