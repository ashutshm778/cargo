<div>
    <style>
        .invoice table td,
            .invoice table th {
                padding: 6px 6px !important;
                border-bottom: 1px solid #eee;
                font-size: 9px;
            }
             p{
                margin-bottom: 0;
                font-size: 9px;
                font-weight: bold
            }
        @media print {

            .table td,
            .table th {
                border-top: 0;
            }
            .invoice table td,
            .invoice table th {
                padding: 6px 6px !important;
                border-bottom: 1px solid #eee;
                font-size: 9px;
            }

            .table-bordered td,
            .table-bordered th {
                border: 1px solid #eee;
            }

            .table-bordereds td,
            .table-bordereds th {
                border: 0;
            }

            body {
                background: #fff;
            }
        }
    </style>

<div class="page-wrapper">
    <div class="page-content" id='printableArea'>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                @foreach($booking_product_barcode as $key=>$b_p_barcode)
                <div class="row">
                    <div class="col-4 m-auto mb-3">
                            <div class="invoice">
                                <main>
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="text-align: center;margin:0 auto;">
                                                 <span style="justify-content: center;display: flex;">{!!$barcode!!}</span>
                                                    <p>{{$booking->bill_no}}</p>
                                                </td>
                                                <td><p>{{$booking_product->product}}</p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>

                                                <td>1/{{$key+1}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <p>Consignee:</p>
                                                    <p>{{$booking->consignee}}</p>
                                                </td>

                                                <td>
                                                    <p>Consignor:</p>
                                                    <p>{{$booking->consignor}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">

                                                    <p>From : {{$booking->branch_from->name}}</p>
                                                    <p>To : {{$booking->branch_to->name}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: center">
                                                    @php
                                                    $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
                                                    $barcode = $generator->getBarcode($b_p_barcode->barcode, $generator::TYPE_CODE_128);
                                                @endphp
                                               <span style="justify-content: center;display: flex;"> {!!$barcode!!}</span>
                                               <span style="justify-content: center;display: flex;">{{$b_p_barcode->barcode}}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </main>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
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
