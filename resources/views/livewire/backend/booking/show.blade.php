<div>
    <div class="page-wrapper">
        <div class="page-content" id='printableArea'>
            <!--end breadcrumb-->
            <div class="table table-bordered" style="border: 1px solid #ddd; background: #fff;">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h4 class="fw-bold mb-1">PRASHANT CARGO & LOGISTICS</h4>
                            <h6 class="fw-bold mb-0" style="white-space: nowrap;">S-21/123-1, SUBHASH NAGAR MALDAHIYA CANTT,
                                VARANASI-221005</h6>
                            <b class="mb-0">Phone :8887790443</b>

                        </div>
                    </div>
                </div>
                <main>
                    <table class="table table-sm table-bordered mt-1 mb-0">
                        <tbody>
                            <tr>
                                <td style="vertical-align: middle;">AWB No. <b>{{ $booking->bill_no }}</b></td>
                                <td style="vertical-align: middle;">Date- <b> {{ date('d-m-Y', strtotime($booking->date)) }}</b></td>
                                <td style="vertical-align: middle;">Destination- <b>{{ $booking->branch_to->name }}</b></td>
                                <td class="abs text-center"><p class="float-end mb-0"> {!! $barcode !!}
                                    <p class="mb-0">{{ $booking->bill_no }}</p>
                                    </p></td>
                            </tr>
                            <tr>
                                <td colspan="3">From- <b>{{ $booking->branch_from->name }}</b></td>
                                <td>To- <b>{{ $booking->branch_to->name }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <table class="mb-0" style="border:0;width:100%;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%; border:0;">
                                                    Consignor <b style="text-align:end;">: {{ $booking->consignor }}</b>
                                                </td>
                                                <td style="width: 50%; border:0;">
                                                    Consignee <b>:{{ $booking->consignee }}</b></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50%; border:0;">
                                                    GSTIN <b style="text-align:end;">:
                                                        {{ $booking->consignor_gstin }}</b>
                                                </td>
                                                <td style="width: 50%; border:0;">
                                                    GSTIN<b>: {{ $booking->consignee_gstin }}</b></td>
                                            </tr>

                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border:0;">Bill
                                    No. <b style="text-align:end;">:{{ $booking->booking_no }}</b></td>
                                <td style="width: 50%; border:0;">
                                    Value <b>: {{ $booking->value }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. of Packages</th>
                                <th>Nature of Goods Said to contain</th>
                                <th>Unit</th>
                                <th>Qty</th>
                                <th>Weight</th>

                                <th>Particulars</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($booking->booking_product as $key => $booking_product)
                                <tr>
                                    <td><a href="{{ route('booking.barcode', $booking_product->id) }}" class="no-print"
                                            wire:navigate>Download Barcode</a></td>
                                    <td>{{ $booking_product->no_of_pack }}</td>
                                    <td>{{ $booking_product->product }}</td>
                                    <td>{{ $booking_product->unitData->name }}</td>
                                    <td>{{ $booking_product->qty }}</td>
                                    <td>{{ $booking_product->weight }}</td>

                                    <td>Freight Charges</td>
                                    <td>{{ $booking_product->freight_charges }}</td>
                                </tr>
                            @endforeach
                            <tr class="ftsz">
                                <td rowspan="6" colspan="6"><p>Seal /Received above mentioned production in good
                                    condition and correct measure.<br>
                                    I/We declare that GST shall be payable by consignor/consignee</p>
                                   <p> I/We have not to claim or avail examption for value
                                    of goods & material.</p>
                                </td>
                                <td colspan="1">Insurance</td>
                                <td>{{ $booking->insurance }}</td>
                            </tr>
                            <tr>
                                <td colspan="1">B. Charges</td>
                                <td>{{ $booking->b_charges }}</td>
                            </tr>
                            <tr>
                                <td colspan="1">Other Charges</td>
                                <td>{{ $booking->other_charges }}</td>
                            </tr>
                            <tr>
                                <td colspan="1">G.S.T</td>
                                <td colspan="1">{{ $booking->tax }}</td>
                            </tr>
                            <tr>
                                <td colspan="1">Total</td>
                                <td>{{ $booking->total }}</td>
                            </tr>
                            <tr>
                                <td colspan="1">Status</td>
                                <td>
                                    @if ($booking->payment_status == 'paid')
                                        {{ $booking->payment_status }}
                                    @endif
                                    @if ($booking->payment_status == 'unpaid')
                                        {{ 'To Pay' }}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" style="margin-bottom:0;width: 100%;">
                        <tbody>
                            <tr>
                                <td style="">Consignee's Signature with Ruber Stamp</td>
                                <td style="text-align: right;"><b style="text-align:left;">PRINCE</b> <br> For Prashant
                                    Cargo &
                                    Logistics</td>
                            </tr>
                        </tbody>
                    </table>
                </main>
            </div>
            <div class="toolbar no-print mb-3">
                <div class="text-end">
                    <button type="button" id="print_button" class="btn btn-dark"
                        onClick="printDiv('printableArea');"><i class="fa fa-print"></i>
                        Print</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;
        }

        $(document).ready(function() {
            $("#print_button").trigger("click");
        });
    </script>
</div>
