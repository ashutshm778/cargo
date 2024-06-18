<div>
<style>
    tbody, td, tfoot, th, thead, tr {
    border: 1px solid #000;
}
.invoice header{
    border-bottom: 0;
}
</style>
    <div class="page-wrapper">
        <div class="page-content" id='printableArea'>

                                    <main>
                                        <table class="table table-sm table-bordered mt-1 mb-0">
                                            <tbody>
                                                <tr>
                                                    <td colspan="3" >
                                                        <h2 class="fw-bold mb-1 text-center">Prashant
                                                            Cargo & Logistics</h2>
                                                        <h6 class="text-center"> <u>Delivery Run Sheet</u></h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="border-bottom: 1px solid transparent;">DRS No: {{$data->drs_no}}<br>
                                                        <img src="" alt="">
                                                    </td style="border-bottom: 1px solid transparent;">
                                                    <td style="border-bottom: 1px solid transparent;">Date/Time: {{ date('d-m-y H:i') }}<br></td>
                                                    <td style="border-bottom: 1px solid transparent;">DelBoy- {{$data->staff_detail->name}}<br>Branch- {{$data->staff_detail->branch_data->name}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 15%;">Awb No.</th>
                                                    <th style="width: 10%;">PC's</th>
                                                    <th style="width: 35%;">Consignee</th>
                                                    <th style="width: 40%;">Sign/Stamp</th>
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
