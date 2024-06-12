<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Shipment In Scan Show</h6>
                        </div>
                        <div class="ms-auto">

                        </div>
                    </div>
                </div>

                <div class="card-body" id="printableArea">
                    <div class="row">
                        <div class="col-2">
                            From:{{$shipment->forwardFrom->name}}
                        </div>

                        <div class="col-2">
                            To:{{$shipment->forwardTo->name}}
                        </div>
                        <div class="col-2">
                            Date:{{$shipment->date}}
                        </div>
                        <div class="col-2 ">
                            MFNo:{{$shipment->mf_no}}
                        </div>
                        <div class="col-2 ">
                            Total Weight:{{$shipment->weight}}
                        </div>
                        <div class="col-2 ">
                            Total PC's:{{count($shipment->shipmentList)}}
                        </div>
                    </div>
                    <div class="table-responsive" id="printableArea">
                        <table class="table custom-brder align-middle mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th>Entry Date</th>
                                    <th>Entry Time</th>
                                    <th>Child Pc</th>
                                    <th>Origin Hub</th>
                                    <th>Destination</th>
                                    <th>AWB No / Tracking No</th>
                                    <th>MFNo</th>
                                    <th>Weight</th>
                                    <th>Enter By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\ShipmentInScanDetail::where('shipment_in_scan_id',$shipment->id)->orderBy('awb_no','asc')->get() as $key=> $data)


                                        <tr>
                                            <td>{{ $data->entry_date }}</td>
                                            <td>{{ $data->entry_time }}</td>
                                            <td>{{ $data->packet }}</td>
                                            <td>{{ $data->branch_from->name }}</td>
                                            <td>{{ $data->branch_to->name }}</td>
                                            <td>{{ $data->awb_no }}</td>
                                            <td>{{ $data->mf_no }}</td>
                                            <td>{{ $data->weight }}</td>
                                            <td>{{ $data->enter_by }}</td>
                                        </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="toolbar no-print mb-3 mt-3">
                    <div class="mt-4">
                        <div class="float-end">
                            <button type="button" id="print_button" class="btn btn-dark"
                                onClick="printDiv('printableArea');"><i class="fa fa-print"></i>
                                Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
            <script>
                function printDiv(divId) {
                    var printContents = document.getElementById(divId).innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();

                    document.body.innerHTML = originalContents;
                }
            </script>
        @endpush
    </div>
</div>
