<div>
    <style>
        hr {
            opacity: 1;
            margin-top: 0;
        }
            .invoice table tfoot td {
                border-bottom: 1px solid #000;
            }
            .table-bordered {
             border: 1px solid #000;
            }
            .table td,
            .table th {
                border-top: 0;
            }
            .invoice table th {
            font-weight: 600;
            font-size: 15px !important;
}
            .invoice table td,
            .invoice table th {
                padding: 5px 10px;
                border-bottom: 1px solid #000 !important;
                font-weight: 600;
                border-left: 0;
                border-right: 0;

            }

            .table-bordered td,
            .table-bordered th {
                border: 1px solid #000;
            }

            .table-bordereds td,
            .table-bordereds th {
                border: 0;
            }

            @media print {
            .invoice table td,
            .invoice table th {
                padding: 5px 10px !important;
                border-bottom: 1px solid #000 !important;
                font-weight: 600 !important;
                font-size: 25px !important;
            }
            }
        </style>

<div class="page-wrapper">
    <div class="page-content" id='printableArea'>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <div class="table table-bordered">
                        <div class="invoice">
                            <header>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h2 class="fw-bold">PRASHANT CARGO & LOGISTICS</h2>
                                        <h6 class="fw-bold">S-21/123-1, SUBHASH NAGAR MALDAHIYA CANTT,
                                            VARANASI-221005</h6>
                                        <p>Phone :8887790443</p>

                                    </div>
                                    <div class="col-3">
                                        {{-- <p> <b>GST No:</b> 1234567890</p> --}}
                                       </div>
                                       <div class="col-6"></div>
                                       <div class="col-3 text-center">
                                          <p class="float-end "> {!! $barcode !!}
                                           <p >{{$booking->bill_no}}</p>
                                          </p>
                                       </div>
                                    </div>
                                    <table>
                                        <hr>
                                    </table>
                            </header>
                            <main>
                                <table class="table table-sm table-bordereds">
                                    <tbody>
                                        <tr>
<<<<<<< HEAD
                                            <td style="font-size:20px;color:#000;">AWB No / Tracking No- <b>{{$booking->bill_no}}</b></td>
                                            <td style="font-size:20px;color:#000;">Date- <b> {{date('d-m-Y',strtotime($booking->date))}}</b></td>
                                            <td style="font-size:20px;color:#000;">Destination- <b>{{$booking->branch_to->name}}</b></td>
=======
                                            <td>AWB No / Tracking No- <b>{{$booking->bill_no}}</b></td>
                                            <td>Date- <b> {{date('d-m-Y',strtotime($booking->date))}}</b></td>
                                            <td>Destination- <b>{{$booking->delivery_address}}</b></td>
>>>>>>> b6645330fc2dac2c6fae79699120dbfa02ad3071
                                        </tr>
                                        <tr>
                                            <td style="font-size:20px;color:#000;" colspan="2">From- <b>{{$booking->branch_from->name}}</b></td>
                                            <td style="font-size:20px;color:#000;">To- <b>{{$booking->branch_to->name}}</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="padding: 0;">
                                                <table style="border:0;">
                                                    <tbody>
                                                        <tr>
                                                            <td style="font-size:20px;color:#000;width: 50%; border:0;padding: 5px 15px;">
                                                                Consignor <b style="text-align:end;">: {{$booking->consignor}}</b></td>
                                                            <td style="font-size:20px;color:#000;width: 50%; border:0;padding: 5px 15px;">
                                                                Consignee <b>:{{$booking->consignee}}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size:20px;color:#000;width: 50%; border:0;padding: 5px 15px;">
                                                                GSTIN <b style="text-align:end;">:
                                                                    {{$booking->consignor_gstin}}</b>
                                                                </td>
                                                            <td style="font-size:20px;color:#000;width: 50%; border:0;padding: 5px 15px;">
                                                                GSTIN<b>: {{$booking->consignee_gstin}}</b></td>
                                                        </tr>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size:20px;color:#000;width: 50%; border:0;padding: 5px 15px;">Bill
                                                                No. <b style="text-align:end;">:{{$booking->booking_no}}</b></td>
                                                            <td style="font-size:20px;color:#000;width: 50%; border:0;padding: 5px 15px;">
                                                                Value <b>: {{$booking->value}}</b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-borderd">
                                    <thead>
                                        <tr>
                                            <th style="font-size:18px;color:#000;">#</th>
                                            <th style="font-size:18px;color:#000;">No. of Packages</th>
                                            <th style="font-size:18px;color:#000;">Nature of Goods Said to contain</th>
                                            <th style="font-size:18px;color:#000;">Unit</th>
                                            <th style="font-size:18px;color:#000;">Qty</th>
                                            <th style="font-size:18px;color:#000;">Weight</th>
                                            <th style="font-size:18px;color:#000;">Particulars</th>
                                            <th style="font-size:18px;color:#000;">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($booking->booking_product as $key => $booking_product)

                                        <tr>
                                            <td style="font-size:16px;color:#000;"><a href="{{route('booking.barcode',$booking_product->id)}}" class="no-print" wire:navigate >Download Barcode</a></td>
                                            <td style="font-size:16px;color:#000;">{{ $booking_product->no_of_pack }}</td>
                                            <td style="font-size:16px;color:#000;">{{ $booking_product->product }}</td>
                                            <td style="font-size:16px;color:#000;">{{$booking_product->unitData->name}}</td>
                                            <td style="font-size:16px;color:#000;">{{$booking_product->qty}}</td>
                                            <td style="font-size:16px;color:#000;">{{ $booking_product->weight }}</td>

                                            <td style="font-size:16px;color:#000;">Freight Charges</td>
                                            <td style="font-size:16px;color:#000;">{{ $booking_product->freight_charges }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6" style="font-size:16px;color:#000;">Seal /Received above mentioned production in good
                                                condition and correct measure.<br>
                                                I/We declare that GST shall be payable by consignor/consignee</td>
                                            <td colspan="1" style="font-size:16px;color:#000;">Insurance</td>
                                            <td style="font-size:16px;color:#000;">{{$booking->insurance}}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:16px;color:#000;" colspan="6">I/We have not to claim or avail examption for value
                                                of goods & material.</td>
                                            <td style="font-size:16px;color:#000;" colspan="1">B. Charges</td>
                                            <td style="font-size:16px;color:#000;">{{$booking->b_charges}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td  style="font-size:16px;color:#000;"colspan="1">Other Charges</td>
                                            <td style="font-size:16px;color:#000;">{{$booking->other_charges}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td style="font-size:16px;color:#000;"colspan="1">G.S.T</td>
                                            <td style="font-size:16px;color:#000;">{{$booking->tax}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td style="font-size:16px;color:#000;" colspan="1">Total</td>
                                            <td style="font-size:16px;color:#000;">{{$booking->total}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td style="font-size:16px;color:#000;" colspan="1">Status</td>
                                            <td style="font-size:16px;color:#000;">
                                                @if($booking->payment_status=='paid'){{$booking->payment_status}}@endif
                                                @if($booking->payment_status=='unpaid'){{'To Pay'}}@endif
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <table style="border:0; margin-bottom:0;">
                                    <tbody>
                                        <tr>
<<<<<<< HEAD
                                            <td style="border: 0;font-size:16px;color:#000;">Consignee's Signature with Ruber Stamp</td>
                                            <td style="border: 0;text-align: right;font-size:16px;color:#000;"><b
                                                    style="text-align:left;font-size:16px;color:#000;">PRINCE</b> <br> For Prashant Cargo &
=======
                                            <td style="border: 0;">Consignee's Signature with Ruber Stamp</td>
                                            <td style="border: 0;text-align: right;"><b
                                                    style="text-align:left;"></b> <br> For Prashant Cargo &
>>>>>>> b6645330fc2dac2c6fae79699120dbfa02ad3071
                                                Logistics</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </main>
                        </div>
                </div>
            </div>
        </div>
        <div class="toolbar no-print mb-3">
            <div class="text-end">
                <button type="button" id="print_button" class="btn btn-dark" onClick="printDiv('printableArea');"><i class="fa fa-print"></i>
                    Print</button>
            </div>
            <hr />
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

$(document).ready(function(){
  $("#print_button").trigger("click");
});
</script>
</div>
