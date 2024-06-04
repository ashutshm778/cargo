<div>
    <div class="page-wrapper">
        <div class="page-content" id='printable_div_id'>
            <!--end breadcrumb-->
            <form method="POST" action="#">
                <div class="card">
                    <div class="card-body">
                        <div class="table table-bordered">
                            <div id="invoice">
                                <div class="invoice">
                                    <header>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <h2 class="fw-bold">PRASHANT CARGO & LOGISTICS</h2>
                                                <h6 class="fw-bold">S-21/123-1, SUBHASH NAGAR MALDAHIYA CANTT,
                                                    VARANASI-221005</h6>
                                                <p>Phone :8887790443</p>
                                                <hr>
                                            </div>

                                        </div>
                                    </header>

                                    @csrf
                                    <main>
                                        <table class="table table-sm">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        <label for="bill_no"> AWB No / Tracking No- </label>
                                                        <input type="text" class="form-control col-5 mb-3" id="bill_no"
                                                            wire:model="bill_no" placeholder="AWB No/Tracking No"
                                                            value="{{ old('bill_no') }}" required>
                                                        <span
                                                            style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                                            role="alert">
                                                            <strong>{{ $errors->first('bill_no') }}</strong>
                                                        </span>
                                                        @if (auth()->guard('admin')->user()->id == 1)
                                                            <div class="mb-3">
                                                                <label for="branch_id"> Branch- </label>
                                                                <select id='branch_id' wire:model="branch_id" class="form-control"
                                                                    required>
                                                                    <option value=''>-- Select Branch--</option>
                                                                    @foreach (App\Models\Branch::all() as $branch)
                                                                        <option value="{{ $branch->id }}">
                                                                            {{ $branch->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        @else
                                                        <div class="mb-3">
                                                            <label for="branch_id"> Branch-</label>
                                                            <select id='branch_id' wire:model="branch_id" class="form-control"
                                                                required>
                                                                <option value=''>-- Select Branch--</option>
                                                                <option value="{{ auth()->guard('admin')->user()->branch_id }}" >
                                                                {{ auth()->guard('admin')->user()->branch_data->name }}</option>
                                                                </select>
                                                        </div>
                                                        @endif
                                                    </td>
                                                    <td colspan="2">
                                                        <div>
                                                            <label for="date">Date-</label>
                                                            <input type="date" class="form-control col-5  mb-3" id="date"
                                                                wire:model="date" placeholder="Date" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="delivery_address"> Delivery Address -</label>
                                                            <input type="text" class="form-control" id="delivery_address"
                                                                wire:model="delivery_address" placeholder="Delivery Address"
                                                                required>
                                                        </div>
                                                    </td>
                                </div>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label for="branch_select_from">From- </label>
                                        @if (auth()->guard('admin')->user()->id == 1)
                                            <select class="form-control" id="branch_select_from" wire:model="from"
                                                required>
                                                <option value=''>-- Select Branch--</option>
                                                @foreach (App\Models\Branch::all() as $branch)
                                                    <option value="{{ $branch->id }}">
                                                        {{ $branch->name }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select class="form-control" wire:model="from" required>
                                                <option value=''>-- Select Branch--</option>
                                                <option value="{{ auth()->guard('admin')->user()->branch_id }}" selected>
                                                    {{ auth()->guard('admin')->user()->branch_data->name }}</option>
                                            </select>
                                        @endif
                                        <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"="alert">
                                            <strong>{{ $errors->first('from') }}</strong>
                                        </span>
                                    </td>
                                    <td colspan="2">
                                        <label for="branch_select_to">To-</label>
                                        <select class="form-control" id="branch_select_to" wire:model="to"
                                             required>
                                            <option value=''>-- Select Branch--</option>
                                            @foreach (App\Models\Branch::all() as $branch)
                                                <option value="{{ $branch->id }}">
                                                    {{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                        <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"="alert">
                                            <strong>{{ $errors->first('to') }}</strong>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="consignor">Consignor- <a class="" data-toggle="modal"
                                            data-target="#exampleModal2" style="font-size: 20px;"><i
                                                class="bx bxs-plus-square" wire:click="openConsginer()"></i></a></label>
                                        <input type="text" class="form-control" id="consignor" wire:model="consignor"
                                            placeholder="Consignor" value="{{ old('consignor') }}" wire:change="get_consigner_details()" required>
                                            <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"="alert">
                                                <strong>{{ $errors->first('consignor') }}</strong>
                                            </span>
                                        <input type="hidden" id="consignor_id" wire:model="consignor_id"
                                            value="{{ old('consignor_id') }}" />
                                    </td>
                                    <td>
                                        <label for="consignee">Consignor Phone- </label>
                                        <input type="text" class="form-control" id="consignor_phone"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                            onKeyPress="if(this.value.length==10) return false;" maxlength="10"
                                            placeholder="Consignor Phone" wire:model="consignor_phone"  required
                                            value="{{ old('consignor_phone') }}">
                                            <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"="alert">
                                                <strong>{{ $errors->first('consignor_phone') }}</strong>
                                            </span>
                                    </td>
                                    <td>
                                        <label for="consignor">Consignee-<a class="" data-toggle="modal"
                                            data-target="#exampleModal" style="font-size: 20px;"><i
                                                class="bx bxs-plus-square" wire:click="openConsginee()" ></i></a></label>
                                        <input type="text" class="form-control" id="consignee" wire:model="consignee"
                                            placeholder="Consignee" value="{{ old('consignee') }}" wire:change="get_consignee_details()"  required>
                                            <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"="alert">
                                                <strong>{{ $errors->first('consignee') }}</strong>
                                            </span>
                                        <input type="hidden" id="consignee_id" wire:model="consignee_id"
                                            value="{{ old('consignee_id') }}" />
                                    </td>

                                    <td>
                                        <label for="consignee">Consignee Phone- </label>
                                        <input type="text" class="form-control" id="consignee_phone"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                            onKeyPress="if(this.value.length==10) return false;" maxlength="10"
                                            placeholder="Consignee Phone" wire:model="consignee_phone" required
                                            value="{{ old('consignee_phone') }}">
                                            <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"="alert">
                                                <strong>{{ $errors->first('consignee_phone') }}</strong>
                                            </span>
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label for="consignor_gstin">GSTIN-</label>
                                        <input type="text" class="form-control" id="consignor_gstin"
                                            placeholder="Consignor GSTIN" wire:model="consignor_gstin"
                                            value="{{ old('consignor_gstin') }}">
                                    </td>
                                    <td colspan="2">
                                        <label for="consignee_gstin">GSTIN-</label> <input type="text"
                                            class="form-control" id="consignee_gstin" placeholder="Consignee GSTIN"
                                            wire:model="consignee_gstin" value="{{ old('consignee_gstin') }}">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <label for="booking_no">Bill No.-</label><input type="text"
                                            class="form-control" id="booking_no" wire:model="booking_no"
                                            placeholder="Booking No" value="{{ old('booking_no') }}" required>
                                        <span
                                            style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                            role="alert">
                                            <strong>{{ $errors->first('booking_no') }}</strong>
                                        </span>
                                    </td>
                                    <td colspan="2">
                                        <label for="value">Value-</label>
                                        <input type="text" class="form-control" id="value" wire:model="value"
                                            placeholder="Value" value="{{ old('value') }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label for="eway_bill_no">Eway Bill No.-</label><input type="text"
                                            class="form-control" id="eway_bill_no" wire:model="eway_bill_no"
                                            placeholder="Booking No" value="{{ old('eway_bill_no') }}" required>
                                        <span
                                            style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                            role="alert">
                                            <strong>{{ $errors->first('eway_bill_no') }}</strong>
                                        </span>
                                    </td>
                                </tr>
                                </tbody>
                                </table>
                                <table class="table table-borderd">
                                    <thead>
                                        <tr>
                                            <th>
                                                <a class="ad-btn add_button"  wire:click.prevent="add({{ $i }})"><i
                                                class="bx bxs-plus-square"></i></a>
                                            </th>
                                            <th style="width:10%;">No. of Packet</th>
                                            <th>Nature of Goods Said to contain</th>
                                            <th style="width: 15%">Unit</th>
                                            <th style="width: 15%">Qty</th>
                                            <th>Wgt (in kg)</th>
                                            <th>Particulars</th>
                                            <th style="width: 15%;">Amount</th>

                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        @foreach ($inputs as $key => $value)
                                        <tr>
                                            <td>
                                                @if($key!=0)
                                                <span class="rmv-btn removeBtn" data-toggle=""
                                                wire:click.prevent="remove({{ $key }},{{ $value }})"><i
                                                class="bx bxs-minus-square"></i></span>
                                                @endif
                                            </td>
                                            <td class="text-left"><input type="text" class="form-control"
                                                    id="no_of_pack" wire:model="no_of_pack.{{ $key }}"
                                                    required></td>
                                            <td> <input type="text" class="form-control" id="product"
                                                    wire:model="product.{{ $key }}" required>
                                            </td>
                                            <td>
                                                <select class="form-control" wire:model="unit.{{ $key }}" required>
                                                    <option value="">Select Unit</option>
                                                    @foreach (App\Models\Unit::all() as $unit)
                                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td><input type="text" class="form-control" id="qty" wire:model="qty.{{ $key }}"
                                                     required></td>
                                            <td><input type="text" class="form-control" id="weight"
                                                    wire:model="weight.{{ $key }}" required></td>
                                            <td>Frieght Charges</td>
                                            <td><input type="number" class="form-control frieght_amount"
                                                    wire:model="frieght_charge.{{ $key }}"
                                                    wire:change="cal_total_amount()" value="0" required></td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">Seal /Received above mentioned production in good
                                                condition and correct measure.<br>
                                                I/We declare that GST shall be payable by consignor/consignee</td>
                                            <td colspan="1">Insurance</td>
                                            <td><input type="number" class="form-control" id="insurance"
                                                    wire:model="insurance" value="0"
                                                    wire:change="cal_total_amount()" required></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">I/We have not to claim or avail examption for value
                                                of goods & material.</td>
                                            <td colspan="1">B. Charges</td>
                                            <td><input type="number" class="form-control" id="b_charges"
                                                    wire:model="b_charges" value="0"
                                                    wire:change="cal_total_amount()" required></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan="1">Other Charges</td>
                                            <td><input type="number" class="form-control" id="other_charges"
                                                    wire:model="other_charges" value="0"
                                                    wire:change="cal_total_amount()" required></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan="1">G.S.T</td>
                                            <td><input type="number" class="form-control" id="gst" wire:model="tax"
                                                   value="0"  wire:change="cal_total_amount()"
                                                    required></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan="1">Total</td>
                                            <td><input type="number" class="form-control" id="total_amount"
                                                    wire:model="total" value="0" readonly
                                                    required></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan="1">Status</td>
                                            <td> <select class="form-control" wire:model="status" required>
                                                    <option value="">Select Status</option>
                                                    <option value="paid">Paid</option>
                                                    <option value="unpaid">To Pay</option>
                                                </select>
                                                <span
                                                style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                                role="alert">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                        </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <table style="border:0; margin-bottom:0;">
                                    <tbody>
                                        <tr>
                                            <td style="border: 0;">Consignee's Signature with Ruber Stamp</td>
                                            <td style="border: 0;text-align: right;"><b
                                                    style="text-align:left;">{{ Auth::guard('admin')->user()->name }}</b>
                                                <br> For Prashant Cargo &
                                                Logistics
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </main>
                                <div class="col-12">
                                    <div class="">
                                        <button type="button" class="btn btn-primary" wire:click="store()">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('livewire.backend.booking.consignee_modal')

    @include('livewire.backend.booking.consignor_modal')

    @push('scripts')
    <script>
        Livewire.on('showConignee', () => {
            $('#conignee').modal('show');
        });

        Livewire.on('hideConignee', () => {
            $('#conignee').modal('hide');
        });

        Livewire.on('showConsigner', () => {
            $('#consigner').modal('show');
        });

        Livewire.on('hideConsigner', () => {
            $('#consigner').modal('hide');
        });
    </script>

   @endpush
</div>
