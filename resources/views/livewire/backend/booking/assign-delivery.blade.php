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
                                    <th>Bill No</th>
                                    <th>Consignor</th>
                                    <th>Consignee</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Assigned To</th>
                                    <th>Action</th>

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
                                        <td>{{ $booking->assign_staff->name }}</td>
                                        <td>
                                            <div class="d-flex order-actions">

                                                {{-- <a href="{{ route('booking.show', $booking->id) }}" class="me-2"
                                                    title="View" wire:navigate><i class="bx bxs-show"></i></a>

                                                <a href="{{ route('booking.payment_receipt', $booking->id) }}"
                                                    class="me-2" title="Payment Receipt" wire:navigate><i
                                                        class="bx bx-money"></i></a>
                                                <a href="{{ route('booking.track_order', $booking->id) }}"
                                                    class="me-2" title="Track Order" wire:navigate><i
                                                        class="bx bx-map"></i></a> --}}
                                                 <a href="#" wire:click="openConsginee('{{ $booking->id }}')"
                                                    class="me-2" title="Change Status"><i class="bx bx-pin"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $deliveries->links() }}
                </div>
            </div>
        </div>

        @include('livewire.backend.booking.delivery_status_modal')
        @include('livewire.backend.booking.delivery_boy_status_modal')

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
          <script>
            Livewire.on('showDeliveryStatus', () => {
                $('#delivery_status').modal('show');
            });

            Livewire.on('hideDeliveryStatus', () => {
                $('#delivery_status').modal('hide');
            });

            Livewire.on('showDeliveryBoy', () => {
                $('#assign_delivery_boy').modal('show');
            });

            Livewire.on('hideDeliveryBoy', () => {
                $('#assign_delivery_boy').modal('hide');
            });

            function status_remark() {
                var booking_status = $('#status').val();
                if (booking_status == 'ndr') {
                    $('#remark_ndr').show();
                    $('#remark_delivery').hide();
                }
                if (booking_status == 'delivered') {
                    $('#remark_ndr').hide();
                    $('#remark_delivery').show();
                }

            }
        </script>
    @endpush
</div>
