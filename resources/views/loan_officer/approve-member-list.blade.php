@extends('admin.layout.master')
@section('title', 'Mamber List')
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
                <div class="tile" style="border-top: 3px solid #009688;border-radius: 13px 13px 0px 0px;">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="dt-table">
                            <thead>
                                <tr>
                                    <th>Form ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Branch Name</th>
                                    <th>Loan Amount</th>
                                    <th>View</th>
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
url:"{{ url('home/loan-officer-member-list') }}",
data:data,
},
columns: [
{data: 'form_id', name: 'form_id'},
{data: 'image', name: 'image',orderable: false, searchable: false},
{data: 'name', name: 'name'},
{data: 'loan_owner_branch', name: 'loan_owner_branch'},
{data: 'loan_amount', name: 'loan_amount'},
{data: 'view', name: 'view', orderable: false, searchable: false},
{data: 'status', name: 'status', orderable: false, searchable: false, class: 'text-center'},
],
});
}
dt_datatable();
});
</script>
@endsection
