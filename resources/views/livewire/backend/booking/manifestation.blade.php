<div>
    <script src="https://unpkg.com/bootstrap@3.3.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Manifestation List</h6>
                        </div>
                        <div class="ms-auto">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                                From:
                                <select id='branch' wire:model="branch" class="form-control" disabled>
                                    <option value=''>-- Select Branch--</option>
                                    @foreach (App\Models\Branch::all() as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>

                        </div>
                        <div class="col-2">
                            Date:
                            <input type="text" class="form-control" id="date_range" placeholder="Select Date" />
                        </div>
                        <div class="col-2">
                            To:
                            <select id='branch' wire:model="branch_to" class="form-control">
                                <option value=''>-- Select Branch--</option>
                                @foreach (App\Models\Branch::all() as $branch)
                                @if($branch->id!=auth()->guard("admin")->user()->branch_id)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endif
                                @endforeach
                            </select>

                    </div>
                        {{-- <div class="col-5">
                            <a href="#" class="btn btn-primary radius-30 mt-2 mt-lg-0" wire:click="fileExport()">Excel Export</a>
                        </div> --}}
                        <div class="col-3 mb-3">
                            MFNo:
                            <input type="text" id="mf_no" wire:model.live="mf_no" class="form-control " />
                        </div>

                        <div class="col-3 mb-3">
                            AWB No:
                            <input type="text" id="awb_no" wire:model.live="awb_no"  wire:keyup="add_fields()" class="form-control " />
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th>Entry Date</th>
                                    <th>Entry Time</th>
                                    <th>Origin Hub</th>
                                    <th>Destination</th>
                                    <th>AWB No / Tracking No</th>
                                    <th>MFNo</th>
                                    <th>Weight</th>
                                    <th>Value</th>
                                    <th>Eway No</th>
                                    <th>Enter By</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        @push('scripts')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#date_range').daterangepicker({
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
                });

                $('#date_range').on('apply.daterangepicker', function(ev, picker) {
                    // Update Livewire properties when dates are selected
                    @this.set('startDate', picker.startDate.format('YYYY-MM-DD'));
                    @this.set('endDate', picker.endDate.format('YYYY-MM-DD'));
                });
            });

            $('#branch').on('change', function(e) {
                let elementName = $(this).attr('id');
                var data = $(this).val();
                @this.set(elementName, data);
            });
        </script>
    @endpush
    </div>
