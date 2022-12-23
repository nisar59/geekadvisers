@extends('user.layouts.master')
@section('title', 'Disclaimer')
@section('content')


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">




    <style type="text/css">
        #logo-sec {
            position: relative;
            padding-top: 105px;
            text-align: center;
            height: 1;
        }

        #scrolling-text {
            height: 1px;
            padding-top: 51px;
            /* text-align: center; */
            background: #1cadac;
            border-top: 2px solid #fff;
        }

        /*Marquee stile*/
        .marquee {

            position: relative;
            width: 100%;
            height: 48px;
            overflow: hidden;
            padding: 0;
            border-top: 2px solid #fff;
        }

        .marquee .scroll {
            width: 100%;
            display: flex;
        }

        .marquee .scroll div {
            color: #fff;
            font-size: 35px;
            background: #1779cb;
            white-space: nowrap;
            font-weight: 500;
            animation: animate-marquee 80s linear infinite;
            animation-delay: -40s;
        }

        .marquee .scroll div:nth-child(2) {
            animation: animate-marquee-2 80s linear infinite;
            animation-delay: -80s;
        }

        .marquee .scroll div .category {
            padding: 10px 30px;
        }

        .category {
            color: #fff;
            font-size: 23px;
            font-weight: 600 !important;
            clear: both;
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            line-height: 20px;
            font-family: sans-serif;
        }

        .category a {
            color: #FFF;
            text-decoration: none;
        }

        /*Responsive marquee*/
        @media (max-width:767px) {
            .category {
                font-size: 25px;
            }

            .marquee .scroll div {
                font-size: 25px;
            }
        }

        @keyframes animate-marquee {
            0% {
                -moz-transform: translateX(100%);
                -webkit-transform: translateX(100%);
                transform: translateX(100%);
            }

            100% {
                -moz-transform: translateX(-100%);
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%);
            }
        }

        @keyframes animate-marquee-2 {
            0% {
                -moz-transform: translateX(0%);
                -webkit-transform: translateX(0%);
                transform: translateX(0%);
            }

            100% {
                -moz-transform: translateX(-200%);
                -webkit-transform: translateX(-200%);
                transform: translateX(-200%);
            }
        }

        .blink {
            animation: blink-animation 1s steps(5, start) infinite;
            -webkit-animation: blink-animation 1s steps(5, start) infinite;
        }

        @keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }

        @-webkit-keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }

        /*  ul{
      list-style:none;
      position:relative;
    }
    li{

      background: #00000061;
       text-align:center;
      border-bottom:1px solid #fff;
    }*/
        h2 {
            color: #fff;
            padding-top: 10px;
        }

        p {
            text-align: left;
            padding: 10px;
            color: #fff;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 20px;
        }

        @media only screen and (max-width: 600px) {
            #notice-board {
                margin-left: 14px !important;
                background: white;
                width: 300px !important;
                text-align: center;
                padding: 1px;
                border-top: 2px solid;
                /* border-radius: 6px; */
                border-radius: 5px 5px 0px 0px;
            }

            #fb_img {
                margin-top: 10px !important;
            }
        }

        @media only screen and (max-width: 600px) {
            .navbar-brand {
                display: block;
            }

            #myTable_wrapper {
                overflow-y: scroll;
            }
        }
    </style>
    <!-- Page top Section -->
    <section class=" ">
        <img src="{{ asset('bttdc-banar.png') }}" style="    margin-top: 0px;
    height: 148px;
    width: 100%;">
    </section>

    <!----------------------navbar------------------------->
    @include('user.layouts.nav-bar')



    <style type="text/css">
        #notice-box {
            width: 100%;
            height: 390px;
            background: #fff;
        }

        #tab-content {
            max-height: 400px;
            overflow: scroll;
        }

        #tab1 {}
    </style>


    <div class="container" style="margin-top: 24px;">

        <div class="row">
            <div class="col-lg-12">
                <div
                    style="background-color: #f6f84f;padding: 1px;text-align: center;border-radius: 6px 6px 0 0;color: red;font-weight: bold;">
                    <p style="font-size: 1.5em;color: #c60c1a;text-align: center;">Disclaimer</p>
                </div>
                {{-- @php
                    $data = DB::table('disclaimer_content_tbl')->get();
                @endphp
                @foreach ($data as $data)
                @endforeach --}}
                <div style="max-height: 400px;overflow: scroll;background: #fff;border:2px solid green;">
                    <h6 style="font-size: 1.1987em;text-align: justify;line-height: 2.12em;padding: 10px;">
                        {{-- {{ $data->content }} --}}
                    </h6>
                </div>
            </div>
        </div>



    </div>
    <br>





    <div class="back-to-top" style="bottom: 30px !important;"><img src="{{ asset('user/img/icons/up-arrow.png') }}"
            alt=""></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.noConflict();
            $('#myTable').DataTable();
        });
    </script>




@endsection
