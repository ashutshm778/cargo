<div>

    <div class="page-wrapper">
        <div class="page-content" id='printableArea'>
            <!--end breadcrumb-->
            <main>
                <!--end breadcrumb-->
                <div class="card">
                    <div class="card-body">
                        <div class="table table-bordered">
                            <div id="invoice">
                                <div class="invoice">
                                    <header>
                                        <div class="row">
                                            <div class="col-12 ">
                                                <h2 class="fw-bold mb-1 text-center">Prashant
                                                    Cargo & Logistics Pvt. Ltd</h2>
                                                <h6 class="text-center"> <u>Delivery Run Sheet</u></h6>
                                            </div>
                                        </div>
                                    </header>
                                    <main>
                                        <table class="table" style="border-bottom: 0;">
                                            <tbody>
                                                <tr>
                                                    <td>DRS No: {{$data->drs_no}}<br>
                                                        <img src="" alt="">
                                                    </td>
                                                    <td>Date/Time: {{ date('d-m-y H:i') }}<br></td>
                                                    <td>DelBoy- {{$data->staff_detail->name}}<br>Branch- {{$data->staff_detail->branch_data->name}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-borderd">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20%;">Awb No.</th>
                                                    <th style="width: 10%;">PC's</th>
                                                    <th style="width: 30%;">Consignee</th>
                                                    <th style="width: 30%;">Sign/Stamp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data->drsList as $drs_detail)
                                                    @php $booking=App\Models\Booking::where('bill_no',$drs_detail->bill_no)->first(); @endphp
                                                    <tr>
                                                        @php
                                                            $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
                                                            $barcode = $generator->getBarcode(
                                                                $booking->bill_no,
                                                                $generator::TYPE_CODE_128,
                                                            );
                                                        @endphp
                                                        <td>
                                                            <span style="justify-content: center;display: flex;">
                                                                {!! $barcode !!}</span>
                                                            <span
                                                                style="justify-content: center;display: flex;">{{ $booking->bill_no }}</span>
                                                        </td>
                                                        <td>Pcs: {{ $booking->booking_product->no_of_pack }}</td>
                                                        <td>{{ $booking->consignee }} <br>
                                                            {{ $booking->delivery_address }},<br>
                                                            {{ $booking->consignee_phone }}
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </main>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <div class="toolbar no-print mb-3">
                <div class="mt-4">

                        <div class="float-end">
                            <button type="button" id="print_button" class="btn btn-dark"
                                onClick="printDiv('printableArea');"><i class="fa fa-print"></i>
                                Print</button>
                        </div>
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
    </script>
</div>
