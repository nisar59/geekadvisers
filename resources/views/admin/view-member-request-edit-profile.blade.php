@extends('admin.layout.master')
@section('title', 'Member Profile View')
@section('content')
    <style>
        @media only screen and (max-width: 600px) {
            .tile {
                overflow-x: scroll;
            }
        }

        .tile {
            border-top: 3px solid #009688;
            border-radius: 13px 13px 0px 0px;
        }

        h4 {
            background: #ffe1e1;
            padding: 4px;
            font-size: 17px;
        }
    </style>
    <main class="app-content">


        <div class="row">
            <div class="col-md-12">
                <div class="tile">

                    <!---Success Message--->
                    <div class="alert alert-danger">
                        <li>{{ $data->edit_reason }}</li>
                    </div>
                    <!---Error Message--->


                    <div class="tile-body">
                        <h4>লোন গ্রাহকের তথ্য :</h4>
                        <table class="table table-hover table-bordered">

                            <thead>
                                <tr>
                                    <th>গ্রাহকের নাম</th>
                                    <th>{{ $data->name }}</th>
                                    <th>গ্রাহকের ছবি</th>
                                    <td>
                                        <img src="{{ asset('uploads/loan_profile/') . '/' . $data->loan_owner_image }}"
                                            style="width: 67px;">
                                    </td>
                                </tr>
                                <tr>
                                    <th>গ্রাহকের মোবাইল নম্বর </th>
                                    <td>{{ $data->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>আইডি কার্ডের নম্বর </th>
                                    <th>{{ $data->loan_owner_card_no }}</th>
                                    <th>আইডি কার্ডের ছবি</th>
                                    <td>
                                        <img src="{{ asset('uploads/loan_profile/') . '/' . $data->loan_owner_id_card }}"
                                            style="    width: 112px;
    height: 93px;">
                                        <img src="{{ asset('uploads/loan_profile/') . '/' . $data->loan_owner_id_bk_img }}"
                                            style="    width: 112px;
    height: 93px;">
                                    </td>
                                </tr>
                                <tr>
                                    <th>পিতার নাম</th>
                                    <td>{{ $data->fathers_name }}</td>
                                    <th>মাতার নাম</th>
                                    <td>{{ $data->mothers_name }}</td>
                                </tr>

                                <tr>

                                    <th>জন্ম তারিখ</th>
                                    <td>{{ $data->day }}-দিন</td>
                                    <td>{{ $data->month }}-মাস</td>
                                    <td>{{ $data->year }}-বছর</td>
                                </tr>

                                <tr>

                                    @php
                                        $zela = preg_replace('/\d/', '', $data->loan_owner_zila);
                                    @endphp

                                    @php
                                        $upazela = preg_replace('/\d/', '', $data->loan_owner_upazila);
                                    @endphp

                                    @php
                                        $union = preg_replace('/\d/', '', $data->loan_owner_union);
                                    @endphp


                                    <th>স্থায়ী ঠিকানা</th>
                                    <td>জেলা&nbsp;{{ $zela }}</td>
                                    <td>উপজেলা&nbsp;{{ $upazela }}</td>
                                    <td>ইউনিয়ন&nbsp;{{ $union }}</td>
                                </tr>


                                <tr>

                                    <th>ডাকঘর</th>
                                    <td>{{ $data->loan_owner_pincode }}</td>
                                    <th>গ্রাম </th>
                                    <td>{{ $data->loan_owner_gram }}</td>

                                </tr>

                                <tr>

                                    <th>শাখা </th>
                                    <td>{{ $data->loan_owner_branch }}</td>
                                    <th>লোণের পরিমান </th>
                                    <td style="font-weight: 800;">{{ $data->loan_amount }} ৳</td>

                                </tr>



                            </thead>


                        </table>
                        <h4>গ্রান্টার ১ নম্বর তথ্য :</h4>
                        <table class="table table-hover table-bordered">


                            <tr>
                                <th>গ্রান্টার নাম</th>
                                <th>{{ $data->granter_name }}</th>
                                <th>গ্রান্টার ছবি</th>
                                <td>
                                    <img src="{{ asset('uploads/loan_profile/') . '/' . $data->granter_image }}"
                                        style="width: 79px;height: 79px;">
                                </td>
                            </tr>
                            <tr>
                                <th>গ্রান্টার মোবাইল নম্বর</th>
                                <td>{{ $data->granter_mobile }}</td>
                                <th>আইডি কার্ডের নম্বর </th>
                                <th>{{ $data->granter_id_card_no }}</th>

                            </tr>
                            <tr>
                                <th>পিতার নাম</th>
                                <td>{{ $data->granter_fathers_name }}</td>
                                <th>মাতার নাম</th>
                                <td>{{ $data->granter_mothers_name }}</td>
                            </tr>

                            <tr>

                                <th>জন্ম তারিখ</th>
                                <td>{{ $data->granter_day }}-দিন</td>
                                <td>{{ $data->granter_month }}-মাস</td>
                                <td>{{ $data->granter_year }}-বছর</td>
                            </tr>

                            <tr>

                                @php
                                    $granterzela = preg_replace('/\d/', '', $data->granter_zila);
                                @endphp

                                @php
                                    $granterupazela = preg_replace('/\d/', '', $data->granter_upazila);
                                @endphp

                                @php
                                    $granterunion = preg_replace('/\d/', '', $data->granter_union);
                                @endphp

                                <th>স্থায়ী ঠিকানা</th>
                                <td>জেলা&nbsp;{{ $granterzela }}</td>
                                <td>উপজেলা&nbsp;{{ $granterupazela }}</td>
                                <td>ইউনিয়ন&nbsp;{{ $granterunion }}</td>
                            </tr>


                            <tr>

                                <th>ডাকঘর</th>
                                <td>{{ $data->granter_pincode }}</td>
                                <th>গ্রাম </th>
                                <td>{{ $data->granter_gram }}</td>

                            </tr>




                        </table>

                        <!-------------------------Granter 2 information------------------->
                        <h4>গ্রান্টার ২ নম্বর তথ্য :</h4>
                        <table class="table table-hover table-bordered">


                            <tr>
                                <th>গ্রান্টার নাম</th>
                                <td>{{ $data->granter_2_name }}</td>
                                <th>গ্রান্টার ছবি</th>
                                <td>
                                    <img src="{{ asset('uploads/loan_profile/') . '/' . $data->granter__2_image }}"
                                        style="width: 79px;height: 79px;;">
                                </td>
                            </tr>
                            <tr>
                                <th>গ্রান্টার মোবাইল নম্বর</th>
                                <td>{{ $data->granter_2_id_card_no }}</td>
                                <th>আইডি কার্ডের নম্বর </th>
                                <th>{{ $data->granter_id_card_no }}</th>

                            </tr>
                            <tr>
                                <th>পিতার নাম</th>
                                <td>{{ $data->granter_2_fathers_name }}</td>
                                <th>মাতার নাম</th>
                                <td>{{ $data->granter_2_mothers_name }}</td>
                            </tr>

                            <tr>

                                <th>জন্ম তারিখ</th>
                                <td>{{ $data->granter_2_day }}-দিন</td>
                                <td>{{ $data->granter_2_month }}-মাস</td>
                                <td>{{ $data->granter_2_year }}-বছর</td>
                            </tr>

                            <tr>

                                @php
                                    $granterzela2 = preg_replace('/\d/', '', $data->granter_2_zila);
                                @endphp

                                @php
                                    $granterupazela2 = preg_replace('/\d/', '', $data->granter_2_upazila);
                                @endphp

                                @php
                                    $granterunion2 = preg_replace('/\d/', '', $data->granter_2_union);
                                @endphp


                                <th>স্থায়ী ঠিকানা</th>
                                <td>জেলা&nbsp;{{ $granterzela2 }}</td>
                                <td>উপজেলা&nbsp;{{ $granterupazela2 }}</td>
                                <td>ইউনিয়ন&nbsp;{{ $granterunion2 }}</td>
                            </tr>


                            <tr>

                                <th>ডাকঘর</th>
                                <td>{{ $data->granter_2_pincode }}</td>
                                <th>গ্রাম </th>
                                <td>{{ $data->granter_2_gram }}</td>

                            </tr>


                        </table>
                        <td>


                            <a href="{{ route('member.edit.request.aprove', $data->id) }}"
                                onclick="return confirm('Are you Sure?')">
                                <button class="btn btn-primary" type="button">Mearg Edit</button>
                            </a>
                            <a href="{{ route('member.edit.request.reject', $data->id) }}"
                                onclick="return confirm('Are you Sure?')">

                                <button class="btn btn-danger" type="button">Delete</button>
                            </a>


                        </td>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script></script>


@endsection
