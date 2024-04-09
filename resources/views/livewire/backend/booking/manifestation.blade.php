<div>
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
                    <table>
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="dates" id="daterange"
                                        value="" placeholder="Select Date" />
                                </div>
                            </td>
                            @if (auth()->guard('admin')->user()->id == 1)
                                <td>
                                    <div class="mb-3">
                                        <select id='branch_id' class="form-control">
                                            <option value=''>-- Select Branch--</option>
                                            @foreach (App\Models\Branch::all() as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    </table>
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
                                    <th>Status</th>
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
                                       {{$booking->status}}
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
