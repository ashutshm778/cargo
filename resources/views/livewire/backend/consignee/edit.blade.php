<div>
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
                                <h6 class="mb-0">Edit Consignee</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <form class="row" method="post" action="#">

                                <div class="col-md-4 mb-3">
                                    <label for="fullname" class="form-label">Name<span>*</span></label>
                                    <input type="text" class="form-control" id="fullname" wire:model="name" placeholder="Name"
                                        required>
                                        <strong>{{ $errors->first('name') }}</strong>
                                </div>


                                <div class="col-md-4 mb-3">
                                    <label for="mobile_no" class="form-label">Phone<span>*</span></label>
                                    <input type="text" class="form-control" id="phone" wire:model="phone"
                                        placeholder="Mobile No." required>
                                    <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                        role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="gstin" class="form-label">GSTIN</label>
                                    <input type="text" class="form-control" id="gstin" wire:model="gstin" placeholder="GSTIN"
                                        >
                                    <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                        role="alert">
                                        <strong>{{ $errors->first('gstin') }}</strong>
                                    </span>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="pincode" class="form-label">Pincode</label>
                                    <select class="form-control" id="pincode_select" wire:model="pincode" required>
                                        <option value="">Select Pincode</option>
                                        @foreach(App\Models\Pincode::all() as $pincode)
                                        <option value="{{$pincode->pincode}}">{{$pincode->pincode}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="address" class="form-label">Address<span>*</span></label>
                                    <input type="text" class="form-control" id="address" wire:model="address" placeholder="Address"
                                        required>
                                </div>
                                <div class="col-12">
                                    <div class="">
                                        <button type="button" wire:click="update()" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
