<div>
    <script src="https://unpkg.com/bootstrap@3.3.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Booking Delivery List</h6>
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
                        <div class="col-6">

                        </div>
                        <div class="col-2 mb-3">
                            <input type="search" wire:model.live="search" class="form-control form-control-sm"
                                placeholder="Type To Search" />
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0" id="datatable">
                            <thead>
                                <tr>

                                    <th>Tracking Code</th>
                                    <th>Bill No</th>
                                    <th>Consignor</th>
                                    <th>Consignee</th>
                                    <th>From</th>
                                    <th>To</th>
                                    @if (auth()->guard('admin')->user()->canany(['booking-edit', 'booking-view']))
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deliveries as $booking)
                                    <tr>
                                        <td>{{ $booking->tracking_code }}</td>
                                        <td>{{ $booking->bill_no }}</td>
                                        <td>{{ $booking->consignor }}</td>
                                        <td>{{ $booking->consignee }}</td>
                                        <td>{{ $booking->branch_from->name }}</td>
                                        <td>{{ $booking->branch_to->name }}</td>
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
                                                    <a href="#" onclick="open_status_model('{{$booking->id}}')"
                                                        class="me-2" title="Change Status"><i
                                                            class="bx bx-pin"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
