<div>

    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Manifestation Create</h6>
                        </div>
                        <div class="ms-auto">
                            @if (!empty($message))
                                <h4 style="color:red;"> {{ $message }}</h4>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            From:
                            <select id='branch' wire:model="branch" class="form-control" @if(auth()->guard("admin")->user()->id != 1) disabled @else wire:change="genrate_mf_no()" @endif>
                                <option value=''>-- Select Branch--</option>
                                @foreach (App\Models\Branch::all() as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-2">
                            Date:
                            <input type="date" class="form-control" wire:model="date" placeholder="Select Date" />
                            <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                role="alert">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                        </div>
                        <div class="col-2">
                            To:
                            <select id='branch' wire:model="branch_to" class="form-control">
                                <option value=''>-- Select Branch--</option>
                                @foreach (App\Models\Branch::all() as $branch)
                                    @if ($branch->id != auth()->guard('admin')->user()->branch_id)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                role="alert">
                                <strong>{{ $errors->first('branch_to') }}</strong>
                            </span>

                        </div>
                        {{-- <div class="col-5">
                            <a href="#" class="btn btn-primary radius-30 mt-2 mt-lg-0" wire:click="fileExport()">Excel Export</a>
                        </div> --}}
                        <div class="col-3 mb-3">
                            MFNo:
                            <input type="text" id="mf_no" wire:model.live="mf_no" class="form-control "
                                readonly />
                        </div>

                        <div class="col-3 mb-3">
                            AWB No:
                            <input type="text" id="awb_no" wire:model.live="awb_no" wire:change="add_fields()"
                                class="form-control " autofocus />
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
                                    <th>Eway No</th>
                                    <th>Enter By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($awb_no_list as $key=> $awb_no)
                                    @php

                                        $bookingProductBarcode = App\Models\BookingProductBarcode::where(
                                            'barcode',
                                            $awb_no,
                                        )->first();

                                    @endphp
                                    @if (!empty($bookingProductBarcode->id))
                                        <tr>
                                            <td>{{ $date_array[$key] }}</td>
                                            <td>{{ $time_array[$key] }}</td>
                                            <td>{{ $bookingProductBarcode->barcode }}</td>
                                            <td>{{ $bookingProductBarcode->bookingProductData->bookingData->branch_from->name }}
                                            </td>
                                            <td>{{ $bookingProductBarcode->bookingProductData->bookingData->branch_to->name }}
                                            </td>
                                            <td>{{ $bookingProductBarcode->bookingProductData->bookingData->bill_no }}
                                            </td>
                                            <td>{{ $mf_no }}</td>
                                            <td>{{ $bookingProductBarcode->weight }}</td>
                                            <td></td>
                                            <td>{{auth()->guard("admin")->user()->code}}</td>
                                            <td>
                                                <span class="rmv-btn removeBtn" data-toggle=""
                                                    wire:click.prevent="remove('{{ $awb_no }}')"
                                                    style="padding: 5px;"><i class="bx bxs-trash"></i></span>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if (count($not_scan_barcode) > 0)
                        <br>
                        <p style="color:red;"> Left Barcode: </p>
                        <div class="table-responsive">
                            <table class="table custom-brder align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Entry Date</th>
                                        <th>Child Pc</th>
                                        <th>Origin Hub</th>
                                        <th>Destination</th>
                                        <th>AWB No / Tracking No</th>
                                        <th>MFNo</th>
                                        <th>Weight</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($not_scan_barcode as $awb_no_not)
                                        @php

                                            $bookingProductBarcodeNot = App\Models\BookingProductBarcode::where(
                                                'barcode',
                                                $awb_no_not,
                                            )->first();

                                        @endphp
                                        @if (!empty($bookingProductBarcodeNot->id))
                                            <tr>
                                                <td>{{ date('Y-m-d') }}</td>
                                                <td>{{ $bookingProductBarcodeNot->barcode }}</td>
                                                <td>{{ $bookingProductBarcodeNot->bookingProductData->bookingData->branch_from->name }}
                                                </td>
                                                <td>{{ $bookingProductBarcodeNot->bookingProductData->bookingData->branch_to->name }}
                                                </td>
                                                <td>{{ $bookingProductBarcodeNot->bookingProductData->bookingData->bill_no }}
                                                </td>
                                                <td>{{ $mf_no }}</td>
                                                <td>{{ $bookingProductBarcodeNot->weight }}</td>

                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    @if (count($this->awb_no_list) > 0)
                        <div class="toolbar no-print mb-3 mt-3">
                            <div class="mt-4">
                                <button type="button" class="btn btn-dark" wire:click="store()"><i
                                        class="fa fa-print"></i>
                                    Forward</button>
                                <div class="float-end">
                                    <button type="button" id="print_button" class="btn btn-dark"
                                        onClick="printDiv('printableArea');"><i class="fa fa-print"></i>
                                        Print</button>
                                </div>
                            </div>
                        </div>
                    @endif
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
