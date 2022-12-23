@extends('admin.layout.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@if (Auth::user()->is_admin == 2)
    @section('title', 'Loan Manager Dashboard')
@endif

@if (Auth::user()->is_admin == 3)
    @section('title', 'Loan Officer Dashboard')
@endif

@if (Auth::user()->is_admin == 3)
    @section('title', 'Notice Admin Dashboard')
@endif

@section('content')

    <style>
        h4 {
            color: #fff;
        }

        p {
            color: #fff;
        }
    </style>

    @if (Auth::user()->is_admin == 1)
        <main class="app-content">
            <h3>Add Notice</h3>
            <hr />
            <div class="row">

                <div class="col-md-6">
                    <div class="tile">
                        <!---Success Message--->

                        <!---Error Message--->


                        <div class="tile-body">
                            <form method="post">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label class="control-label">Add Notice</label>
                                    <input class="form-control" name="notice" id="category" type="text"
                                        placeholder="Add Notice">
                                    {{-- @if ($errors->has('notice'))
        					    <div class="text-danger">{{ $errors->first('notice') }}</div>
        					@endif --}}
                                </div>
                                <div class="form-group col-md-4 align-self-end">

                                    <input type="submit" name="submit" id="submit" class="btn btn-primary"
                                        value="Create">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Notice Name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                @php
                                    $data = DB::table('notice_tbls')->get();
                                @endphp
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->notice }}</td>
                                        <td>
                                            <a href="{{ route('notice.edit', $data->id) }}"><button class="btn btn-info"
                                                    type="button">Edit&nbsp;<i class="fa-solid fa-pen"></i></button>

                                                <a href="{{ route('notice.delete', $data->id) }}"
                                                    onclick="return confirm('Are you Sure?')"><button class="btn btn-danger"
                                                        type="button">Delete&nbsp;<i
                                                            class="fa-solid fa-trash"></i></button>
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
    @endif

    @if (Auth::user()->is_admin == 2)
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <main class="app-content">
            <style>
                .marquee {
                    margin-bottom: 20px;
                    background: linear-gradient(to right, #40e0d0, #ff8c00, #ff0080);
                    padding: 10px 10px;
                    color: white;
                    font-weight: 600;
                }
            </style>
            <div class="marquee">
                <marquee>স্বাগতম আপনাকে</marquee>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">

                    <a href="{{ route('create.loan.officer') }}">
                        <div class="widget-small danger coloured-icon" style="height: 80px;background: #5ed3b0"><i
                                class="icon fa fa-user fa-3x" style="height: 80px;background: #5ed3b0"></i>
                            <div class="info">
                                {{-- @php
                  $id = Auth::user()->id;
                    $officer = DB::table('users')->where('manager_id', $id)->count();
                  @endphp --}}
                                <h4>Total Officer</h4>
                                {{-- <p><b>{{$officer}}</b></p> --}}
                            </div>
                        </div>
                    </a>

                </div>


                <div class="col-md-6 col-lg-6">

                    <a href="{{ url('home/loan-member-list') }}">
                        <div class="widget-small warning coloured-icon"style="background: #ff483d"><i
                                class="icon fa fa-user fa-3x" style="background: #ff483d"></i>
                            <div class="info">
                                {{-- @php
                  $id = Auth::user()->id;
                    $member = DB::table('user_loan_profile')->where('manager_id', $id)->count();
                  @endphp --}}
                                <h4>Total Member</h4>
                                {{-- <p><b>{{$member}}</b></p> --}}
                            </div>
                        </div>
                    </a>

                </div>









            </div>

        </main>
    @endif


    @if (Auth::user()->is_admin == 3)
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <main class="app-content">
            <style>
                .marquee {
                    margin-bottom: 20px;
                    background: linear-gradient(to right, #40e0d0, #ff8c00, #ff0080);
                    padding: 10px 10px;
                    color: white;
                    font-weight: 600;
                }
            </style>
            <div class="marquee">
                <marquee>স্বাগতম আপনাকে</marquee>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">

                    <a href="">
                        <div class="widget-small danger coloured-icon" style="height: 80px;background: #5ed3b0 !important">
                            <i class="icon fa-light fa-bangladeshi-taka-sign fa-3x"
                                style="height: 80px;background: #5ed3b0 !important">৳</i>
                            <div class="info">
                                <h4>Today Amount</h4>
                                <p><b>8</b></p>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-md-6 col-lg-6">

                    <a href="">
                        <div class="widget-small danger coloured-icon" style="background: #ff483d !important"><i
                                class="icon fa-solid fa-handshake fa-3x" style="background: #ff483d !important"></i>
                            <div class="info">
                                {{-- @php
                $id = Auth::user()->id;

                $data = DB::table('user_loan_profile')
                        ->where('loan_officer_id', $id)
                        ->where('sms', 'send')
                        ->count();

              @endphp --}}
                                <h4>Today Loans</h4>
                                {{-- <p><b>{{$data}}</b></p> --}}
                            </div>
                        </div>
                    </a>

                </div>

                <div class="col-md-6 col-lg-6">

                    <a href="">
                        <div class="widget-small warning coloured-icon" style="background: #fc8d03"><i
                                class="icon fa fa-user fa-3x" style="background: #fc8d03"></i>
                            <div class="info">
                                {{-- @php
                $id = Auth::user()->id;

                $data = DB::table('user_loan_profile')
                        ->where('loan_officer_id', $id)
                        ->count();

              @endphp --}}
                                <h4>Total Account</h4>
                                {{-- <p><b>{{$data}}</b></p> --}}
                            </div>
                        </div>
                    </a>

                </div>

            </div>

        </main>
    @endif


@endsection



















