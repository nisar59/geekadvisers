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
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Loan Amount</th>
                                    <th>Due Amount</th>
                                    <th>Entry Amount</th>
                                    <th>Submit</th>
                                </tr>
                            </thead>

                            <tbody>
                                <form action="{{ route('loan.amount.entry') }}" method="POST">
                                    @csrf
                                    <input id="loan_id" type="hidden" value="0" name="id">

                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input name="form_number" id="form_number" type="text"
                                                    class="form-control" placeholder="Enter Form No.">
                                            </div>
                                        </td>
                                        <td id="customer_name">Name of loan customer</td>
                                        <td id="loan_amount">Loan Amount</td>
                                        <td id="due_Amount">Due Amount</td>
                                        <td>
                                            <div class="form-group">
                                                <input id="" type="text" class="form-control"
                                                    name="loan_entry_amount" placeholder="Enter Recived Amount">
                                            </div>
                                        </td>

                                        <td>
                                            <a onclick="return confirm('Are you Sure?')">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </a>
                                        </td>

                                    </tr>
                                </form>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>
        $(document).ready(function() {


            $('#form_number').keyup(function() {
                let did = $(this).val();

                $.ajax({
                    url: '<?php echo url('/getForminfo'); ?>',
                    type: 'post',
                    data: 'did=' + did + '&_token={{ csrf_token() }}',

                    success: function(result) {
                        var duce = jQuery.parseJSON(result);
                        if (duce.length === 0) {
                            $('#customer_name').html("Name...");
                            $('#loan_amount').html("Amount...");
                            $('#due_Amount').html("Due Amount...");
                            $('#loan_id').val(0);
                        } else {
                            $('#customer_name').html(duce[0].name);
                            $('#loan_amount').html(duce[0].loan_amount);
                            $('#due_Amount').html(duce[0].loan_amount - duce[0].loan_entry);
                            $('#loan_id').val(duce[0].id);
                        }

                    }

                });

            });


        });
    </script>

@endsection
