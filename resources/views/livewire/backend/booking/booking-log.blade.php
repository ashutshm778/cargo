<div>
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
                                    <th>Booking Id</th>
                                    <th>Branch</th>
                                    <th>Source</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Description</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach($booking_logs as $key => $data)
                                <tr>
                                    <td>
                                        {{$data->tracking_code}}
                                    </td>
                                    <td>
                                        {{$data->booking_id}}
                                    </td>
                                    <td>
                                        {{$data->branch_data->name}}
                                    </td>
                                    <td>
                                        {{$data->source}}
                                    </td>
                                    <td>
                                        {{$data->action}}
                                    </td>
                                    <td>
                                        {{$data->status}}
                                    </td>
                                    <td>
                                        {{$data->description}}
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
</div>
