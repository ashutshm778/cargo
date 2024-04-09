
    <div class="modal fade" id="conignee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Consignee Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="row" method="post" action="#">

                        <div class="row">
                            <div class="col-md-4">
                                <label for="fullname" class="form-label">Name<span>*</span></label>
                                <input type="text" class="form-control" id="fullname" wire:model="name"
                                    placeholder="Name" required>
                                    <span
                                    style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                    role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            </div>


                            <div class="col-md-4">
                                <label for="mobile_no" class="form-label">Phone<span>*</span></label>
                                <input type="text" class="form-control" id="phone" wire:model="phone"
                                    placeholder="Mobile No." required>
                                <span
                                    style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                    role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="gstin" class="form-label">GSTIN</label>
                                <input type="text" class="form-control" id="gstin" wire:model="gstin"
                                    placeholder="GSTIN">
                                <span
                                    style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                    role="alert">
                                    <strong>{{ $errors->first('gstin') }}</strong>
                                </span>
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <label for="pincode" class="form-label">Pincode</label>
                                <select class="form-control" id="pincode_select" wire:model="pincode"
                                    data-placeholder="Please Select Pincodes..." onchange="get_pincode()" required>
                                    <option value="">Select Pincode</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" wire:model="address"
                                    placeholder="Address" required>
                            </div>
                            <div class="col-12">
                                <div class="text-end">
                                    <button type="button" class="btn btn-primary" wire:click="consignee_store()">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

