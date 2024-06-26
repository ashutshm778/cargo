
<style>
    /* General styles */
/* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}
p{
    margin-top: 0;
    margin-bottom: 0
    }
/* Print styles */
@media print {
    @page {
        size: 4in 3in;
        margin: 0;

    }
    body{
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 4in;
        height: 3in;
        box-sizing: border-box;

    }
    .page {
       width: 100%;
       height: 100%;
       display: flex;
       justify-content: center;
       align-items: center;
       border: 1px solid black;
    }
    p{
        margin-top: 0;
        margin-bottom: 0;
        font-size: 12px;
    }
    .top-container {
        position: absolute;
        top: 0;
        width: 100%;
        box-sizing: border-box;
    }

    .bottom-container {
        position: absolute;
        bottom: 0;
        width: 100%;
        box-sizing: border-box;
    }

    .content {
        margin-bottom: 20px;
        padding: 10px;
    }
    .table{
        /* width: 100% !important */
    }
    .table p{
        font-size: 12px !important;
}
}

/* Screen styles */
.container {
    margin: 20px 0;
}

.header {
    background-color: #f0f0f0;
    padding: 10px;
}

.content {
    padding: 10px;
}

.footer {
    background-color: #f0f0f0;
    padding: 10px;
}

.table{
    border: 1px solid;
    border-collapse: collapse
}
.table tr, td, th{
    border: 1px solid;
    padding: 5px;
}
p{
    font-size: 12px;
}
</style>
{{-- <div class="prnt"> --}}
    @php
        $booking_product=App\Models\BookingProduct::find(request()->segment(3));
        $booking=App\Models\Booking::find($booking_product->booking_id);
        $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($booking->bill_no, $generator::TYPE_CODE_128);
        $booking_product_barcode=App\Models\BookingProductBarcode::where('booking_product_id',$booking_product->id)->get()->pluck('barcode')->toArray();

    @endphp
        @foreach (array_chunk($booking_product_barcode, 2) as $key=> $barcodeChunk)
        <div class="page">
            @if(!empty($barcodeChunk[0]))
            <div class="container top-container">

                <div class="content">
                    <table class="table table-sm table-bordered">
                        @php  $b_p_barcode=App\Models\BookingProductBarcode::where('barcode',$barcodeChunk[0])->first(); @endphp
                        <tbody>
                            <tr>
                                <td colspan="2" style="text-align: center;margin:0 auto;">
                                    <span style="justify-content: center;display: flex;">{!! $barcode !!}</span>
                                    <p>{{ $booking->bill_no }}</p>
                                </td>
                                <td>
                                    <p>{{ $booking_product->product }}</p>
                                    {{ $key + 1 }}/{{ count($booking_product_barcode) }}
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <p>Consignee:</p>
                                    <p>{{ $booking->consignee }}</p>
                                </td>

                                <td>
                                    <p>Consignor:</p>
                                    <p>{{ $booking->consignor }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">

                                    <p>From : {{ $booking->branch_from->name }}</p>
                                    <p>To : {{ $booking->branch_to->name }}</p>
                                    <p>Weight : {{ $b_p_barcode->weight }} Kg</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center">
                                    @php
                                        $generators = new \Picqer\Barcode\BarcodeGeneratorHTML();
                                        $barcodes = $generators->getBarcode(
                                            $b_p_barcode->barcode,
                                            $generators::TYPE_CODE_128,
                                        );
                                    @endphp
                                    <span style="justify-content: center;display: flex;"> {!! $barcodes !!}</span>
                                    <span
                                        style="justify-content: center;display: flex;">{{ $b_p_barcode->barcode }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            @endif
            @if(!empty($barcodeChunk[1]))
            <div class="container bottom-container">

                <div class="content">
                    <table class="table table-sm table-bordered">
                    @php  $b_p_barcode=App\Models\BookingProductBarcode::where('barcode',$barcodeChunk[1])->first(); @endphp
                        <tbody>
                            <tr>
                                <td colspan="2" style="text-align: center;margin:0 auto;">
                                    <span style="justify-content: center;display: flex;">{!! $barcode !!}</span>
                                    <p>{{ $booking->bill_no }}</p>
                                </td>
                                <td>
                                    <p>{{ $booking_product->product }}</p>
                                    {{ $key + 1 }}/{{ count($booking_product_barcode) }}
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <p>Consignee:</p>
                                    <p>{{ $booking->consignee }}</p>
                                </td>

                                <td>
                                    <p>Consignor:</p>
                                    <p>{{ $booking->consignor }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">

                                    <p>From : {{ $booking->branch_from->name }}</p>
                                    <p>To : {{ $booking->branch_to->name }}</p>
                                    <p>Weight : {{ $b_p_barcode->weight }} Kg</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center">
                                    @php
                                        $generators = new \Picqer\Barcode\BarcodeGeneratorHTML();
                                        $barcodes = $generators->getBarcode(
                                            $b_p_barcode->barcode,
                                            $generators::TYPE_CODE_128,
                                        );
                                    @endphp
                                    <span style="justify-content: center;display: flex;"> {!! $barcodes !!}</span>
                                    <span
                                        style="justify-content: center;display: flex;">{{ $b_p_barcode->barcode }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            @endif
        </div>
        @endforeach





