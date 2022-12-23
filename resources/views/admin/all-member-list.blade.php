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
                <div class="tile" style="border-top: 3px solid #009688;border-radius: 13px 13px 0px 0px;">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Form ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Branch Name</th>
                                    <th>Loan Amount</th>
                                    <th>View</th>
                                    <th>Print</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->form_id }}</td>
                                        <td>
                                            <img
                                                src="{{ asset('uploads/loan_profile/') . '/' . $data->loan_owner_image }}"style="width: 78px;height: 78px;">
                                        </td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->loan_owner_branch }}</td>
                                        <td>
                                            {{ $data->loan_amount }}
                                            @php
                                                $loan_entry = $data->loan_amount - $data->loan_entry;
                                            @endphp
                                            @if ($data->loan_entry)
                                                <p>Loan Amount: <b>{{ $data->loan_amount }}</b> </p>
                                                <p>Loan Entry: <b>{{ $data->loan_entry }}</b></p>
                                                <p>Due Amount: <b>({{ $data->loan_amount }} - {{ $data->loan_entry }})</b>
                                                </p>={{ $data->loan_amount - $data->loan_entry }}
                                            @endif

                                        </td>

                                        <td>
                                            <a href="{{ route('member.view.profile', $data->id) }}"
                                                class="btn btn-info">View&nbsp;
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('print.single.user', $data->id) }}"
                                                onclick="return confirm('Are you Sure?')"><button class="btn btn-secondary"
                                                    type="button">Print&nbsp;<i class="fa-solid fa-print"></i></button>
                                        </td>
                                        <td>
                                        @if ($data->status != 2)
                                            <a href="{{ route('member.edit.byadmin', $data->id) }}"
                                                class="btn btn-primary">
                                                Edit&nbsp;
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('member.delete', $data->id) }}"
                                                onclick="return confirm('Are you Sure?')">
                                                <button class="btn btn-danger" type="button">Delete&nbsp;
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>

                                        <td>
                                            @if ($data->status == 2)
                                                <button class="btn btn-success">
                                                    Approve&nbsp;
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            @elseif($data->status == 3)
                                                <button class="btn btn-danger">
                                                    Rejected&nbsp;
                                                </button>
                                            @else
                                                <button class="btn btn-danger">Pending</button>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script></script>




@endsection
