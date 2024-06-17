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
                        <div class="col-3">
                            Delivery Type:
                                <select id='delivery_boy_id' wire:model.live="delivery_type" class="form-control">
                                    <option value=''>-- Select Delivey Type--</option>
                                    <option value="self">OFD Self</option>
                                    <option value="frenchies">OFD Frenchies</option>
                                </select>
                                <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                role="alert">
                                <strong>{{ $errors->first('delivery_type') }}</strong>
                            </span>

                        </div>
                        <div class="col-3">
                            User Code:
                            <input type="text" class="form-control" wire:model="code"  placeholder="User Code" />
                            <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                            role="alert">
                            <strong>{{ $errors->first('code') }}</strong>
                        </span>
                        </div>
                        <div class="col-3">
                            Route:
                            <input type="text" class="form-control" wire:model="route"  placeholder="Route" />
                            <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                            role="alert">
                            <strong>{{ $errors->first('route') }}</strong>
                        </span>
                        </div>

                        <div class="col-3">
                            AWB No:
                            <input type="text" id="awb_no" wire:model.live="awb_no" wire:change="add_fields()"
                                class="form-control " placeholder="AWB No" autofocus />
                        </div>
                    </div>
                    <div class="table-responsive">
                        <br>
                        <table class="table custom-brder align-middle mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th>AWB No / Tracking No</th>
                                    <th>Weight</th>
                                    <th>PC's</th>
                                    <th>Consignee Details</th>
                                    <th>Payment Status/Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($awb_no_list as $key=> $awb_no)
                                 @php $booking=App\Models\Booking::where('bill_no',$awb_no)->first(); @endphp
                                 <tr>
                                    <td>{{$awb_no}}</td>
                                    <td>{{$booking->booking_product->weight}}</td>
                                    <td>{{$booking->booking_product->no_of_pack}}</td>
                                    <td>{{$booking->consignee}}</td>
                                    <td>
                                        @if($booking->payment_status=='paid'){{'PAID'}}@else{{'TO PAY / '}} {{$booking->total}}@endif
                                    </td>

                                 </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if (count($this->awb_no_list) > 0)
                    <div class="toolbar no-print mb-3 mt-3">
                        <div class="mt-4">
                            <button type="button" class="btn btn-dark" wire:click="store()"><i
                                    class="fa fa-print"></i>
                                Save</button>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>

    </div>
    @push('scripts')

    @endpush
</div>
