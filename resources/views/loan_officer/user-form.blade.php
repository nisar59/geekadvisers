@extends('loan_officer.layout.master')
@section('title', 'Create User Profile')
@section('content')
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
    <div class="row">
        <div class="col-md-12">
            <div class="tile" style="border-top: 4px solid #009688;border-radius: 10px 10px 0px 0px;">
                <!---Success Message--->
                <!---Error Message--->
                <div class="tile-body">
                    <form class="row" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-3">
                            <label class="control-label" style="font-weight:bold;">Name of loan customer ( In English
                            ):&nbsp;<sup style="color:red">*</sup> </label>
                            <input required="" type="text" class="form-control" value="{{old('name')}}" name="name"
                            placeholder="Name of loan customer">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label" style="font-weight:bold;"> Phone Number : ( In English
                            ):&nbsp;<sup style="color:red">*</sup> </label>
                            <input required="" type="number" class="form-control" name="mobile"
                            placeholder="Phone Number ">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Attach loan customer photo
                                :&nbsp;<sup style="color:red">*</sup>
                            </label>
                            <input required="" type="file" class="form-control" name="loan_owner_image"
                            onchange="readURL(this);">
                        </div>
                        <div class="form-group col-md-2">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/004/640/699/small/circle-upload-icon-button-isolated-on-white-background-vector.jpg"
                            id="img-src" style="border: 1px solid black; height: 103px; width: 98px;">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" style="font-weight:bold;">
                                Father's name ( In English ):&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="text"  class="form-control" name="fathers_name"
                            placeholder="Father's name">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="font-size: 12px;font-weight: bold;" class="control-label">
                                Attach loan customer ID Front photo :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="file" class="form-control" name="loan_owner_id_card"
                            onchange="readidcard_URL(this)">
                        </div>
                        <div class="form-group col-md-2">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/004/640/699/small/circle-upload-icon-button-isolated-on-white-background-vector.jpg"
                            id="id-card-img" style="border: 1px solid black; height: 103px; width: 98px;">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" style="font-weight:bold;">Mother's name ( In English ) :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required=""  type="text" class="form-control" name="mothers_name"
                            placeholder="Mother's name">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;font-size: 12px;">Attach loan customer ID Back photo :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="file" class="form-control" name="loan_owner_id_bk_img"
                            onchange="readBackImg(this);">
                        </div>
                        <div class="form-group col-md-2">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/004/640/699/small/circle-upload-icon-button-isolated-on-white-background-vector.jpg"
                            id="img-src-back" style="border: 1px solid black; height: 103px; width: 98px;">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" style="font-weight:bold;">
                                Enter loan customer ID Number :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="number" class="form-control" name="loan_owner_card_no"
                            placeholder="Enter loan customer ID Number">
                        </div>
                        <div class="col-lg-12">
                            <h6 style="background: #f0d6d6;padding: 4px;">Date of Birth :</h6>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">Day :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="day">
                                <option value="">--Select Day--</option>
                                @foreach(Days() as $day)
                                <option value="{{$day}}">{{$day}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">Month :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="month">
                                <option value="">--Select Month--</option>
                                @foreach(Months() as $month)
                                <option value="{{$month}}">{{$month}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">Year :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="year">
                                <option value="">--Select Year--</option>
                                @foreach(Years() as $year)
                                <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <h6 style="background: #f0d6d6;padding: 4px;">Permanent Address :</h6>
                        </div>
                        <div class="form-group col-lg-4">
                            @php
                            $district = DB::table('districts')->get();
                            @endphp
                            <label class="control-label" style="font-weight:bold;">
                                District :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" id="district" name="loan_owner_zila">
                                <option value="">--Select District--</option>
                                @foreach ($district as $district)
                                <option value="{{ $district->id }}:{{ $district->name }}">
                                {{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">Thana / Upazila :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="loan_owner_upazila" id="upazila_id">
                                <option value="">--Select Thana / Upazila--</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">Union :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="loan_owner_union" id="union_id">
                                <option value="">--Select Union --</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">Post office :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="text" class="form-control" name="loan_owner_pincode"
                            placeholder="Post office">
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">
                                Village :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="text" class="form-control" name="loan_owner_gram"
                            placeholder="Village">
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">
                                Branch : &nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="text" class="form-control" name="loan_owner_branch"
                            placeholder="Branch">
                        </div>
                        <div class="col-lg-12">
                            <hr style="border: 1px solid black">
                        </div>
                        <!--------------------------------------------------------------------------------Granter Information----------------------------------------------------------->
                        <div class="col-lg-12" style="margin-top:15px;">
                            <h6 style="background: #f0d6d6;padding: 4px;">Granter's Information No. 1 :</h6>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label" style="font-weight:bold;">
                                Granter Name : ( In English ):&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="text"  class="form-control" name="granter_name"
                            placeholder="Granter Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label" style="font-weight:bold;">
                                Granter Phone Number : ( In English ):
                                &nbsp;<sup style="color:red">*</sup>
                            </label>
                            <input required="" type="number" class="form-control" name="granter_mobile"
                            placeholder="Granter Phone Number">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Attach Granter photo :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="file" class="form-control" name="granter_image"
                            onchange="readGranter(this);">
                        </div>
                        <div class="form-group col-md-2">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/004/640/699/small/circle-upload-icon-button-isolated-on-white-background-vector.jpg"
                            id="img-granter" style="border: 1px solid black; height: 103px; width: 98px;">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Father's name ( In English ):&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="text"  class="form-control" name="granter_fathers_name"
                            placeholder="Father's name">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Mother's name ( In English )
                                :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="text"  class="form-control" name="granter_mothers_name"
                            placeholder="Mother's name" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Granter ID Card Number :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="number" class="form-control" name="granter_id_card_no"
                            placeholder="Granter ID Card Number">
                        </div>
                        <div class="col-lg-12">
                            <h6 style="background: #f0d6d6;padding: 4px;">Granter Date of Birth :</h6>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Day :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="granter_day">
                                <option value="">--Select Day--</option>
                                @foreach(Days() as $day)
                                <option value="{{$day}}">{{$day}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Month :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="granter_month">
                                <option value="">--Select Month--</option>
                                @foreach(Months() as $month)
                                <option value="{{$month}}">{{$month}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Year :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="granter_year">
                                <option value="">--Select Year--</option>
                                @foreach(Years() as $year)
                                <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <h6 style="background: #f0d6d6;padding: 4px;">Granter Permanent Address :</h6>
                        </div>
                        <div class="form-group col-lg-4">
                            @php
                            $district = DB::table('districts')->get();
                            @endphp
                            <label class="control-label" style="font-weight:bold;">
                                District :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" id="granterdistrict" name="granter_zila">
                                <option value="">--Select District--</option>
                                @foreach ($district as $district)
                                <option value="{{ $district->id }}:{{ $district->name }}">
                                {{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">
                                Thana / Upazila :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="granter_upazila"
                                id="granterupazila_id">
                                <option value="">--Select Thana / Upazila--</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">
                                Union :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="granter_union" id="granterunion_id">
                                <option value="">--Select Union --</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">
                                Post office :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="text" class="form-control" name="granter_pincode"
                            placeholder="Post office">
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">
                                Village :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="text" class="form-control" name="granter_gram"
                            placeholder="Village">
                        </div>
                        <div class="form-group col-lg-4"></div>
                        <div class="col-lg-12">
                            <hr style="border: 1px solid black">
                        </div>
                        <!-------------------------------------------------------------Granter Two Information--------------------------------------------------------->
                        <div class="col-lg-12" style="margin-top:15px;">
                            <h6 style="background: #f0d6d6;padding: 4px;">Granter's Information No. 2 :</h6>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label" style="font-weight:bold;">
                                Granter Name : ( In English ):&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="text"  class="form-control" name="granter_2_name"
                            placeholder="Granter Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label" style="font-weight:bold;">
                                Granter Phone Number : ( In English ):&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="number" class="form-control" name="granter_2_mobile"
                            placeholder="Granter Phone Number">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Attach Granter photo:&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="file" class="form-control" name="granter__2_image"
                            onchange="read2Granter(this);">
                        </div>
                        <div class="form-group col-md-2">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/004/640/699/small/circle-upload-icon-button-isolated-on-white-background-vector.jpg"
                            id="img2-granter" style="border: 1px solid black;height: 103px; width: 98px;">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Father's name ( In English ):&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="text"  class="form-control" name="granter_2_fathers_name"
                            placeholder="Father's name">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Mother's name ( In English ):&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input type="text"  class="form-control" name="granter_2_mothers_name"
                            placeholder="Mother's name" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Granter ID Card Number :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="number" class="form-control" name="granter_2_id_card_no"
                            placeholder="Granter ID Card Number">
                        </div>
                        <div class="col-lg-12">
                            <h6 style="background: #f0d6d6;padding: 4px;">Granter Date of Birth :</h6>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Day :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="granter_2_day">
                                <option value="">--Select Day--</option>
                                @foreach(Days() as $day)
                                <option value="{{$day}}">{{$day}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Month :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="granter_2_month">
                                <option value="">--Select Month--</option>
                                @foreach(Months() as $month)
                                <option value="{{$month}}">{{$month}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" style="font-weight:bold;">
                                Year :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="granter_2_year">
                                <option value="">--Select Year--</option>
                                @foreach(Years() as $year)
                                <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <h6 style="background: #f0d6d6;padding: 4px;">Granter Permanent Address :</h6>
                        </div>
                        <div class="form-group col-lg-4">
                            @php
                            $district = DB::table('districts')->get();
                            @endphp
                            <label class="control-label" style="font-weight:bold;">
                                District :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" id="granter_2_district"
                                name="granter_2_zila">
                                <option value="">--Select District--</option>
                                @foreach ($district as $district)
                                <option value="{{ $district->id }}:{{ $district->name }}">
                                {{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">
                                Thana / Upazila :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="granter_2_upazila"
                                id="granterupazila_two_id">
                                <option value="">--Select Thana / Upazila--</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">
                                Union :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <select required="" class="form-control" name="granter_2_union"
                                id="granterunion_two_id">
                                <option value="">--Select Union --</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">
                                Post office :&nbsp;
                                <sup style="color:red">*</sup>
                            </label>
                            <input required="" type="text" class="form-control" name="granter_2_pincode"
                            placeholder="Post office">
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">Village :&nbsp;<sup
                            style="color:red">*</sup> </label>
                            <input required="" type="text" class="form-control" name="granter_2_gram"
                            placeholder="Village">
                        </div>
                        <div class="form-group col-lg-4"></div>
                        <!-- --------------------------------------------------------------------------------------
                                                            Loan Amount Calculation
                        ---------------------------------------------------------------------------------------- -->

                        <div class="col-lg-12">
                            <hr style="border: 1px solid black">
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">Loan Amount :&nbsp;<sup
                            style="color:red">*</sup> </label>
                            <input required="" type="number" class="form-control loan_calculation" value="0" min="0" id="loan-amount" name="loan_amount" placeholder="Loan Amount">
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">Loan Installments :&nbsp;<sup
                            style="color:red">*</sup> </label>
                            <input required="" type="number" id="loan-installments" class="form-control loan_calculation" value="0" min="0" name="loan_installments"
                            placeholder="Loan Installments">
                        </div>

                        <div class="form-group col-lg-4">
                            <label class="control-label" style="font-weight:bold;">Per Installment Amount :&nbsp;<sup
                            style="color:red">*</sup> </label>
                            <input required="" type="number" id="per-installmet-amount" class="form-control loan_calculation" value="0" min="0" name="per_installment_amount"
                            placeholder="Per Installment Amount">
                        </div>         

                        <div class="form-group col-md-4 align-self-end">
                            <input type="Submit" name="Submit" id="Submit" class="btn btn-primary"
                            value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('js')
<script>


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img-src')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function readidcard_URL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#id-card-img')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function readGranter(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img-granter')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function readgrantercard_URL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#granter-card-img')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function read2Granter(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img2-granter')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function readBackImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img-src-back')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
} 


    $(document).ready(function() {
        $('#district').change(function() {
            let did = $(this).val();
            //   alert(did);
            $.ajax({
                url: '<?php echo url('/getUpazila'); ?>',
                type: 'post',
                data: 'did=' + did + '&_token={{ csrf_token() }}',
                success: function(result) {
                    $('#upazila_id').html(result);
                }
            });
        });
        $('#upazila_id').change(function() {
            let uid = $(this).val();
            //alert(uid);
            $.ajax({
                url: '<?php echo url('/getUnions'); ?>',
                type: 'post',
                data: 'uid=' + uid + '&_token={{ csrf_token() }}',
                success: function(result) {
                    $('#union_id').html(result);
                }
            });
        });



    $('#granterdistrict').change(function() {
        let did = $(this).val();
        //   alert(did);
        $.ajax({
            url: '<?php echo url('/getgranterUpazila'); ?>',
            type: 'post',
            data: 'did=' + did + '&_token={{ csrf_token() }}',
            success: function(result) {
                $('#granterupazila_id').html(result);
            }
        });
    });
    $('#granterupazila_id').change(function() {
        let uid = $(this).val();
        //alert(uid);
        $.ajax({
            url: '<?php echo url('/getgranterUnions'); ?>',
            type: 'post',
            data: 'uid=' + uid + '&_token={{ csrf_token() }}',
            success: function(result) {
                $('#granterunion_id').html(result);
            }
        });
    });
    /*---------------------Granter 2-------------------------------*/
    $('#granter_2_district').change(function() {
        let did = $(this).val();
        //   alert(did);
        $.ajax({
            url: '<?php echo url('/getgranterTwoUpazila'); ?>',
            type: 'post',
            data: 'did=' + did + '&_token={{ csrf_token() }}',
            success: function(result) {
                $('#granterupazila_two_id').html(result);
            }
        });
    });
    $('#granterupazila_two_id').change(function() {
        let uid = $(this).val();
        //alert(uid);
        $.ajax({
            url: '<?php echo url('/getgranterTwoUnions '); ?>',
            type: 'post',
            data: 'uid=' + uid + '&_token={{ csrf_token() }}',
            success: function(result) {
                $('#granterunion_two_id').html(result);
            }
        });
    });


$("#loan-amount").on('change', function() {
    var amount=$("#loan-amount").val();
    var installments=$("#loan-installments").val();
    var cal_per_install=parseInt(amount)/parseInt(installments);

    $("#per-installmet-amount").val(parseFloat(cal_per_install).toFixed(2));


});

$("#loan-installments").on('change', function() {
    var amount=$("#loan-amount").val();
    var installments=$("#loan-installments").val();
    var per_installment=$("#per-installmet-amount").val();

    var cal_per_install=parseInt(amount)/parseInt(installments);

    $("#per-installmet-amount").val(parseFloat(cal_per_install).toFixed(2));

});

$("#per-installmet-amount").on('change', function() {
    var amount=$("#loan-amount").val();
    var installments=$("#loan-installments").val();
    var per_installment=$("#per-installmet-amount").val();

    var install=parseInt(amount)/parseInt(per_installment);

    $("#loan-installments").val(parseFloat(install).toFixed(2));

});

});
</script>
@endsection