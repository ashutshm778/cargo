<div>
    <script src="https://unpkg.com/bootstrap@3.3.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Booking Log List</h6>
                        </div>
                        <div class="ms-auto">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            @if (auth()->guard('admin')->user()->id == 1)
                                <select id='branch' wire:model="branch" class="form-control">
                                    <option value=''>-- Select Branch--</option>
                                    @foreach (App\Models\Branch::all() as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" id="date_range" placeholder="Select Date" />
                        </div>
                        <div class="col-5">
                            <a href="#" class="btn btn-primary radius-30 mt-2 mt-lg-0" wire:click="fileExport()">Excel Export</a>
                        </div>
                        <div class="col-3 mb-3">
                            <input type="search" wire:model.live="search" class="form-control form-control-sm"
                                placeholder="Type To Search" />
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0" id="datatable">
                            <thead>
                                <tr>

                                    <th>Tracking Code</th>
                                    <th>Booking Bill No</th>
                                    <th>Branch</th>
                                    <th>Source</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Description</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($booking_logs as $key => $data)
                                    <tr>
                                        <td>
                                            {{ $data->tracking_code }}
                                        </td>
                                        <td>
                                            {{ $data->booking_data->bill_no }}
                                        </td>
                                        <td>
                                            {{ $data->branch_data->name }}
                                        </td>
                                        <td>
                                            {{ $data->source }}
                                        </td>
                                        <td>
                                            {{ $data->action }}
                                        </td>
                                        <td>
                                            {{ $data->status }}
                                        </td>
                                        <td>
                                            {{ $data->description }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $booking_logs->links() }}
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
