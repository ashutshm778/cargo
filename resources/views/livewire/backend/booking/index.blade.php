<div>
    <script src="https://unpkg.com/bootstrap@3.3.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Booking List</h6>
                        </div>
                        <div class="ms-auto">
                            @if (auth()->guard('admin')->user()->can('booking-create'))
                                <a href="{{ route('booking.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"
                                    ><i class="bx bxs-plus-square"></i>Add New
                                    Booking</a>
                            @endif
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
                        <table class="table custom-brder align-middle mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th>AWB No / Tracking No</th>
                                    <th>Consignor</th>
                                    <th>Consignee</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Date</th>
                                    @if (auth()->guard('admin')->user()->canany(['booking-edit', 'booking-view']))
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->bill_no }}</td>
                                        <td>{{ $booking->consignor }}</td>
                                        <td>{{ $booking->consignee }}</td>
                                        <td>{{ $booking->branch_from->name }}</td>
                                        <td>{{ $booking->branch_to->name }}</td>
                                        <td>{{ $booking->date }}</td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                @if (auth()->guard('admin')->user()->can('booking-edit'))
                                                    <a href="{{ route('booking.edit', $booking->id) }}" class="me-2"
                                                        title="Edit" wire:navigate><i class="bx bxs-edit"></i></a>
                                                    @endif @if (auth()->guard('admin')->user()->can('booking-view'))
                                                        <a href="{{ route('booking.show', $booking->id) }}"
                                                            class="me-2" title="View" wire:navigate><i
                                                                class="bx bxs-show"></i></a>
                                                    @endif
                                                    <a href="{{ route('booking.payment_receipt', $booking->id) }}"
                                                        class="me-2" title="Payment Receipt" wire:navigate><i
                                                            class="bx bx-money"></i></a>
                                                    <a href="{{ route('booking.track_order', $booking->id) }}"
                                                        class="me-2" title="Track Order" wire:navigate><i
                                                            class="bx bx-map"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>

        @push('scripts')
            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
            <script>
                $(document).ready(function() {

                    var start = moment().subtract(29, 'days');
                    var end = moment();

                    function cb(start, end) {
                        $('#date_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    }

                    $('#date_range').daterangepicker({
                        startDate: start,
                        endDate: end,
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                                'month').endOf('month')]
                        }
                    }, cb);

                    cb(start, end);

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
</div>
