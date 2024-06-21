<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Manifestation Show</h6>
                        </div>
                        <div class="ms-auto">

                        </div>
                    </div>
                </div>

                <div class="card-body" id="printableArea">
                    <div class="row">
                        <div class="col-12 "  >
                            MFNo:{{$manifest->mf_no}}
                            @php
                                $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
                                $barcode = $generator->getBarcode(
                                    $manifest->mf_no,
                                    $generator::TYPE_CODE_128,
                                );
                            @endphp
                            {!! $barcode !!}
                        </div>
                       <div class="clearfix">
                        <br>
                       </div>
                        <div class="col-2">
                            From:{{$manifest->forwardFrom->name}}
                        </div>

                        <div class="col-2">
                            To:{{$manifest->forwardTo->name}}
                        </div>
                        <div class="col-3">
                            Date:{{ \Carbon\Carbon::parse($manifest->date)->format('d-m-Y') }}
                        </div>

                        <div class="col-3 ">
                         Weight:{{$manifest->weight}}
                        </div>
                        <div class="col-2 ">
                            Total PC's:{{count($manifest->manifestList)}}
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
                                @foreach (App\Models\ManifestDetails::where('mainfest_id',$manifest->id)->orderBy('awb_no','asc')->get() as $key=> $data)


                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($data->entry_date)->format('d-m-Y') }}</td>
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

                <div class="col-12 " id="manifest_barcode" style="display:none;" >
                    MFNo:{{$manifest->mf_no}}
                    @php
                        $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
                        $barcode = $generator->getBarcode(
                            $manifest->mf_no,
                            $generator::TYPE_CODE_128,
                        );
                    @endphp
                    {!! $barcode !!}
                </div>


                <div class="toolbar no-print mb-3 mt-3">
                    <div class="mt-4">
                        <button type="button" id="print_button" class="btn btn-dark"
                                onClick="printDiv('manifest_barcode');"><i class="fa fa-print"></i>
                                Print Manifest Barcode</button>
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
