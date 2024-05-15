<!-- resources/views/pdf_template.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Content</title>
    <link href="https://prashantcargo.com/backend/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .page-wrapper{
            height: 100%;
            margin-top: 60px;
            margin-bottom: 30px;
            margin-left: 250px
        }
        .invoice table {

width: 100%;

border-collapse: collapse;

border-spacing: 0;

margin-bottom: 20px

}



.invoice table td,

.invoice table th {
padding: 10px;
border-bottom: 1px solid #eee
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none;
}

.invoice table th {

white-space: nowrap;

font-weight: 600;

font-size: 14px

}



.invoice table td h3 {

margin: 0;

font-weight: 400;

color: #541545;

font-size: 1.2em

}
    </style>
</head>
<body style="background: #fff;">
    <div class="page-wrapper m-0">
        <div class="page-content">
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
                                        <hr>
                                    </div>
                                </header>
                                <main>
                                    <table class="table" style="border-bottom: 0;">
                                        <tbody>
                                            <tr>
                                                <td>DRS No: DKNP3A2405021636<br>
                                                <img src="" alt="">
                                                </td>
                                                <td>Date/Time: {{date('d-m-y H:i')}}<br></td>
                                                <td>DelBoy- {{$delivery_boy->name}}<br></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-borderd">
                                        <thead>
                                            <tr>
                                                <th>Awb No.</th>
                                                <th>VAS Details</th>
                                                <th>Consignee/Address/Phone</th>
                                                <th>Sign/Stamp</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list as $booking)
                                            <tr>
                                                @php
                                                    $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
                                                    $barcode = $generator->getBarcode($booking->bill_no, $generator::TYPE_CODE_128);
                                                @endphp
                                                <td>
                                                    <span style="justify-content: center;display: flex;"> {!!$barcode!!}</span>
                                                    <span style="justify-content: center;display: flex;">{{$booking->bill_no}}</span>
                                                </td>
                                                <td>Pcs: {{count($booking->booking_product)}}</td>
                                                <td>{{ $booking->consignee }} <br>
                                                  {{$booking->delivery_address}},<br>
                                                    {{$booking->consignee_phone}}
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
        </div>
    </div>
</body>
</html>

