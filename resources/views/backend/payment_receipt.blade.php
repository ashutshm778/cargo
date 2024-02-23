@extends('backend.layouts.app')
@section('content')
    <style>
        .fn-600{
            font-weight:600;
        }
        .rps{
            border-radius: 10px;
            padding: 5px 10px 0px 10px;
            width: 20%;
            background: #dddddd;
            border: 2px solid #333;
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
                                        <div class="col-3">
                                            <b>GSTIN: 09AASFP5417E1ZY</b>
                                        </div>
                                        <div class="col-9 float-right">
                                            <b class="float-right">MONEY RECEIPT</b>
                                        </div>
                                        <div class="col-12 text-center">
                                            <h2 class="fw-bold">PRASHANT CARGO & LOGISTICS</h2>
                                            <p class="mb-0 fn-600">H.O.: Near Diesel Power House, D.L.W. Road, Manduadih, Varanasi</p>
                                            <p class="mb-0 fn-600">S-21/123-1, Subhash Nagar, Maldahiya, Cantt, Vns - 221005, Mob.: 9335642484, 9335542484, 8887790443</p>
                                            <p class="mb-0 fn-600">B.O.: First Floor, Dilkush Plaza, Husainganj, Lucknow-7525910088</p>
                                            <p class="mb-0 fn-600">B.O.: Janak Kishore Road, Patna-7081211088</p>
                                            <hr>
                                        </div>
                                    </div>
                                </header>
                                <main>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><b>No.</b>01</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="float-end"><b>Date</b>.........................</p>
                                        </div>
                                        <div class="col-12">
                                            <p><b>Received with thanks from Mr/Mrs/M/s..</b>....................................................................................................................................................................</p>
                                            <p>....................................................................................................................................................................................................................................</p>
                                            <p><b>the sum of Rupees..</b>..................................................................................................................................................................................................</p>
                                            <p>....................................................................................................................................................................................................................................</p>
                                            <p><b>Against Bill No.</b>..................................................................................................................................................................................................</p>
                                        </div>
                                        <div class="col-8">
                                            <p><b>By cash/cheque/Draft No.</b>........................................................................................................</p>
                                        </div>
                                        <div class="col-4">
                                            <p><b>Date</b>....................................</p>
                                        </div>
                                        <div class="col-12">
                                            <p><b>Drawn On.</b>..................................................................................................................................................................................................</p>
                                        </div>
                                        <div class="col-12">
                                            <div class="rps">
                                                 <h3>Rs. </h3>
                                            </div>
                                        </div>
                                        <div class="col-8 mt-3">
                                            <p>Cheque will be credited to account on realisation</p>
                                        </div>
                                        <div class="col-4 mt-3">
                                        <p><b>Cashier/Accountant</b></p>
                                        </div>
                                    </div>
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
