@extends('admin.layout.master')
@section('title', 'Notice')
@section('content')
    <style>
        @media only screen and (max-width: 600px) {
            .tile {
                overflow-x: scroll;
            }
        }
    </style>

    <main class="app-content">
        <h3>Notice</h3>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="tile" style="    border-top: 3px solid #009688;
    border-radius: 13px 13px 0px 0px;">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Title </th>
                                    <th>Publish Date</th>
                                    <th>Download</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $pdf = DB::table('notice_tbls')->get();
                                    $i = 1;
                                @endphp

                                @foreach ($pdf as $pdf)
                                    @if ($pdf->notice_type == 'pdf')
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td width="50%">
                                                {{ $pdf->notice }}
                                                &nbsp;&nbsp;
                                                <span>
                                                    <img src="{{ asset('new.gif') }}" alt="">
                                                </span>
                                            </td>
                                            <td>{{ $pdf->created_at }}</td>
                                            <td>
                                                <a download=""
                                                    href="{{ asset('uploads/pdf/') . '/' . $pdf->notice_pdf }}">Download</a>
                                            </td>
                                        </tr>
                                    @endif
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
