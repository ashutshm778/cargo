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
                    <div class="row">
                        <div class="col-4 m-auto mb-3">
                                <div class="invoice">
                                    <main>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" style="text-align: center">
                                                        <img src="{{asset('frontend/assets/img/barcode.png')}}" alt="" style="width:150px">
                                                        <p>246862761</p>
                                                    </td>
                                                    <td><p>LIBERTY SHOES</p>
                                                        <p>100492 B2B</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>1234567890</td>
                                                    <td></td>
                                                    <td>1/1</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Panipat_Risalu_P (Haryana)</td>
                                                    <td>
                                                        <p>MAWB:</p>
                                                        <p>15150510385932</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <p>Liberty Shoes Limited, CENTRAL WAREHOUSE, PANIPAT, PANIPAT, City: Panipat, State: Haryana, PIN: 132103. PD: 01 Apr</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" style="text-align: center">
                                                        <img src="{{asset('frontend/assets/img/barcode.png')}}" alt="" style="width:150px">
                                                        <p>246862761</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </main>
                                </div>
                        </div>
                    </div>
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
