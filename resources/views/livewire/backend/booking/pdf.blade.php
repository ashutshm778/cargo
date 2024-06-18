<!-- resources/views/pdf_template.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Content</title>
    <link href="https://prashantcargo.com/backend/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: #fff;">
    <div class="page-wrapper m-0">
        <div class="page-content">
            <main>
                <table class="table table-sm table-bordered mt-1 mb-0" style="border: 1px solid #000;">
                    <tbody>
                        <tr>
                            <td colspan="3" style="border: 1px solid #000;">
                                <h2 class="fw-bold mb-1 text-center">Prashant
                                    Cargo & Logistics </h2>
                                <h6 class="text-center"> <u>Delivery Run Sheet</u></h6>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000;border-bottom: 1px solid transparent;">DRS No: {{ $list->drs_no }}<br>
                                <img src="" alt="">
                            </td style="border: 1px solid #000;border-bottom: 1px solid transparent;">
                            <td style="border: 1px solid #000;border-bottom: 1px solid transparent;">Date/Time: {{ date('d-m-y H:i') }}<br></td>
                            <td style="border: 1px solid #000;border-bottom: 1px solid transparent;">DelBoy- {{ $list->staff_detail->name }}<br>Branch-
                                {{ $list->staff_detail->branch_data->name }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #000; width:25%;text-align:center;">Awb No.</th>
                            <th style="border: 1px solid #000; width:10%;text-align:center;">PC's</th>
                            <th style="border: 1px solid #000; width:30%;text-align:center;">Consignee</th>
                            <th style="border: 1px solid #000; width:35%;text-align:center;">Sign/Stamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list->drsList as $drs_detail)
                            @php $booking=App\Models\Booking::where('bill_no',$drs_detail->bill_no)->first(); @endphp
                            <tr style="border: 1px solid #000; text-align:center;">
                                @php
                                    $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
                                    $barcode = $generator->getBarcode($booking->bill_no, $generator::TYPE_CODE_128);
                                @endphp
                                <td style="border: 1px solid #000;text-align:center;">
                                    <span style="justify-content: center;display: flex;text-align:center;">
                                        {!! $barcode !!}</span>
                                    <span style="justify-content: center;display: flex;text-align:center;">{{ $booking->bill_no }}</span>
                                </td>
                                <td style="border: 1px solid #000;text-align:center;">Pcs: {{ $booking->booking_product->no_of_pack }}</td>
                                <td style="border: 1px solid #000;text-align:center;">{{ $booking->consignee }} <br>
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

</body>

</html>
