@extends('backend.layouts.app')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">View Customer</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-body row">
                            <div class="col-md-6">
                                <label for="referral_by" class="form-label">Sponsor Code<span>*</span></label>
                                    <input type="text" class="form-control" id="referral_by" name="referral_by"
                                        placeholder="Sponsor Code " value="{{$user->referral_by}}">
                            </div>
                            <div class="col-md-6">
                                    <label for="fullname" class="form-label">Sponsor Name<span>*</span></label>
                                    <input type="text" class="form-control" id="sponsor_name"
                                        placeholder="Sponsor Name" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="fullname" class="form-label">Name<span>*</span></label>
                                    <input type="text" class="form-control" id="fullname" name="name"
                                        placeholder="Name" value="{{$user->name}}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="Address" class="form-label">Address<span>*</span></label>
                                    <input type="text" class="form-control" id="Address" name="address"
                                        placeholder="Address" value="{{$user->address}}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email<span>*</span></label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email" value="{{$user->email}}" required>
                                        <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                            </div>

                            <div class="col-md-6">
                                <label for="mobile_no" class="form-label">Mobile No<span>*</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="Mobile No." value="{{$user->phone}}" required>
                                        <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label">Profile Image</label>
                                <div class="p-2">
                                    <img src="@if(!empty($user->profile_picture)){{asset('frontend/customer/'.$user->profile_picture)}}@endif" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" height="100px" width="100px">
                                </div>
                            </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="mb-3 text-uppercase bg-light p-2">KYC Information</h5>
                    <hr>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="images" class="form-label">Aadhaar Number<span class="text-danger">*</span></label>
                                <input type="text" name="aadhaar" id="aadhaar" class="form-control" value="{{$user->user_kyc->aadhaar}}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="images" class="form-label">Aadhaar Front</label>
                                <div class="p-2">
                                    <img src="@if(!empty($user->user_kyc->aadhaar_front_file)){{asset('frontend/customer/'.$user->user_kyc->aadhaar_front_file)}}@endif" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" height="100px" width="100px">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="images" class="form-label">Aadhaar back</label>
                                <div class="p-2">
                                    <img src="@if(!empty($user->user_kyc->aadhaar_back_file)){{asset('frontend/customer/'.$user->user_kyc->aadhaar_back_file)}}@endif" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" height="100px" width="100px">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="images" class="form-label">Pan Number<span class="text-danger">*</span></label>
                                <input type="text" name="pan" id="pan" class="form-control" value="{{$user->user_kyc->pan}}"   required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="images" class="form-label">Pan File</label>
                                <div class="p-2">
                                    <img src="@if(!empty($user->user_kyc->pan_file)){{asset('frontend/customer/'.$user->user_kyc->pan_file)}}@endif" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" height="100px" width="100px">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">

                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="images" class="form-label">Bank Passbook File</label>
                                <div class="p-2">
                                    <img src="@if(!empty($user->user_kyc->bank_passbook_file)){{asset('frontend/customer/'.$user->user_kyc->bank_passbook_file)}}@endif" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" height="100px" width="100px">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="images" class="form-label">Cancel Cheque File</label>
                                <div class="p-2">
                                    <img src="@if(!empty($user->user_kyc->cancelled_cheque_file)){{asset('frontend/customer/'.$user->user_kyc->cancelled_cheque_file)}}@endif" onerror="this.onerror=null;this.src='{{asset('backend/img/no-image.png')}}'" height="100px" width="100px">
                                </div>
                            </div>
                        </div>


                </div>

                <div class="card-body">

                    <h5 class="mb-3 text-uppercase bg-light p-2">Bank Account Information</h5>
                    <hr>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="holder_name" class="form-label">Account Holder Name <span
                                        class="text-danger"></span></label>
                                <input type="text" id="holder_name" name="holder_name"
                                    value="{{ $user->user_kyc->account_holder_name }}"
                                    class="form-control bank_details" placeholder="Holder Name..." >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ifsc_code" class="form-label">IFSC Code <span
                                        class="text-danger"></span></label>
                                <input type="text" id="ifsc_code" name="ifsc_code"
                                    value="{{ $user->user_kyc->ifsc_code }}"class="form-control bank_details"
                                    placeholder="IFSC Code..." >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="account_number" class="form-label">Account Number <span
                                        class="text-danger"></span></label>
                                <input type="text" id="account_number" name="account_number"
                                    value="{{ $user->user_kyc->account_number }}"
                                    class="form-control bank_details" placeholder="Account Number...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="bank_name" class="form-label">Bank Name <span
                                        class="text-danger"></span></label>
                                <input type="text" id="bank_name" name="bank_name"
                                    value="{{ $user->user_kyc->bank_name }}"
                                    class="form-control bank_details" placeholder="Bank Name..." >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="branch_name" class="form-label">Bank Branch Name <span
                                        class="text-danger"></span></label>
                                <input type="text" id="branch_name" name="branch_name"
                                    value="{{ $user->user_kyc->branch_name }}"
                                    class="form-control bank_details" placeholder="Bank Branch Name..." reuired>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="upi_id" class="form-label">Nominee Name <span
                                        class="text-danger"></span></label>
                                <input type="text" id="nominee_name" name="nominee_name"
                                    class="form-control bank_details"
                                    value="{{ $user->user_kyc->nominee_name }}" placeholder="Nominee Name..."
                                    >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="upi_id" class="form-label">Nominee Relation <span
                                        class="text-danger"></span></label>
                                <input type="text" id="nominee_relation" name="nominee_relation"
                                    class="form-control bank_details"
                                    value="{{ $user->user_kyc->nominee_relation }}"
                                    placeholder="Nominee Relation..." >
                            </div>
                            <div class="col-md-6 mb-3">

                            </div>
                            <hr>
                            <div class="col-md-6 mb-3">
                                <label for="upi_id" class="form-label">UPI ID <span
                                        class="text-danger"></span></label>
                                <input type="text" id="upi_id" name="upi_id" class="form-control upi_details"
                                    value="{{ $user->user_kyc->upi_id }}" placeholder="UPI ID...">
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
            var referral_code = $('#referral_by').val();
            if (referral_code.length == 11) {
                $.ajax({
                    type: "GET",
                    async: false,
                    dataType: 'json',
                    url: "{{ route('checkreferral') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        referral_code: referral_code
                    },
                    success: function(response) {

                        if (response.name) {
                            $('#sponsor_name').val(response.name);
                        } else {
                            alert('Invalid Code');
                            $('#referral_by').val('');
                            $('#referral_by').val('');
                        }
                    }
                });
            }
        });
    $("#referral_by").keyup(function() {
        var referral_code = $('#referral_by').val();
        if (referral_code.length == 8) {
            $.ajax({
                type: "GET",
                async: false,
                dataType: 'json',
                url: "{{ route('checkreferral') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    referral_code: referral_code
                },
                success: function(response) {

                    if (response.name) {
                        $('#sponsor_name').val(response.name);
                    }else{
                        alert('Invalid Code');
                        $('#referral_by').val('');
                        $('#referral_by').val('');
                    }
                }
            });
        }
    });

</script>
@endsection


