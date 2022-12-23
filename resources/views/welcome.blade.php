@extends('user.layouts.master')
@foreach ($data as $data)
@endforeach
@section('title', 'Home')
@section('content')

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

            #our-fb {
                margin-top: 9px;
            }

            #page-scroll {
                width: 100% !important;
            }

            #big-logo {
                height: 66px !important;
            }
        }
    </style>
    <!-- Page top Section -->
    <section class=" ">
        <img id="big-logo" src="{{ asset('bttdc-banar.png') }}"
            style="    margin-top: 0px;
    height: 200px;
    width: 100%;">
    </section>

    <!----------------------navbar------------------------->
    @include('user.layouts.nav-bar')


    <marquee behavior="scroll"
        style="background: linear-gradient(#02AABD , #00CDAC);;
    color: #fff;
    padding: 7px;
    font-size: 22px;border-top: 2px solid #5b24ff;"
        direction="left" onmouseover="this.stop();" onmouseout="this.start();">
        @foreach ($notice as $notice)
            <a href="#" class="" style="color: #fff;text-decoration: none;margin:10px;"><i
                    class="fa-solid fa-circle" style="font-size: 18px;"></i>&nbsp;{{ $notice->notice }}<span>
                    @if ($notice->notice_type == '0')
                        <img src="{{ asset('new.gif') }}">
                    @else
                    @endif
                </span></a>
        @endforeach

    </marquee>
    <style type="text/css">
        #notice-box {
            width: 100%;
            height: 390px;
            background: #fff;
        }

        #tab-head {
            background-color: #f6f84f;
            padding: 10px;
            text-align: center;
            border-radius: 6px 6px 0 0;
            color: red;
            font-weight: bold;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-7" style="">
                <div id="tab-head">-:Notice Board:-</div>
                <div id="notice-box" style="height: 414px;border: 2px solid green;">
                    <table width="100%" style="height: 360px;">
                        <tbody>
                            @php
                                $pdf = DB::table('notice_tbl')
                                    ->latest()
                                    ->limit(9)
                                    ->get();
                            @endphp
                            @foreach ($pdf as $pdf)
                                @if ($pdf->notice_type == 'pdf')
                                    <tr>
                                        <td style="padding: 8px;">
                                            <span style="color:#ff0000"><i class="fa fa-hand-o-right"></i></span>
                                            <a href="{{ asset('uploads/pdf/') . '/' . $pdf->notice_pdf }}"
                                                style="color:#106a0a;padding: 14px;">
                                                <strong>{{ $pdf->notice }}</strong>
                                            </a>
                                        </td>
                                        <td style="padding: 0px;">

                                        </td>
                                        <td></td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                    <div class="" style="padding: 5px !important;
    margin-left: 29px !important;
">
                        <a href="{{ url('all_notice') }}" class="btn btn-primary link">সকল নোটিশ</a>
                    </div>
                </div>

            </div>
            <style type="text/css">
                ._2p3a {
                    width: 500px !important;
                }

                #page-scroll {
                    width: 92%;
                    height: 34px;
                    background-color: #f6f84f;
                    margin-bottom: 4px;
                    padding: 3px;
                }
            </style>
            <div class="col-lg-4" id="our-fb">
                <div id="page-scroll">
                    <marquee scrolldelay="200" direction="left" style="color: #ff0505;
    font-size: 18px;">Our Official
                        Facebook Page</marquee>
                </div>
                <div id="page">
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fprofile.php%3Fviewas%3D100000686899395%26id%3D100063657826795&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                        width="100%" style="border:none;overflow:hidden;height: 418px !important;" scrolling="no"
                        frameborder="0" allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
        </div>
    </div>
    <br>





    <div class="back-to-top" style="bottom: 30px !important;"><img src="{{ asset('user/img/icons/up-arrow.png') }}"
            alt=""></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        //   $(function(){
        //   var tickerLength = $('.container ul li').length;
        //   var tickerHeight = $('.container ul li').outerHeight();
        //   $('.container ul li:last-child').prependTo('.container ul');
        //   $('.container ul').css('marginTop',-tickerHeight);
        //   function moveTop(){
        //     $('.container ul').animate({
        //       top : -tickerHeight
        //     },600, function(){
        //      $('.container ul li:first-child').appendTo('.container ul');
        //       $('.container ul').css('top','');
        //     });
        //   }
        //   setInterval( function(){
        //     moveTop();
        //   }, 3000);
        //   });
    </script>

@endsection
