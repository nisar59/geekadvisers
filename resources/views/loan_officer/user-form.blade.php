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
                                <input required="" type="text" class="form-control" onkeydown="return /[a-z]/i.test(event.key)" name="name"
                                    placeholder="Name of loan customer">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="control-label" style="font-weight:bold;"> Phone Number : ( In English
                                    ):&nbsp;<sup style="color:red">*</sup> </label>
                                <input required="" type="number" min="11" max="11" onkeydown="return /[0-9]/i.test(event.key)" class="form-control" name="mobile"
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
                                <input required="" type="text" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" name="fathers_name"
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
                                <input required="" onkeydown="return /[a-z]/i.test(event.key)" type="text" class="form-control" name="mothers_name"
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
                                <input required="" type="number" onkeydown="return /[0-9]/i.test(event.key)" class="form-control" name="loan_owner_card_no"
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
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label" style="font-weight:bold;">Month :&nbsp;
                                    <sup style="color:red">*</sup>
                                </label>
                                <select required="" class="form-control" name="month">
                                    <option value="">--Select Month--</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label" style="font-weight:bold;">Year :&nbsp;
                                    <sup style="color:red">*</sup>
                                </label>
                                <select required="" class="form-control" name="year">
                                    <option value="">--Select Year--</option>
                                    <option value="1924">1924</option>
                                    <option value="1925">1925</option>
                                    <option value="1926">1926</option>
                                    <option value="1927">1927</option>
                                    <option value="1928">1928</option>
                                    <option value="1929">1929</option>
                                    <option value="1930">1930</option>
                                    <option value="1931">1931</option>
                                    <option value="1932">1932</option>
                                    <option value="1933">1933</option>
                                    <option value="1934">1934</option>
                                    <option value="1935">1935</option>
                                    <option value="1936">1936</option>
                                    <option value="1937">1937</option>
                                    <option value="1938">1938</option>
                                    <option value="1939">1939</option>
                                    <option value="1940">1940</option>
                                    <option value="1941">1941</option>
                                    <option value="1942">1942</option>
                                    <option value="1943">1943</option>
                                    <option value="1944">1944</option>
                                    <option value="1945">1945</option>
                                    <option value="1946">1946</option>
                                    <option value="1947">1947</option>
                                    <option value="1948">1948</option>
                                    <option value="1949">1949</option>
                                    <option value="1950">1950</option>
                                    <option value="1951">1951</option>
                                    <option value="1952">1952</option>
                                    <option value="1953">1953</option>
                                    <option value="1954">1954</option>
                                    <option value="1955">1955</option>
                                    <option value="1956">1956</option>
                                    <option value="1957">1957</option>
                                    <option value="1958">1958</option>
                                    <option value="1959">1959</option>
                                    <option value="1960">1960</option>
                                    <option value="1961">1961</option>
                                    <option value="1962">1962</option>
                                    <option value="1963">1963</option>
                                    <option value="1964">1964</option>
                                    <option value="1965">1965</option>
                                    <option value="1966">1966</option>
                                    <option value="1967">1967</option>
                                    <option value="1968">1968</option>
                                    <option value="1969">1969</option>
                                    <option value="1970">1970</option>
                                    <option value="1971">1971</option>
                                    <option value="1972">1972</option>
                                    <option value="1973">1973</option>
                                    <option value="1974">1974</option>
                                    <option value="1975">1975</option>
                                    <option value="1976">1976</option>
                                    <option value="1977">1977</option>
                                    <option value="1978">1978</option>
                                    <option value="1979">1979</option>
                                    <option value="1980">1980</option>
                                    <option value="1981">1981</option>
                                    <option value="1982">1982</option>
                                    <option value="1983">1983</option>
                                    <option value="1984">1984</option>
                                    <option value="1985">1985</option>
                                    <option value="1987">1987</option>
                                    <option value="1988">1988</option>
                                    <option value="1989">1989</option>
                                    <option value="1990">1990</option>
                                    <option value="1991">1991</option>
                                    <option value="1992">1992</option>
                                    <option value="1993">1993</option>
                                    <option value="1994">1994</option>
                                    <option value="1995">1995</option>
                                    <option value="1996">1996</option>
                                    <option value="1997">1997</option>
                                    <option value="1998">1998</option>
                                    <option value="1999">1999</option>
                                    <option value="2000">2000</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                    <option value="2003">2003</option>
                                    <option value="2004">2004</option>
                                    <option value="2005">2005</option>
                                    <option value="2006">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2022">2023</option>
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

                            <div class="form-group col-lg-6">
                                <label class="control-label" style="font-weight:bold;">
                                    Loan Ammount :&nbsp;
                                    <sup style="color:red">*</sup>
                                </label>
                                <input required="" type="number" class="form-control" name="loan_amount"
                                    placeholder="Loan Ammount">
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
                                <input required="" type="text" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" name="granter_name"
                                    placeholder="Granter Name">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="control-label" style="font-weight:bold;">
                                    Granter Phone Number : ( In English ):
                                    &nbsp;<sup style="color:red">*</sup>
                                </label>
                                <input required="" type="number" onkeydown="return /[0-9]/i.test(event.key)" class="form-control" name="granter_mobile"
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
                                <input required="" type="text" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" name="granter_fathers_name"
                                    placeholder="Father's name">
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label" style="font-weight:bold;">
                                    Mother's name ( In English )
                                    :&nbsp;
                                    <sup style="color:red">*</sup>
                                </label>
                                <input required="" type="text" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" name="granter_mothers_name"
                                    placeholder="Mother's name" required="">
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label" style="font-weight:bold;">
                                    Granter ID Card Number :&nbsp;
                                    <sup style="color:red">*</sup>
                                </label>
                                <input required="" type="number" onkeydown="return /[0-9]/i.test(event.key)" class="form-control" name="granter_id_card_no"
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
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label" style="font-weight:bold;">
                                    Month :&nbsp;
                                    <sup style="color:red">*</sup>
                                </label>
                                <select required="" class="form-control" name="granter_month">
                                    <option value="">--Select Month--</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label" style="font-weight:bold;">
                                    Year :&nbsp;
                                    <sup style="color:red">*</sup>
                                </label>
                                <select required="" class="form-control" name="granter_year">
                                    <option value="">--Select Year--</option>
                                    <option value="1924">1924</option>
                                    <option value="1925">1925</option>
                                    <option value="1926">1926</option>
                                    <option value="1927">1927</option>
                                    <option value="1928">1928</option>
                                    <option value="1929">1929</option>
                                    <option value="1930">1930</option>
                                    <option value="1931">1931</option>
                                    <option value="1932">1932</option>
                                    <option value="1933">1933</option>
                                    <option value="1934">1934</option>
                                    <option value="1935">1935</option>
                                    <option value="1936">1936</option>
                                    <option value="1937">1937</option>
                                    <option value="1938">1938</option>
                                    <option value="1939">1939</option>
                                    <option value="1940">1940</option>
                                    <option value="1941">1941</option>
                                    <option value="1942">1942</option>
                                    <option value="1943">1943</option>
                                    <option value="1944">1944</option>
                                    <option value="1945">1945</option>
                                    <option value="1946">1946</option>
                                    <option value="1947">1947</option>
                                    <option value="1948">1948</option>
                                    <option value="1949">1949</option>
                                    <option value="1950">1950</option>
                                    <option value="1951">1951</option>
                                    <option value="1952">1952</option>
                                    <option value="1953">1953</option>
                                    <option value="1954">1954</option>
                                    <option value="1955">1955</option>
                                    <option value="1956">1956</option>
                                    <option value="1957">1957</option>
                                    <option value="1958">1958</option>
                                    <option value="1959">1959</option>
                                    <option value="1960">1960</option>
                                    <option value="1961">1961</option>
                                    <option value="1962">1962</option>
                                    <option value="1963">1963</option>
                                    <option value="1964">1964</option>
                                    <option value="1965">1965</option>
                                    <option value="1966">1966</option>
                                    <option value="1967">1967</option>
                                    <option value="1968">1968</option>
                                    <option value="1969">1969</option>
                                    <option value="1970">1970</option>
                                    <option value="1971">1971</option>
                                    <option value="1972">1972</option>
                                    <option value="1973">1973</option>
                                    <option value="1974">1974</option>
                                    <option value="1975">1975</option>
                                    <option value="1976">1976</option>
                                    <option value="1977">1977</option>
                                    <option value="1978">1978</option>
                                    <option value="1979">1979</option>
                                    <option value="1980">1980</option>
                                    <option value="1981">1981</option>
                                    <option value="1982">1982</option>
                                    <option value="1983">1983</option>
                                    <option value="1984">1984</option>
                                    <option value="1985">1985</option>
                                    <option value="1987">1987</option>
                                    <option value="1988">1988</option>
                                    <option value="1989">1989</option>
                                    <option value="1990">1990</option>
                                    <option value="1991">1991</option>
                                    <option value="1992">1992</option>
                                    <option value="1993">1993</option>
                                    <option value="1994">1994</option>
                                    <option value="1995">1995</option>
                                    <option value="1996">1996</option>
                                    <option value="1997">1997</option>
                                    <option value="1998">1998</option>
                                    <option value="1999">1999</option>
                                    <option value="2000">2000</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                    <option value="2003">2003</option>
                                    <option value="2004">2004</option>
                                    <option value="2005">2005</option>
                                    <option value="2006">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2022">2023</option>
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
                                <input required="" type="text" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" name="granter_2_name"
                                    placeholder="Granter Name">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="control-label" style="font-weight:bold;">
                                    Granter Phone Number : ( In English ):&nbsp;
                                    <sup style="color:red">*</sup>
                                </label>
                                <input required="" type="number" onkeydown="return /[0-9]/i.test(event.key)" class="form-control" name="granter_2_mobile"
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
                                <input required="" type="text" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" name="granter_2_fathers_name"
                                    placeholder="Father's name">
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label" style="font-weight:bold;">
                                    Mother's name ( In English ):&nbsp;
                                    <sup style="color:red">*</sup>
                                </label>
                                <input type="text" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" name="granter_2_mothers_name"
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
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label" style="font-weight:bold;">
                                    Month :&nbsp;
                                    <sup style="color:red">*</sup>
                                </label>
                                <select required="" class="form-control" name="granter_2_month">
                                    <option value="">--Select Month--</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label" style="font-weight:bold;">
                                    Year :&nbsp;
                                    <sup style="color:red">*</sup>
                                </label>
                                <select required="" class="form-control" name="granter_2_year">
                                    <option value="">--Select Year--</option>
                                    <option value="1924">1924</option>
                                    <option value="1925">1925</option>
                                    <option value="1926">1926</option>
                                    <option value="1927">1927</option>
                                    <option value="1928">1928</option>
                                    <option value="1929">1929</option>
                                    <option value="1930">1930</option>
                                    <option value="1931">1931</option>
                                    <option value="1932">1932</option>
                                    <option value="1933">1933</option>
                                    <option value="1934">1934</option>
                                    <option value="1935">1935</option>
                                    <option value="1936">1936</option>
                                    <option value="1937">1937</option>
                                    <option value="1938">1938</option>
                                    <option value="1939">1939</option>
                                    <option value="1940">1940</option>
                                    <option value="1941">1941</option>
                                    <option value="1942">1942</option>
                                    <option value="1943">1943</option>
                                    <option value="1944">1944</option>
                                    <option value="1945">1945</option>
                                    <option value="1946">1946</option>
                                    <option value="1947">1947</option>
                                    <option value="1948">1948</option>
                                    <option value="1949">1949</option>
                                    <option value="1950">1950</option>
                                    <option value="1951">1951</option>
                                    <option value="1952">1952</option>
                                    <option value="1953">1953</option>
                                    <option value="1954">1954</option>
                                    <option value="1955">1955</option>
                                    <option value="1956">1956</option>
                                    <option value="1957">1957</option>
                                    <option value="1958">1958</option>
                                    <option value="1959">1959</option>
                                    <option value="1960">1960</option>
                                    <option value="1961">1961</option>
                                    <option value="1962">1962</option>
                                    <option value="1963">1963</option>
                                    <option value="1964">1964</option>
                                    <option value="1965">1965</option>
                                    <option value="1966">1966</option>
                                    <option value="1967">1967</option>
                                    <option value="1968">1968</option>
                                    <option value="1969">1969</option>
                                    <option value="1970">1970</option>
                                    <option value="1971">1971</option>
                                    <option value="1972">1972</option>
                                    <option value="1973">1973</option>
                                    <option value="1974">1974</option>
                                    <option value="1975">1975</option>
                                    <option value="1976">1976</option>
                                    <option value="1977">1977</option>
                                    <option value="1978">1978</option>
                                    <option value="1979">1979</option>
                                    <option value="1980">1980</option>
                                    <option value="1981">1981</option>
                                    <option value="1982">1982</option>
                                    <option value="1983">1983</option>
                                    <option value="1984">1984</option>
                                    <option value="1985">1985</option>
                                    <option value="1987">1987</option>
                                    <option value="1988">1988</option>
                                    <option value="1989">1989</option>
                                    <option value="1990">1990</option>
                                    <option value="1991">1991</option>
                                    <option value="1992">1992</option>
                                    <option value="1993">1993</option>
                                    <option value="1994">1994</option>
                                    <option value="1995">1995</option>
                                    <option value="1996">1996</option>
                                    <option value="1997">1997</option>
                                    <option value="1998">1998</option>
                                    <option value="1999">1999</option>
                                    <option value="2000">2000</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                    <option value="2003">2003</option>
                                    <option value="2004">2004</option>
                                    <option value="2005">2005</option>
                                    <option value="2006">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2022">2023</option>
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
    </script>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
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
        });



        $(document).ready(function() {
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
                    url: '<?php echo url('/getgranterTwoUnions'); ?>',
                    type: 'post',
                    data: 'uid=' + uid + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        $('#granterunion_two_id').html(result);
                    }

                });
            });
        });


    </script>


@endsection
