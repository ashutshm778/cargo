<div>
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
                                    wire:navigate><i class="bx bxs-plus-square"></i>Add New
                                    Booking</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">

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
                                @foreach ($bookings as $booking)
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
                                                        title="Edit" wire:navigate ><i class="bx bxs-edit"></i></a>
                                                    @endif @if (auth()->guard('admin')->user()->can('booking-view'))
                                                        <a href="{{route('booking.show',$booking->id)}}" class="me-2" title="View" wire:navigate ><i
                                                                class="bx bxs-show"></i></a>
                                                    @endif
                                                    <a href="{{route('booking.payment_receipt',$booking->id)}}" class="me-2" title="Payment Receipt" wire:navigate ><i
                                                            class="bx bx-money"></i></a>
                                                    <a href="{{route('booking.track_order',$booking->id)}}" class="me-2" title="Track Order" wire:navigate ><i
                                                            class="bx bx-map"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$bookings->links()}}
                </div>
            </div>
        </div>
    </div>
