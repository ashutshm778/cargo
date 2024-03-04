@extends('backend.layouts.app')
@section('content')
    <style>
        label {
            display: inline-block;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .invoice table td {
            padding: 7px;
        }

        .invoice table tfoot td {
            padding: 5px 5px;
        }

        .btn i {
            margin-right: 0;
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
                                            <hr>
                                        </div>

                                    </div>
                                </header>
                                <form method="POST" action="{{ route('booking.update', $booking->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <main>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label for="bill_no">G.R.No/Bill. No-</label>
                                                        <input type="text" class="form-control col-5" id="bill_no"
                                                            name="bill_no" placeholder="Bill No"
                                                            value="{{ $booking->bill_no }}" required>
                                                    </td>
                                                    <td>
                                                        <div class="float-end float-end col-5 pr-0">
                                                        <label for="date">Date-</label>
                                                        <input type="date" class="form-control" id="date"
                                                            name="date" placeholder="Date" value="{{ $booking->date }}"
                                                            required>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="from">From-</label>
                                                        <input type="text" class="form-control" id="from"
                                                            name="from" placeholder="From" value="{{ $booking->from }}"
                                                            required>
                                                    </td>
                                                    <td>
                                                        <label for="to">To-</label>
                                                        <input type="text" class="form-control" id="to"
                                                            name="to" placeholder="To" value="{{ $booking->to }}"
                                                            required>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label for="consignor">Consignor</label>
                                                        <input type="text" class="form-control" id="consignor"
                                                            name="consignor" placeholder="Consignor"
                                                            value="{{ $booking->consignor }}" required>
                                                    </td>
                                                    <td>
                                                        <label for="consignee">Consignee</label>
                                                        <input type="text" class="form-control" id="consignee"
                                                            placeholder="Consignee" name="consignee"
                                                            value="{{ $booking->consignee }}" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="consignor_gstin">GSTIN</label> <input type="text"
                                                            class="form-control" id="consignor_gstin"
                                                            placeholder="Consignor GSTIN" name="consignor_gstin"
                                                            value="{{ $booking->consignor_gstin }}" required>
                                                    </td>
                                                    <td>
                                                        <label for="consignee_gstin">GSTIN</label> <input type="text"
                                                            class="form-control" id="consignee_gstin"
                                                            placeholder="Consignee GSTIN" name="consignee_gstin"
                                                            value="{{ $booking->consignee_gstin }}" required>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label for="booking_no">Bill
                                                            No.</label> <input type="text" class="form-control"
                                                            id="booking_no" name="booking_no" placeholder="Booking No"
                                                            value="{{ $booking->booking_no }}" required>
                                                    </td>
                                                    <td>
                                                        <label for="value">Value</label> <input type="text"
                                                            value="{{ $booking->value }}" class="form-control"
                                                            id="value" name="value" placeholder="Value" required>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <table class="table table-borderd">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Number of Packages</th>
                                                    <th>Nature of Goods Said to contain</th>
                                                    <th>Unit</th>
                                                    <th>Weight</th>
                                                    <th>Qty</th>
                                                    <th>Particulars</th>
                                                    <th>Amount</th>

                                                </tr>
                                            </thead>
                                            <tbody class="field_wrapper">

                                                @foreach ($booking->booking_product as $key => $booking_product)
                                                    <input type="hidden" name="booking_product_id[]"
                                                        value="{{ $booking_product->id }}" />
                                                    <tr>
                                                        <td>{{ $key + 1 }}</a>
                                                        </td>
                                                        <td class="text-left"><input type="text" class="form-control"
                                                                id="no_of_pack" name="no_of_pack[]"
                                                                placeholder="No Of Package"
                                                                value="{{ $booking_product->no_of_pack }}" required></td>
                                                        <td> <input type="text" class="form-control" id="product"
                                                                name="product[]"
                                                                placeholder="Nature of Goods Said to contain"
                                                                value="{{ $booking_product->product }}" required></td>
                                                                <td> <input type="text" class="form-control" id="unit"
                                                                    name="unit[]" placeholder="Enter Unit"  value="{{ $booking_product->unit }}"
                                                                    required></td>
                                                        <td><input type="text" class="form-control" id="weight"
                                                                name="weight[]" placeholder="Weight"
                                                                value="{{ $booking_product->weight }}" required></td>
                                                        <td><input type="text" class="form-control" id="qty"
                                                                    name="qty[]" placeholder="Qty"  value="{{ $booking_product->qty }}" required></td>
                                                        <td>Frieght Charges</td>
                                                        <td><input type="number" class="form-control frieght_amount"
                                                                name="frieght_charge[]" placeholder="Freight"
                                                                onchange="cal_total_amount()"
                                                                value="{{ $booking_product->freight_charges }}"required>
                                                        </td>

                                                    </tr>
                                                @endforeach


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6">Seal /Received above mentioned production in good
                                                        condition and correct measure.<br>
                                                        I/We declare that GST shall be payable by consignor/consignee</td>
                                                    <td colspan="1">Insurance</td>
                                                    <td><input type="number" class="form-control" id="insurance"
                                                            name="insurance" placeholder="Freight"
                                                            value="{{ $booking->insurance }}"
                                                            onchange="cal_total_amount()" required></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6">I/We have not to claim or avail examption for value
                                                        of goods & material.</td>
                                                    <td colspan="1">B. Charges</td>
                                                    <td><input type="number" class="form-control" id="b_charges"
                                                            name="b_charges" placeholder="Freight"
                                                            value="{{ $booking->b_charges }}"
                                                            onchange="cal_total_amount()" required></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6"></td>
                                                    <td colspan="1">Other Charges</td>
                                                    <td><input type="number" class="form-control" id="other_charges"
                                                            name="other_charges" placeholder="Other Charges"
                                                            value="{{ $booking->other_charges }}"
                                                            onchange="cal_total_amount()" required></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6"></td>
                                                    <td colspan="1">G.S.T</td>
                                                    <td><input type="number" class="form-control" id="gst"
                                                            name="tax" placeholder="Freight"
                                                            value="{{ $booking->tax }}" onchange="cal_total_amount()"
                                                            required></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6"></td>
                                                    <td colspan="1">Total</td>
                                                    <td><input type="number" class="form-control" id="total_amount"
                                                            name="total" placeholder="Freight"
                                                            value="{{ $booking->total }}" readonly required></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <table style="border:0; margin-bottom:0;">
                                            <tbody>
                                                <tr>
                                                    <td style="border: 0;">Consignee's Signature with Ruber Stamp</td>
                                                    <td style="border: 0;text-align: right;"><b
                                                            style="text-align:left;">{{ Auth::guard('admin')->user()->name }}</b>
                                                        <br> For Prashant Cargo &
                                                        Logistics
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </main>
                                    <div class="col-12">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML =
                '<tr> <td><a class="btn btn-danger remove_button" ><i class="bx bxs-minus-square"></i></a> </td> <td class="text-left"><input type="text" class="form-control" id="no_of_pack" name="no_of_pack[]" placeholder="No Of Package" required></td> <td> <input type="text" class="form-control" id="product" name="product[]" placeholder="Nature of Goods Said to contain" required></td> <td><input type="text" class="form-control" id="weight" name="weight[]" placeholder="Weight" required></td> <td>To Pay</td> <td>Frieght Charges</td> <td><input type="text" class="form-control frieght_amount"  name="frieght_charge[]" placeholder="Freight" onchange="cal_total_amount()" value="0" required></td> </tr>'; //New input field html
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function() {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
            });

        });

        function cal_total_amount() {

            var insurance = parseInt($('#insurance').val());
            var b_charge = parseInt($('#b_charges').val());
            var gst = parseInt($('#gst').val());
            var other_charges = parseInt($('#other_charges').val());


            let totalAmount = 0;

            // Iterate through each element with class "freight_amount"
            $(".frieght_amount").each(function() {
                // Get the value of the current element and convert it to a number
                const freightValue = parseInt($(this).val());
                // Add the value to the total amount
                totalAmount += freightValue;
            });

            var total = insurance + b_charge + gst + other_charges + totalAmount;
            $('#total_amount').val(total);

        }
    </script>
@endsection
