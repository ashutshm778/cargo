<div>
    <div class="page-wrapper">
        <div class="page-content row">
            @if (auth()->guard('admin')->user()->can('pincode-create'))
                <div class="col-4">
                    <div class="card radius-10">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">{{ !empty($hidden_id) ? 'Edit' : 'Add' }} Pincode</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                                @if (!empty($this->hidden_id))
                                    <input type="hidden" name="id" value="{{ $hidden_id }}" />
                                @endif
                                <div class="col-md-12 mb-3">
                                    <label for="bsValidation1" class="form-label">Pincode<span>*</span></label>
                                    <input type="text" class="form-control" wire:model="pincode" id="pincode"
                                        placeholder="Pincode"
                                        >
                                        @error('pincode')
                                        <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="bsValidation1" class="form-label">City<span>*</span></label>
                                    <input type="text" class="form-control" wire:model="city" id="city"
                                        placeholder="City"
                                         >
                                        @error('city')
                                        <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="bsValidation1" class="form-label">State<span>*</span></label>
                                    <input type="text" class="form-control" wire:model="state" id="state"
                                        placeholder="State">
                                        @error('state')
                                        <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        @if(empty($hidden_id))
                                         <button type="buton" class="btn btn-primary px-4" wire:click="store()">Submit</button>
                                        @else
                                         <button type="buton" class="btn btn-primary px-4" wire:click="update()">Update</button>
                                        @endif
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            @endif
            <div class="col-8">
                <div class="card radius-10">
                    <div class="card-header">

                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Pincode List</h6>
                                </div>



                            </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table custom-brder" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Pincode</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Status</th>
                                        @if (auth()->guard('admin')->user()->canany(['pincode-edit', 'product-delete']))
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pincodes as $pincode)
                                        <tr>
                                            <td>{{ $pincode->pincode }}</td>
                                            <td>{{ $pincode->city }}</td>
                                            <td>{{ $pincode->state }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" onchange="update_status(this)"
                                                        value="{{ $pincode->id }}" type="checkbox"
                                                        id="flexSwitchCheckChecked"
                                                        @if ($pincode->status == 'active') {{ 'checked' }} @endif>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                                </div>
                                            </td>
                                            @if (auth()->guard('admin')->user()->canany(['pincode-edit', 'product-delete']))
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        @if (auth()->guard('admin')->user()->can('pincode-edit'))
                                                            <a href="#" wire:click="edit({{$pincode->id}})"
                                                                class=""><i class="bx bxs-edit"></i></a>
                                                        @endif
                                                        @if (auth()->guard('admin')->user()->can('pincode-delete'))
                                                            <a href="# "wire:click="delete({{$pincode->id}})"
                                                                class="ms-3"><i class="bx bxs-trash"></i></a>
                                                        @endif
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                            </table>
                            {{ $pincodes->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
