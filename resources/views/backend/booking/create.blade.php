@extends('backend.layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
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
            <form method="POST" action="{{ route('booking.store') }}">
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

                                    @csrf
                                    <main>
                                        <table class="table table-sm">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        <label for="bill_no"> G.R.No/Bill. No- </label>
                                                        <input type="text" class="form-control col-5" id="bill_no"
                                                            name="bill_no" placeholder="Bill No" value="{{ old('bill_no') }}" required>
                                                            <span
                                                            style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                                            role="alert">
                                                            <strong>{{ $errors->first('bill_no') }}</strong>
                                                        </span>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="float-end float-end col-5 pr-0">
                                                            <label for="date">Date- </label>
                                                            <input type="date" class="form-control" id="date"
                                                                name="date" value="{{ old('date') }}" placeholder="Date" required>
                                                    </td>
                                </div>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label for="from">From- </label>
                                        <select class="form-control" id="pincode_select_from" name="from"
                                            data-placeholder="Please Select Pincodes..." required>
                                            <option value="">Select Pincode</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <label for="to">To-</label>
                                        <select class="form-control" id="pincode_select_to" name="to"
                                            data-placeholder="Please Select Pincodes..." required>
                                            <option value="">Select Pincode</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="consignee">Consignor Phone <a class="" data-toggle="modal"
                                                data-target="#exampleModal2" style="font-size: 20px;"><i
                                                    class="bx bxs-plus-square"></i></a></label>
                                        <input type="text" class="form-control" id="consignor_phone"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                            onKeyPress="if(this.value.length==10) return false;" maxlength="10"
                                            placeholder="Consignor Phone" name="consignor_phone" required value="{{ old('consignor_phone') }}">
                                    </td>
                                    <td>
                                        <label for="consignor">Consignor</label>
                                        <input type="text" class="form-control" id="consignor" name="consignor"
                                            placeholder="Consignor" value="{{ old('consignor') }}" required >
                                            <input type="hidden" id="consignor_id" name="consignor_id" value="{{ old('consignor_id') }}"/>
                                    </td>
                                    <td>
                                        <label for="consignee">Consignee Phone <a class="" data-toggle="modal"
                                                data-target="#exampleModal" style="font-size: 20px;"><i
                                                    class="bx bxs-plus-square"></i></a></label>
                                        <input type="text" class="form-control" id="consignee_phone"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                            onKeyPress="if(this.value.length==10) return false;" maxlength="10"
                                            placeholder="Consignee Phone" name="consignee_phone" required value="{{ old('consignee_phone') }}">
                                    </td>
                                    <td>
                                        <label for="consignor">Consignee</label>
                                        <input type="text" class="form-control" id="consignee" name="consignee"
                                            placeholder="Consignee" value="{{ old('consignee') }}" required>
                                            <input type="hidden" id="consignee_id" name="consignee_id" value="{{ old('consignee_id') }}" />
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label for="consignor_gstin">GSTIN</label>
                                        <input type="text" class="form-control" id="consignor_gstin"
                                            placeholder="Consignor GSTIN" name="consignor_gstin" value="{{ old('consignor_gstin') }}" required>
                                    </td>
                                    <td colspan="2">
                                        <label for="consignee_gstin">GSTIN</label> <input type="text"
                                            class="form-control" id="consignee_gstin" placeholder="Consignee GSTIN"
                                            name="consignee_gstin" required value="{{ old('consignee_gstin') }}">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <label for="booking_no">Bill No.</label><input type="text"
                                            class="form-control" id="booking_no" name="booking_no"
                                            placeholder="Booking No" value="{{ old('booking_no') }}" required>
                                            <span
                                            style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                            role="alert">
                                            <strong>{{ $errors->first('booking_no') }}</strong>
                                        </span>
                                    </td>
                                    <td colspan="2">
                                        <label for="value">Value</label>
                                        <input type="text" class="form-control" id="value" name="value"
                                            placeholder="Value" value="{{ old('value') }}" required>
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
                                        <tr>
                                            <td><a class="btn btn-primary add_button"><i
                                                        class="bx bxs-plus-square"></i></a>
                                            </td>
                                            <td class="text-left"><input type="text" class="form-control"
                                                    id="no_of_pack" name="no_of_pack[]" placeholder="No Of Package"
                                                    required></td>
                                            <td> <input type="text" class="form-control" id="product"
                                                    name="product[]" placeholder="Nature of Goods Said to contain"
                                                    required></td>
                                            <td> <input type="text" class="form-control" id="unit"
                                                        name="unit[]" placeholder="Enter Unit"
                                                        required></td>
                                            <td><input type="text" class="form-control" id="weight"
                                                    name="weight[]" placeholder="Weight" required></td>
                                            <td><input type="text" class="form-control" id="qty"
                                                        name="qty[]" placeholder="Qty" required></td>
                                            <td>Frieght Charges</td>
                                            <td><input type="number" class="form-control frieght_amount"
                                                    name="frieght_charge[]" placeholder="Freight"
                                                    onchange="cal_total_amount()" value="0" required></td>

                                        </tr>


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">Seal /Received above mentioned production in good
                                                condition and correct measure.<br>
                                                I/We declare that GST shall be payable by consignor/consignee</td>
                                            <td colspan="1">Insurance</td>
                                            <td><input type="number" class="form-control" id="insurance"
                                                    name="insurance" placeholder="Freight" value="0"
                                                    onchange="cal_total_amount()" required></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">I/We have not to claim or avail examption for value
                                                of goods & material.</td>
                                            <td colspan="1">B. Charges</td>
                                            <td><input type="number" class="form-control" id="b_charges"
                                                    name="b_charges" placeholder="Freight" value="0"
                                                    onchange="cal_total_amount()" required></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan="1">Other Charges</td>
                                            <td><input type="number" class="form-control" id="other_charges"
                                                    name="other_charges" placeholder="Other Charges" value="0"
                                                    onchange="cal_total_amount()" required></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan="1">G.S.T</td>
                                            <td><input type="number" class="form-control" id="gst" name="tax"
                                                    placeholder="Freight" value="0" onchange="cal_total_amount()"
                                                    required></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan="1">Total</td>
                                            <td><input type="number" class="form-control" id="total_amount"
                                                    name="total" placeholder="Freight" value="0" readonly
                                                    required></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan="1">Status</td>
                                            <td> <select class="form-control"  name="status" required>
                                                <option value="">Select Status</option>
                                                <option value="paid">Paid</option>
                                                <option value="unpaid">Unpaid</option>
                                            </select></td>
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
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>


            <!-- Modal -->



        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Consignee Add</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class="row" method="post" action="{{ route('admin.consignee_store') }}">
                            @csrf
                            <input type="hidden" name="from" value="booking" />
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="fullname" class="form-label">Name<span>*</span></label>
                                    <input type="text" class="form-control" id="fullname" name="name"
                                        placeholder="Name" required>
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>


                                <div class="col-md-4">
                                    <label for="mobile_no" class="form-label">Phone<span>*</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="Mobile No." required>
                                    <span
                                        style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                        role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                </div>
                                <div class="col-md-4">
                                    <label for="gstin" class="form-label">GSTIN<span>*</span></label>
                                    <input type="text" class="form-control" id="gstin" name="gstin"
                                        placeholder="GSTIN" required>
                                    <span
                                        style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                        role="alert">
                                        <strong>{{ $errors->first('gstin') }}</strong>
                                    </span>
                                </div>
                                <div class="col-md-4 mb-3 ">
                                    <label for="pincode" class="form-label">Pincode</label>
                                    <select class="form-control" id="pincode_select" name="pincode"
                                        data-placeholder="Please Select Pincodes..." onchange="get_pincode()" required>
                                        <option value="">Select Pincode</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="address" class="form-label">Address<span>*</span></label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Address" required>
                                </div>
                                <div class="col-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Consigner Add</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" action="{{ route('admin.consigner_store') }}">
                            @csrf
                            <input type="hidden" name="from" value="booking" />
                            <div class="col-md-4">
                                <label for="fullname" class="form-label">Name<span>*</span></label>
                                <input type="text" class="form-control" id="fullname" name="name"
                                    placeholder="Name" required>
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                            <div class="col-md-4">
                                <label for="mobile_no" class="form-label">Phone<span>*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Mobile No." required>
                                <span
                                    style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                    role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="gstin" class="form-label">GSTIN<span>*</span></label>
                                <input type="text" class="form-control" id="gstin" name="gstin"
                                    placeholder="GSTIN" required>
                                <span
                                    style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                    role="alert">
                                    <strong>{{ $errors->first('gstin') }}</strong>
                                </span>
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <label for="pincode" class="form-label">Pincode</label>
                                <select class="form-control" id="pincode_select2" name="pincode"
                                    data-placeholder="Please Select Pincodes..." onchange="get_pincode()" required>
                                    <option value="">Select Pincode</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="address" class="form-label">Address<span>*</span></label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Address" required>
                            </div>
                            <div class="col-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
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
                var total = insurance + b_charge + gst + totalAmount;
                var total = insurance + b_charge + gst + other_charges + totalAmount;
                $('#total_amount').val(total);

            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{ asset('backend/plugins/select2/js/select2-custom.js') }}"></script>
        <script>
            $('#pincode_select_from').select2({
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    url: '{{ route('admin_pincode.list') }}',
                    dataType: 'json',
                    data: function(params) {
                        return {
                            key: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true

                }
            });
            $('#pincode_select_to').select2({
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    url: '{{ route('admin_pincode.list') }}',
                    dataType: 'json',
                    data: function(params) {
                        return {
                            key: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true

                }
            });
            $('#pincode_select').select2({
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    url: '{{ route('admin_pincode.list') }}',
                    dataType: 'json',
                    data: function(params) {
                        return {
                            key: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true

                }
            });
            $('#pincode_select2').select2({
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    url: '{{ route('admin_pincode.list') }}',
                    dataType: 'json',
                    data: function(params) {
                        return {
                            key: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true

                }
            });
        </script>

        <script>
            $("#consignee_phone").keyup(function() {
                var phone = $('#consignee_phone').val();
                if (phone.length > 9) {
                    $.ajax({
                        type: "GET",
                        async: false,
                        dataType: 'json',
                        url: "{{ route('admin.get_consignee_data') }}",
                        data: {
                            _token: '{{ csrf_token() }}',
                            phone: phone
                        },
                        success: function(response) {

                            $('#consignee').val(response.name).prop('readOnly', true);
                            $('#consignee_gstin').val(response.gstin).prop('readOnly', true);
                            $('#consignee_id').val(response.id);

                        }
                    });
                }else{
                            $('#consignee').val('').prop('readOnly', false);
                            $('#consignee_gstin').val('').prop('readOnly', false);
                            $('#consignee_id').val('');
                }
            });

            $("#consignor_phone").keyup(function() {
                var phone = $('#consignor_phone').val();
                if (phone.length > 9) {
                    $.ajax({
                        type: "GET",
                        async: false,
                        dataType: 'json',
                        url: "{{ route('admin.get_consigner_data') }}",
                        data: {
                            _token: '{{ csrf_token() }}',
                            phone: phone
                        },
                        success: function(response) {

                            $('#consignor').val(response.name).prop('readOnly', true);
                            $('#consignor_gstin').val(response.gstin).prop('readOnly', true);
                            $('#consignor_id').val(response.id);



                        }
                    });
                }else{
                            $('#consignor').val('').prop('readOnly', false);
                            $('#consignor_gstin').val('').prop('readOnly', false);
                            $('#consignor_id').val('');
                }
            });
        </script>
    @endsection
