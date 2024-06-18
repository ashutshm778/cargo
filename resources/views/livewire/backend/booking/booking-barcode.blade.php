<div>
    <div class="page-wrapper">
        <div class="page-content" id='printableArea'>
            @foreach ($booking_product_barcode as $key => $b_p_barcode)
                <main>
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
                                    <p style="margin-bottom: 0;">Weight : {{ $b_p_barcode->weight }} Kg</p>
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
                    <button type="button" class="btn btn-dark" onclick="printDiv('printableArea')"><i
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
                var printContents = document.getElementById(divId).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
        </script>
    @endsection
</div>
