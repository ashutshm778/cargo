<div>
    <style>
        @media print {
            body, html {
                height: 100%;
                margin: 0;
                padding: 0;
                background: #fff !important;
            }

            .print-container {
               position: fixed;
               background: #fff !important;
               bottom: 3%;
               page-break-after:always;
               width:85% !important;
            }
            .card {
                box-shadow: none;
                background: transparent;
             }
           .page-wrapper {
                margin-left: 0;
            }
            .sidebar-wrapper{
                display: none;
            }
            .topbar{
                display: none !important;
            }
            .barcode {
                width: 100%;
                text-align: center;
            }
            .no-print {
                display: none;
            }
            .printableAreaTable{
                display: none !important;
            }
        }
    </style>
    <div class="page-wrapper">
        <div class="page-content" id='printableArea'>
            @foreach ($booking_product_barcode as $key => $b_p_barcode)
                <main class="print-container">
                    <table class="table table-sm table-bordered">
                        <tbody>
                            <tr>
                                <td colspan="2" style="text-align: center;margin:0 auto;">
                                    <span style="justify-content: center;display: flex;">{!! $barcode !!}</span>
                                    <p style="margin-bottom: 0;">{{ $booking->bill_no }}</p>
                                </td>
                                <td>
                                    <p style="margin-bottom: 0;">{{ $booking_product->product }}</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>

                                <td>{{ $key + 1 }}/{{ count($booking_product_barcode) }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p style="margin-bottom: 0;">Consignee:</p>
                                    <p style="margin-bottom: 0;">{{ $booking->consignee }}</p>
                                </td>

                                <td>
                                    <p style="margin-bottom: 0;">Consignor:</p>
                                    <p style="margin-bottom: 0;">{{ $booking->consignor }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">

                                    <p style="margin-bottom: 0;">From : {{ $booking->branch_from->name }}</p>
                                    <p style="margin-bottom: 0;">To : {{ $booking->branch_to->name }}</p>
                                    <p>Weight : {{ $b_p_barcode->weight }} Kg</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center">
                                    @php
                                        $generators = new \Picqer\Barcode\BarcodeGeneratorHTML();
                                        $barcodes = $generators->getBarcode(
                                            $b_p_barcode->barcode,
                                            $generators::TYPE_CODE_128,
                                        );
                                    @endphp
                                    <span style="justify-content: center;display: flex;"> {!! $barcodes !!}</span>
                                    <span
                                        style="justify-content: center;display: flex;">{{ $b_p_barcode->barcode }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </main>
            @endforeach
            <div class="toolbar no-print mb-3">
                <div class="text-end">
                    <button type="button" class="btn btn-dark"  onclick="window.print()"><i
                            class="fa fa-print"></i>
                        Print</button>
                </div>
                <hr />
            </div>
        </div>
    </div>
    @section('script')
        <script>

            function printDiv(divId) {
            // Get the content of the specified div
            var divContents = document.getElementById(divId).innerHTML;

            // Open a new window
            var printWindow = window.open('', '', 'height=600,width=800');

            // Write the content to the new window
            printWindow.document.write('<html><head><title>Print DIV Content</title>');
            // Add any additional CSS if needed
            printWindow.document.write('<style>@media print { body {background-color:black;} }</style>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');

            // Close the document to finish writing
            printWindow.document.close();

            // Wait for the new window content to load and then print
            printWindow.onload = function() {
                printWindow.print();
                printWindow.close();
            };
        }
        </script>
    @endsection
</div>
