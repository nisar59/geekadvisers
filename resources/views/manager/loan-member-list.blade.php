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
                        <table class="table table-hover table-bordered" id="sampleTable">
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

                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/loan_profile/') . '/' . $data->loan_owner_image }}"
                                                style="width: 78px;height: 78px;">
                                        </td>
                                        <td>{{ $data->name }}</td>

                                        <td>
                                            <a href="{{ url('home/member-profile-view/'.$data->id) }}"
                                                class="btn btn-info">View&nbsp;<i class="fa-solid fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ url('home/loan-member/edit/'.$data->id) }}"
                                                class="btn btn-primary">Edit&nbsp;<i class="fa-solid fa-pen"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ url('home/manager/print-single-user/'.$data->id) }}"
                                                onclick="return confirm('Are you Sure?')"><button class="btn btn-secondary"
                                                    type="button">Print&nbsp;<i class="fa-solid fa-print"></i></button>
                                        </td>
                                        <td>
                                            @if ($data->status == 0)
                                                <button class="btn btn-danger">Pending</button>
                                            @elseif($data->status == 1 || $data->status == 2)
                                                <button class="btn btn-success">Approve&nbsp;<i
                                                        class="fa-solid fa-check"></i></button>
                                            @else
                                                <button class="btn btn-danger">Rejected</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.js"
        integrity="sha512-BaXrDZSVGt+DvByw0xuYdsGJgzhIXNgES0E9B+Pgfe13XlZQvmiCkQ9GXpjVeLWEGLxqHzhPjNSBs4osiuNZyg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#btn-print').printPage();
        });
    </script>

@endsection
