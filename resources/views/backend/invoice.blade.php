@extends('backend.layouts.app')
@section('content')
    <style>
    @media print
    {
    .table td,
    .table th {
    border-top: 0;
    }

    .invoice table td,
    .invoice table th {
    padding: 10px 15px;
    border-bottom: 1px solid #eee;
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
        .table td,
        .table th {
            border-top: 0;
        }

        .invoice table td,
        .invoice table th {
            padding: 10px 15px;
            border-bottom: 1px solid #eee;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #eee;
        }

        .table-bordereds td,
        .table-bordereds th {
            border: 0;
        }
    </style>

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content" id='printable_div_id'>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="table table-bordered">
                        <div id="invoice">
                            <div class="invoice">
                                <header>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h2 class="fw-bold">PRASHANT CARGO & LOGISTICS</h2>
                                            <h6 class="fw-bold">S-21/123-1, SUBHASH NAGAR MALDAHIYA CANTT,
                                                VARANASI-221005</h6>
                                            <p>Phone :9335542484,8887790443,9335642484</p>
                                        </div>
                                        <hr>
                                    </div>
                                </header>
                                <main>
                                    <table class="table table-sm table-bordereds">
                                        <tbody>
                                            <tr>
                                                <td>G.R.No/Bill. No- <b>L83337</b></td>
                                                <td>Date- <b>05/01/2024</b> 21:17:48</td>
                                                <td>Destination- <b>PATNA CITY</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">From- <b>Varanasi</b></td>
                                                <td>To- <b>PATNA CITY</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding: 0;">
                                                    <table style="border:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 50%; border:0;padding: 5px 15px;">
                                                                    Consignor <b style="text-align:end;">: AMAR
                                                                        TRAVELS</b></td>
                                                                <td style="width: 50%; border:0;padding: 5px 15px;">
                                                                    Consignee <b>: JAI BABA GILLAT ORNAMENTS</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 50%; border:0;padding: 5px 15px;">
                                                                    GSTIN <b style="text-align:end;">:
                                                                        10AZQPA8845A1ZQ</b></td>
                                                                <td style="width: 50%; border:0;padding: 5px 15px;">
                                                                    GSTIN <b>: 10AZQPA8845A1ZQ</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 50%; border:0;padding: 5px 15px;">
                                                                    Description <b style="text-align:end;">: 3911</b>
                                                                </td>
                                                                <td style="width: 50%; border:0;padding: 5px 15px;">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 50%; border:0;padding: 5px 15px;">Bill
                                                                    No. <b style="text-align:end;">:965</b></td>
                                                                <td style="width: 50%; border:0;padding: 5px 15px;">
                                                                    Value <b>: 9250</b></td>
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
                                                <th>Number of Packages</th>
                                                <th>Nature of Goods Said to contain</th>
                                                <th>Weight</th>
                                                <th>Freight</th>
                                                <th>Particulars</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-left">1</td>
                                                <td>IMITATION</td>
                                                <td>61.000</td>
                                                <td>TO PAY</td>
                                                <td>Freight Charges</td>
                                                <td>200.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">1</td>
                                                <td>IMITATION</td>
                                                <td>61.000</td>
                                                <td>TO PAY</td>
                                                <td>Freight Charges</td>
                                                <td>200.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">1</td>
                                                <td>IMITATION</td>
                                                <td>61.000</td>
                                                <td>TO PAY</td>
                                                <td>Freight Charges</td>
                                                <td>200.00</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">Seal /Received above mentioned production in good
                                                    condition and correct measure.<br>
                                                    I/We declare that GST shall be payable by consignor/consignee</td>
                                                <td colspan="1">Insurance</td>
                                                <td>200.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">I/We have not to claim or avail examption for value
                                                    of goods & material.</td>
                                                <td colspan="1">B. Charges</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td colspan="1">G.S.T</td>
                                                <td>30</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td colspan="1">Total</td>
                                                <td>500.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <table style="border:0; margin-bottom:0;">
                                        <tbody>
                                            <tr>
                                                <td style="border: 0;">Consignee's Signature with Ruber Stamp</td>
                                                <td style="border: 0;text-align: right;"><b
                                                        style="text-align:left;">PRINCE</b> <br> For Prashant Cargo &
                                                    Logistics</td>
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
                    <button type="button" class="btn btn-dark" onClick="printdiv('printable_div_id');"><i class="fa fa-print"></i>
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
