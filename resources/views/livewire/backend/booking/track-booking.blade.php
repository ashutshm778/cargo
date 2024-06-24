<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Track AWB</h6>
                        </div>
                        <div class="ms-auto">
                            @if(!empty($delivery_run_sheet_detail->signature))
                            <a href="https://prashantcargo.com/public/.{{$delivery_run_sheet_detail->signature}}" target="_blank">Click Here  View</a>
                            <a href="https://prashantcargo.com/public/.{{$delivery_run_sheet_detail->signature}}" download>Click Here Download</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-3 mb-3">
                            <input type="search" wire:model="awb_no" wire:change="get_track_data()" class="form-control form-control-sm"
                                placeholder="Type AWB No" />
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table custom-brder align-middle mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Branch</th>
                                    <th>Action No</th>
                                    <th>Action</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($data->id))
                                @foreach (App\Models\BookingLog::where('booking_id',$data->id)->orderBy('id','desc')->get() as $log)
                                    <tr>
                                        <td>{{$log->created_at->format('d-m-Y H:i:s')}}</td>
                                        <td>{{strtoupper($log->status)}}</td>
                                        <td>{{$log->branch_data->name}}</td>
                                        <td>@if($log->status == 'order_created') {{$data->bill_no}} @else {{$log->action_no}}@endif</td>
                                        <td>{{$log->action}}</td>
                                        <td>{{$log->user_data->name}} ({{$log->user_data->code}})</td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
