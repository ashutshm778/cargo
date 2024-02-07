@extends('backend.layouts.app')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Edit Customer</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <form class="row g-4" method="post" action="{{ route('customer.update') }}">
                            <input type="hidden" name="id" value="{{$user->id}}" />
                            @csrf
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
                                <label for="password" class="form-label">Password<span>*</span></label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password" >
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="profile_picture"
                                    placeholder="profile Picture" name="profile_picture">
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


