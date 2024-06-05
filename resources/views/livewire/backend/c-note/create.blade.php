<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Add C-Note</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <form class="row">
                            <div class="col-md-4 mb-3">
                                <label for="from" class="form-label">From<span>*</span></label>
                                <input type="text" class="form-control" id="from" wire:model="from" placeholder="From" readonly>
                                    @error('from')
                                        <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="to" class="form-label">To<span>*</span></label>
                                <input type="text" class="form-control" id="to" wire:model="to" placeholder="To">
                                    @error('to')
                                        <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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
</div>
