@extends('backend.layouts.app')
@section('content')
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

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content" id='printable_div_id'>
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
                                                        @php
                                                             $pincode_data_from=App\Models\Pincode::where('pincode',$booking->from)->first();
                                                             $pincode_data_to=App\Models\Pincode::where('pincode',$booking->to)->first();
                                                        @endphp
                                                        <p>From : {{$pincode_data_from->pincode}},{{$pincode_data_from->city}},{{$pincode_data_from->state}}</p>
                                                        <p>To : {{$pincode_data_to->pincode}},{{$pincode_data_to->city}},{{$pincode_data_to->state}}</p>
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
                    <button type="button" class="btn btn-dark" onClick="printdiv('printable_div_id');"><i
                            class="fa fa-print"></i>
                        Print</button>
                </div>
                <hr />
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection
@section('script')
@endsection
