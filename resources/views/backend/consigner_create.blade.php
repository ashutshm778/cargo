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
                            <h6 class="mb-0">Add Consigner</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <form class="row g-4" method="post" action="{{ route('admin.consigner_store') }}">
                            @csrf
                            <div class="col-md-4">
                                <label for="fullname" class="form-label">Name<span>*</span></label>
                                <input type="text" class="form-control" id="fullname" name="name" placeholder="Name"
                                    required>
                                    <strong>{{ $errors->first('name') }}</strong>
                            </div>


                            <div class="col-md-4">
                                <label for="mobile_no" class="form-label">Phone<span>*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Mobile No." required>
                                <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                    role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="gstin" class="form-label">GSTIN</label>
                                <input type="text" class="form-control" id="gstin" name="gstin" placeholder="GSTIN"
                                    >
                                <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
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
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                                    required>
                            </div>
                            <div class="col-12">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
    </script>
@endsection
