<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Add Frenchies</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <form class="row">

                            <div class="col-md-4 mb-3">
                                <label for="fullname" class="form-label">Name<span>*</span></label>
                                <input type="text" class="form-control" id="fullname" wire:model="name" placeholder="Name"
                                    >
                                    @error('name')
                                        <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="frenchie_code" class="form-label">Frenchies Code<span>*</span></label>
                                <input type="text" class="form-control" id="frenchie_code" wire:model="frenchie_code" placeholder="Frenchies Code"
                                    >
                                    @error('frenchie_code')
                                        <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="col-md-4 mb-3 mb-3 ">
                                <label for="branch_id" class="form-label">Branch</label>
                                <select class="form-control" id="branch_id" wire:model="branch_id" >
                               <option value=''>Select Branch</option>
                               @foreach (App\Models\Branch::all() as $branch)
                                   <option value="{{ $branch->id }}">
                                       {{ $branch->name }}</option>
                               @endforeach
                               </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label">Email<span>*</span></label>
                                <input type="email" class="form-control" id="email" wire:model="email" placeholder="Email"
                                    >
                                    @error('email')
                                    <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="mobile_no" class="form-label">Phone<span>*</span></label>
                                <input type="text" class="form-control" id="phone" wire:model="phone"
                                    placeholder="Mobile No." >
                                    @error('phone')
                                    <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="gst" class="form-label">GSTIN</label>
                                <input type="text" class="form-control" id="gst" wire:model="gst" placeholder="GSTIN"
                                    >
                                    @error('gst')
                                    <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col-md-4 mb-3 mb-3 ">
                                <label for="pincode" class="form-label">Pincode</label>
                                <select class="form-control" id="pincode" wire:model="pincode" wire:change="getPincodeData()">
                               <option value=''>Select Pincode</option>
                               @foreach (App\Models\Pincode::all() as $pincode)
                                   <option value="{{ $pincode->pincode }}">
                                       {{ $pincode->pincode }}</option>
                               @endforeach
                               </select>
                            </div>
                            <div class="col-md-4 mb-3 mb-3 ">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" placeholder="City" wire:model="city"
                                    readonly>
                            </div>
                            <div class="col-md-4 mb-3 mb-3 ">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" id="state" placeholder="State" wire:model="state"
                                    readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="address" class="form-label">Address<span>*</span></label>
                                <input type="text" class="form-control" id="address" wire:model="address" placeholder="Address"
                                    >
                            </div>
                            <div class="col-md-4 mb-3 mb-3 ">
                                <label for="pincode" class="form-label">Serving Pincode</label>
                                <select class="form-control " id="serving_pincode" wire:model="serving_pincode" multiple>
                                    <option value=''>Select Pincode</option>
                                    @foreach (App\Models\Pincode::all() as $pincode)
                                        <option value="{{ $pincode->pincode }}">
                                            {{ $pincode->pincode }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="">
                                    <button type="button" wire:click="store()" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $('#serving_pincode').on('change', function(e) {
                let elementName = $(this).attr('id');
                var data = $(this).val();
                @this.set(elementName, data);
            });
    </script>
   @endpush
</div>
