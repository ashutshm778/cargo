<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Edit Branch</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <form class="row g-4">

                            <div class="col-md-4">
                                <label for="fullname" class="form-label">Name<span>*</span></label>
                                <input type="text" class="form-control" id="fullname" wire:model="name" placeholder="Name"
                                    >
                                    @error('name')
                                        <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="branch_code" class="form-label">Branch Code<span>*</span></label>
                                <input type="text" class="form-control" id="branch_code" wire:model="branch_code" placeholder="Branch Code"
                                    >
                                    @error('branch_code')
                                        <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email<span>*</span></label>
                                <input type="email" class="form-control" id="email" wire:model="email" placeholder="Email"
                                    >
                                    @error('email')
                                    <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="mobile_no" class="form-label">Phone<span>*</span></label>
                                <input type="text" class="form-control" id="phone" wire:model="phone"
                                    placeholder="Mobile No." >
                                    @error('phone')
                                    <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="gst" class="form-label">GSTIN</label>
                                <input type="text" class="form-control" id="gst" wire:model="gst" placeholder="GSTIN"
                                    >
                                    @error('gst')
                                    <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <label for="pincode" class="form-label">Pincode</label>
                                <select class="form-control" id="pincode_select" wire:model="pincode"
                                    data-placeholder="Please Select Pincodes..." onchange="get_pincode()" >
                                    <option value="">Select Pincode</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" placeholder="City" wire:model="city"
                                    readonly>
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" id="state" placeholder="State" wire:model="state"
                                    readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="address" class="form-label">Address<span>*</span></label>
                                <input type="text" class="form-control" id="address" wire:model="address" placeholder="Address"
                                    >
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <label for="pincode" class="form-label">Serving Pincode</label>
                                <select class="form-control" id="serving_pincode_select" wire:model="serving_pincode"
                                    data-placeholder="Please Select Pincodes..."  multiple >
                                    <option value="">Select Pincode</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="">
                                    <button type="button" wire:click="store()" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
