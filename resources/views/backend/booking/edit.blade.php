@extends('backend.layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Edit Booking</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <form class="row g-4" method="post" action="{{ route('booking.update',$booking->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <label for="bill_no" class="form-label">Bill No<span>*</span></label>
                                <input type="text" class="form-control" id="bill_no" name="bill_no" placeholder="Bill No" value="{{$booking->bill_no}}"
                                    required>
                                    <strong>{{ $errors->first('bill_no') }}</strong>
                            </div>
                            <div class="col-md-4">
                                <label for="from" class="form-label">From<span>*</span></label>
                                <input type="text" class="form-control" id="from" name="from" placeholder="From" value="{{$booking->from}}"
                                    required>
                                <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                    role="alert">
                                    <strong>{{ $errors->first('from') }}</strong>
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="tp" class="form-label">To<span>*</span></label>
                                <input type="text" class="form-control" id="to" name="to" value="{{$booking->to}}"
                                    placeholder="To" required>
                                <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                    role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="date" class="form-label">Date<span>*</span></label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="Date" value="{{$booking->date}}"
                                    required>
                                    <strong>{{ $errors->first('date') }}</strong>
                            </div>
                            <div class="col-md-4">
                                <label for="consignor" class="form-label">Consignor<span>*</span></label>
                                <input type="text" class="form-control" id="consignor" name="consignor" placeholder="Consignor" value="{{$booking->consignor}}"
                                    required>
                                <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                    role="alert">
                                    <strong>{{ $errors->first('consignor') }}</strong>
                                </span>
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <label for="consignee" class="form-label">Consignee</label>
                                <input type="text" class="form-control" id="consignee" placeholder="Consignee" name="consignee" value="{{$booking->consignee}}"
                                required>
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <label for="consignor_gstin" class="form-label">Consignor GSTIN</label>
                                <input type="text" class="form-control" id="consignor_gstin" placeholder="Consignor GSTIN" name="consignor_gstin" value="{{$booking->consignor_gstin}}"
                                    required>
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <label for="consignee_gstin" class="form-label">Consignee GSTIN</label>
                                <input type="text" class="form-control" id="consignee_gstin" placeholder="Consignee GSTIN" name="consignee_gstin" value="{{$booking->consignee_gstin}}"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="booking_no" class="form-label">Booking No<span>*</span></label>
                                <input type="text" class="form-control" id="booking_no" name="booking_no" placeholder="Booking No" value="{{$booking->booking_no}}"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="no_of_pack" class="form-label">No Of Package<span>*</span></label>
                                <input type="text" class="form-control" id="no_of_pack" name="no_of_pack" placeholder="No Of Package" value="{{$booking->no_of_pack}}"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="product" class="form-label">Nature of Goods Said to contain<span>*</span></label>
                                <input type="text" class="form-control" id="product" name="product" placeholder="Nature of Goods Said to contain" value="{{$booking->product}}"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="weight" class="form-label">Weight<span>*</span></label>
                                <input type="text" class="form-control" id="weight" name="weight" placeholder="Weight" value="{{$booking->weight}}"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="freight" class="form-label">Freight<span>*</span></label>
                                <input type="text" class="form-control" id="freight" name="freight" placeholder="Freight" value="{{$booking->freight}}"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="freight_charges" class="form-label">Freight Charges<span>*</span></label>
                                <input type="text" class="form-control" id="freight_charges" name="freight_charges" placeholder="Freight Charges" value="{{$booking->freight_charges}}"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="insurance" class="form-label">Insurance<span>*</span></label>
                                <input type="text" class="form-control" id="insurance" name="insurance" placeholder="Insurance" value="{{$booking->insurance}}"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="b_charges" class="form-label">B Charges<span>*</span></label>
                                <input type="text" class="form-control" id="b_charges" name="b_charges" placeholder="B Charges" value="{{$booking->b_charges}}"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="other_charges" class="form-label">Other Charges<span>*</span></label>
                                <input type="text" class="form-control" id="other_charges" name="other_charges" placeholder="Other Charges" value="{{$booking->other_charges}}"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="tax" class="form-label">GST<span>*</span></label>
                                <input type="text" class="form-control" id="tax" name="tax" placeholder="GST" value="{{$booking->tax}}"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="value" class="form-label">Value<span>*</span></label>
                                <input type="text" class="form-control" id="value" name="value" placeholder="Value" value="{{$booking->value}}"
                                    required>
                            </div>
                            <div class="col-md-8">
                                <label for="value" class="form-label">Description<span>*</span></label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="{{$booking->description}}"
                                    required>
                            </div>
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
    <!--end page wrapper -->
@endsection
@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('backend/plugins/select2/js/select2-custom.js') }}"></script>
    <script>
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

        function get_pincode() {
            var pincode = $('#pincode_select').val();
            $.get('{{ route('admin.get_pincode') }}', {
                _token: '{{ csrf_token() }}',
                pincode: pincode
            }, function(data) {
                console.log(data);
                $('#city').val(data.city);
                $('#state').val(data.state);
            });
        }
    </script>
@endsection
