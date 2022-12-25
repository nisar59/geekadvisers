@extends('admin.layout.master')
@section('title', 'Loan Submit')
@section('content')
<style>
@media only screen and (max-width: 600px) {
.tile {
overflow-x: scroll;
}
}
</style>
<main class="app-content">
    <hr />
    <div class="row">
        <div class="col-md-12">
            <div class="tile" style="border-top: 3px solid #009688;border-radius: 13px 13px 0px 0px;">
                <div class="tile-body">
                    <h1>Amount Received Form</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Enter Form No</label>
                                <input type="number" class="form-control" placeholder="Enter Form No">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Name</th>
                                    <th>Loan Amount</th>
                                    <th>Due Amount</th>
                                    <th>Enter Recived Amount</th>
                                    <th>Remarks</th>
                                    <th>Submit</th>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td>Name of loan customer</td>
                                        <td>Loan Amount</td>
                                        <td>Due Amount</td>
                                        <td>
                                            <input id="" type="text" class="form-control"
                                            name="loan_entry_amount" placeholder="Enter Recived Amount">
                                        </td>
                                        <td>
                                            <textarea name="remarks" class="form-control" placeholder="Enter Remarks"></textarea>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" type="button">Submit</button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <b>Name: </b>
                            <b>Father Name: </b>
                            <b>Mobile Name: </b>
                        </div>
                        <div class="col-4">

                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('js')
<script>
$(document).ready(function() {
});
</script>
@endsection