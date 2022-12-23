<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="license" href="https://www.opensource.org/licenses/mit-license/">
    <script src="script.js"></script>
    <style>
        /* reset */

        * {
            border: 0;
            box-sizing: content-box;
            color: inherit;
            font-family: inherit;
            font-size: inherit;
            font-style: inherit;
            font-weight: inherit;
            line-height: inherit;
            list-style: none;
            margin: 0;
            padding: 0;
            text-decoration: none;
            vertical-align: top;
        }

        /* content editable */

        *[contenteditable] {
            border-radius: 0.25em;
            min-width: 1em;
            outline: 0;
        }

        *[contenteditable] {
            cursor: pointer;
        }

        *[contenteditable]:hover,
        *[contenteditable]:focus,
        td:hover *[contenteditable],
        td:focus *[contenteditable],
        img.hover {
            background: #DEF;
            box-shadow: 0 0 1em 0.5em #DEF;
        }

        span[contenteditable] {
            display: inline-block;
        }

        /* heading */

        h1 {
            font: bold 100% sans-serif;
            letter-spacing: 0.5em;
            text-align: center;
            text-transform: uppercase;
        }

        /* table */

        table {
            font-size: 75%;
            table-layout: fixed;
            width: 100%;
        }

        table {
            border-collapse: separate;
            border-spacing: 2px;
        }

        th,
        td {
            border-width: 1px;
            padding: 0.5em;
            position: relative;
            text-align: left;
        }

        th,
        td {
            border-radius: 0.25em;
            border-style: solid;
        }

        th {
            background: #EEE;
            border-color: #BBB;
        }

        td {
            border-color: #DDD;
        }

        /* page */

        html {
            font: 16px/1 'Open Sans', sans-serif;
            overflow: auto;
            padding: 0.5in;
        }

        html {
            background: #999;
            cursor: default;
        }

        body {
            box-sizing: border-box;
            height: 11in;
            margin: 0 auto;
            overflow: hidden;
            padding: 0.5in;
            width: 8.5in;
        }

        body {
            background: #FFF;
            border-radius: 1px;
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        }

        /* header */

        header {
            margin: 0 0 3em;
        }

        header:after {
            clear: both;
            content: "";
            display: table;
        }

        header h1 {
            background: #000;
            border-radius: 0.25em;
            color: #FFF;
            margin: 0 0 1em;
            padding: 0.5em 0;
        }

        header address {
            float: left;
            font-size: 75%;
            font-style: normal;
            line-height: 1.25;
            margin: 0 1em 1em 0;
        }

        header address p {
            margin: 0 0 0.25em;
        }

        header span,
        header img {
            display: block;
            float: right;
        }

        header span {
            margin: 0 0 1em 1em;
            max-height: 25%;
            max-width: 60%;
            position: relative;
        }

        header img {
            max-height: 100%;
            max-width: 100%;
        }

        header input {
            cursor: pointer;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            height: 100%;
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        /* article */

        article,
        article address,
        table.meta,
        table.inventory {
            margin: 0 0 3em;
        }

        article:after {
            clear: both;
            content: "";
            display: table;
        }

        article h1 {
            clip: rect(0 0 0 0);
            position: absolute;
        }

        article address {
            float: left;
            font-size: 125%;
            font-weight: bold;
        }

        /* table meta & balance */

        table.meta,
        table.balance {
            float: right;
            width: 36%;
        }

        table.meta:after,
        table.balance:after {
            clear: both;
            content: "";
            display: table;
        }

        /* table meta */

        table.meta th {
            width: 40%;
        }

        table.meta td {
            width: 60%;
        }

        /* table items */

        table.inventory {
            clear: both;
            width: 100%;
        }

        table.inventory th {
            font-weight: bold;
            text-align: center;
        }

        table.inventory td:nth-child(1) {
            width: 26%;
        }

        table.inventory td:nth-child(2) {
            width: 38%;
        }

        table.inventory td:nth-child(3) {
            text-align: right;
            width: 12%;
        }

        table.inventory td:nth-child(4) {
            text-align: right;
            width: 12%;
        }

        table.inventory td:nth-child(5) {
            text-align: right;
            width: 12%;
        }

        /* table balance */

        table.balance th,
        table.balance td {
            width: 50%;
        }

        table.balance td {
            text-align: right;
        }

        /* aside */

        aside h1 {
            border: none;
            border-width: 0 0 1px;
            margin: 0 0 1em;
        }

        aside h1 {
            border-color: #999;
            border-bottom-style: solid;
        }

        /* javascript */

        .add,
        .cut {
            border-width: 1px;
            display: block;
            font-size: .8rem;
            padding: 0.25em 0.5em;
            float: left;
            text-align: center;
            width: 0.6em;
        }

        .add,
        .cut {
            background: #9AF;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
            background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
            border-radius: 0.5em;
            border-color: #0076A3;
            color: #FFF;
            cursor: pointer;
            font-weight: bold;
            text-shadow: 0 -1px 2px rgba(0, 0, 0, 0.333);
        }

        .add {
            margin: -2.5em 0 0;
        }

        .add:hover {
            background: #00ADEE;
        }

        .cut {
            opacity: 0;
            position: absolute;
            top: 0;
            left: -1.5em;
        }

        .cut {
            -webkit-transition: opacity 100ms ease-in;
        }

        tr:hover .cut {
            opacity: 1;
        }

        @media print {
            * {
                -webkit-print-color-adjust: exact;
            }

            html {
                background: none;
                padding: 0;
            }

            body {
                box-shadow: none;
                margin: 0;
            }

            span:empty {
                display: none;
            }

            .add,
            .cut {
                display: none;
            }
        }

        @page {
            margin: 0;
        }
    </style>
</head>

<body>
    <div id="menu">
        <button id="print" class="btn btn-primary">Print</button>
        <button onclick="CreatePDFfromHTML()" class="btn btn-danger">Download PDF</button>
    </div>
    <br>
    <div class="html-content" style="background:#fff;">
        <header>
            <h1>Statement</h1>

            <address>
                <p>{{ settings()->map }}</p>
                <p>{{ settings()->office_address }}</p>
                <p>{{ settings()->mobile_no }}</p>
            </address>
            <img style="float: right;width:15%" src="{{ asset('uploads/logo') }}/{{ settings()->site_logo }}"
                alt="">
        </header>
        <article>
            <h3>Recipient:</h3>
            <br>
            <address>
                <p style="font-size: 13px;line-height: 20px;">
                    Name:
                    <span>
                        {{ $data->name }}
                    </span>
                </p>
                <p style="font-size: 13px;line-height: 20px;">
                    Mobile:
                    <span>{{ $data->mobile }}</span>
                </p>

                <p style="font-size: 13px;line-height: 20px;">
                    Address:
                    <span>
                        @php
                            $loan_owner_zila = explode(':', $data->loan_owner_zila);
                            $zila = end($loan_owner_zila);

                            $loan_owner_upazila = explode(':', $data->loan_owner_upazila);
                            $upazila = end($loan_owner_upazila);

                            $loan_owner_union = explode(':', $data->loan_owner_union);
                            $union = end($loan_owner_union);
                        @endphp


                        {{ $union }},{{ $upazila }},{{ $zila }}
                    </span>
                </p>
            </address>

            <table class="meta">
                <?php

                $rand = rand(000000, 999999);
                $date = date('d/m/y');

                ?>
                <tr>
                    <th><span>Statement #</span></th>
                    <td><span><?php echo $rand; ?></span></td>
                </tr>
                <tr>
                    <th><span>Date</span></th>
                    <td><span><?php echo $date; ?></span></td>
                </tr>

            </table>



            <table class="inventory">
                <thead>
                    <tr>
                        <th><span>Sl.No</span></th>
                        <th><span>ID No</span></th>
                        <th><span>Loan Created</span></th>
                        <th><span>Loan Amount</span></th>
                        <th><span>Loan Entry</span></th>
                        <th><span>Due Amount</span></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($recived_history as $single)
                        <tr>
                            <td>
                                <a class="cut">-</a>
                                <span>01</span>
                            </td>
                            <td>
                                <span>{{ LoanInfoById($single->loan_id)->form_id }}</span>
                            </td>
                            <td>
                                <span data-prefix></span>
                                <span>{{ \Carbon\Carbon::parse($single->created_at)->format('d/m/Y') }}</span>
                            </td>
                            <td>
                                <span>৳&nbsp;{{ $data->loan_amount }}</span>
                            </td>
                            <td>
                                <span>৳&nbsp;{{ $single->recived_amount }}</span>
                            </td>
                            <td>
                                <span data-prefix>৳&nbsp;</span>
                                <span>{{ $single->due_amount }}</span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <table class="balance">
                <tr>
                    <th><span>Total</span></th>
                    <td><span data-prefix>৳&nbsp;</span><span>{{ $data->loan_amount }}</span></td>
                </tr>
                <tr>
                    <th><span>Amount Paid</span></th>
                    <td><span data-prefix>৳&nbsp;</span><span>{{ $data->loan_entry }}</span></td>
                </tr>
                <tr>
                    <th><span>Balance Due</span></th>
                    <td><span data-prefix>৳&nbsp;</span><span>{{ $data->loan_amount - $data->loan_entry }}</span></td>
                </tr>
            </table>


        </article>
        <aside>
            <h1 style="float:right;margin-top: 180px;"><span>Authorized Signature</span></h1>
            <div>

            </div>

        </aside>
        <div id="editor"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script>
        $("body").on("click", "#pdf_make", function() {
            html2canvas($('#print_area')[0], {
                onrendered: function(canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("International Travel House Ltd.pdf");
                }
            });
        });

        $("#print").click(function() {
            //alert("jj");
            $("#menu").css("display", "none");
            //Hide all other elements other than printarea.
            $("#print_area").show();
            window.print();

            //alert("hello");
        });

        var doc = new jsPDF();
        var specialElementHandlers = {
            '#editor': function(element, renderer) {
                return true;
            }
        };

        function CreatePDFfromHTML() {
            var HTML_Width = $(".html-content").width();
            var HTML_Height = $(".html-content").height();
            var top_left_margin = 15;
            var PDF_Width = HTML_Width + (top_left_margin * 2);
            var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
            var canvas_image_width = HTML_Width;
            var canvas_image_height = HTML_Height;

            var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

            html2canvas($(".html-content")[0]).then(function(canvas) {
                var imgData = canvas.toDataURL("image/jpeg", 1.0);
                var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width,
                    canvas_image_height);
                for (var i = 1; i <= totalPDFPages; i++) {
                    pdf.addPage(PDF_Width, PDF_Height);
                    pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4),
                        canvas_image_width, canvas_image_height);
                }
                pdf.save("single_Vistor.pdf");
                //$(".html-content").hide();

            });


        }
    </script>
</body>

</html>
