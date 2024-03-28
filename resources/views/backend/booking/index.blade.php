@extends('backend.layouts.app')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Booking List</h6>
                        </div>
                        <div class="ms-auto">@if(auth()->guard("admin")->user()->can("booking-create"))
                            <a href="{{ route('booking.create') }}"
                                class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New
                                Booking</a>
                                @endif
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
                            <td>
                                <div class="mb-3">
                                    <select id='branch_id' class="form-control">
                                        <option value=''>-- Select Branch--</option>
                                        @foreach(App\Models\Branch::all() as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>

                        </tr>
                    </table>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0"  id="datatable" >
                            <thead>
                                <tr>

                                    <th>Tracking Code</th>
                                    <th>Bill No</th>
                                    <th>Consignor</th>
                                    <th>Consignee</th>
                                    <th>From</th>
                                    <th>To</th>
                                    @if(auth()->guard('admin')->user()->canany(['booking-edit','booking-view']))
                                     <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row" method="post" action="{{ route('admin.booking_status_update') }}">
                        @csrf
                        <input type="hidden" name="from" value="booking" />
                        <input type="hidden" id="booking_id" name="id" />
                        <div class="col-md-12">
                            <label for="fullname" class="form-label">Status<span>*</span></label>
                            <select id='status' name="status" class="form-control" required onchange="status_remark()">
                                <option value=''>-- Select Status--</option>
                                <option value="ndr" >NDR</option>
                                <option value="delivered" >Delivered</option>
                            </select>
                        </div>
                        <div class="col-md-12" id="remark_ndr" style="display:none;">
                            <label for="mobile_no" class="form-label">Remark<span>*</span></label>
                            <select id='remark' name="remark" class="form-control">
                                <option value=''>-- Select Remark--</option>
                                <option value="TOPAY / COD / CLEARANCE / PENALTY AMOUNT NOT READY">TOPAY / COD / CLEARANCE / PENALTY AMOUNT NOT READY</option>
                                <option value="REFUSED TO PAY COD / TOPAY AMOUNT">REFUSED TO PAY COD / TOPAY AMOUNT</option>
                                <option value="RECEIVER RESCHEDULED DELIVERY DATE">RECEIVER RESCHEDULED DELIVERY DATE</option>
                                <option value="POLITICAL DISTURBANCE / BANDH /STRIKE (UNS)">POLITICAL DISTURBANCE / BANDH /STRIKE (UNS)</option>
                                <option value="PARTIAL DELIVERED">PARTIAL DELIVERED</option>
                                <option value="OUT OF DELIVERY AREA (ODA)">OUT OF DELIVERY AREA (ODA)</option>
                                <option value="OFFICE/INWARD CLOSED OR DOOR LOCKED / TIME OVER">OFFICE/INWARD CLOSED OR DOOR LOCKED / TIME OVER</option>
                                <option value="NO SERVICE">NO SERVICE</option>
                                <option value="NO ENTRY / RESTRICTED AREA MISROUTE">NO ENTRY / RESTRICTED AREA MISROUTE</option>
                                <option value="LATE ARRIVAL OF LOAD">LATE ARRIVAL OF LOAD</option>
                                <option value="INWARD CLOSED / BANK TIME OVER">INWARD CLOSED / BANK TIME OVER</option>
                                <option value="EWAY BILL DISPUTE / WITHOUT GST INVOICE DECLARATION">EWAY BILL DISPUTE / WITHOUT GST INVOICE DECLARATION</option>
                                <option value="DETAINED BY GOVERNMENT / SALES TAX/AIRPORT AUTHORITY">DETAINED BY GOVERNMENT / SALES TAX/AIRPORT AUTHORITY</option>
                                <option value="DELIVERY ISSUE DUE TO HEAVY RAIN / NATURAL CALAMITY">DELIVERY ISSUE DUE TO HEAVY RAIN / NATURAL CALAMITY</option>
                                <option value="CONTACT NAME/DEPT NOT MENTIONED / NO SUCH PERSON">CONTACT NAME/DEPT NOT MENTIONED / NO SUCH PERSON</option>
                                <option value="CONSIGNOR / AGENT REQUESTED TO HOLD">CONSIGNOR / AGENT REQUESTED TO HOLD</option>
                                <option value="CONSIGNMENT LOST">CONSIGNMENT LOST</option>
                                <option value="CONSIGNEE WILL COLLECT FROM OFFICE">CONSIGNEE WILL COLLECT FROM OFFICE</option>
                                <option value="CONSIGNEE OUT OF STATION OR NOT AVAILABLE">CONSIGNEE OUT OF STATION OR NOT AVAILABLE</option>
                                <option value="CONSIGNEE NOT RESPONDING TO PHONE COMPANY/PERSON SHIFTED">CONSIGNEE NOT RESPONDING TO PHONE COMPANY/PERSON SHIFTED</option>
                                <option value="ADDRESS NOT FOUND / IN-COMPLETE / REQUIRE PHONE NO">ADDRESS NOT FOUND / IN-COMPLETE / REQUIRE PHONE NO</option>
                            </select>
                            </span>
                        </div>
                        <div class="col-md-12" id="remark_delivery" style="display:none;">
                            <label for="mobile_no" class="form-label">Remark<span>*</span></label>
                            <select id='remark' name="remark" class="form-control">
                                <option value=''>-- Select Remark--</option>
                                <option value="SIGNATURE" >SIGNATURE</option>
                                <option value="SIGN WITH STAMP" >SIGN WITH STAMP</option>
                                <option value="DROP IN BOX" >DROP IN BOX</option>
                                <option value="DROP DELIVERY" >DOOR DELIVERY</option>
                                <option value="DOOR DELIVERY" >DOOR DELIVERY</option>
                                <option value="COMPANY STAMP" >COMPANY STAMP</option>
                            </select>
                            </span>
                        </div>
                        <div class="col-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
    <!--end page wrapper -->
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script>
        $('input[name="dates"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $(document).ready(function() {
            var dataTable = $('#datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'print','pdf', 'pageLength'
                ],
                'processing': true,
                'serverSide': true,
                'stateSave': true,
                'serverMethod': 'get',
                "sPaginationType": "full_numbers",
                "iDisplayLength": 10,
                "ordering": true,
                //'searching': false, // Remove default Search Control
                'ajax': {
                    'url': '{{ route('admin.get_booking') }}',
                    'data': function(data) {
                        // Read values
                        var gender = $('#searchByGender').val();
                        var name = $('#searchByName').val();

                        var daterange = $('#daterange').val();
                        var branch_id = $('#branch_id').val();

                        // Append to data
                        data.searchByGender = gender;
                        data.searchByName = name;
                        data.daterange = daterange;
                        data.branch_id = branch_id;
                    }
                },
                'columns': [
                    {
                        data: 'tracking_code'
                    },
                    {
                        data: 'bill_no'
                    },
                    {
                        data: 'consignor'
                    },
                    {
                        data: 'consignee'
                    },
                    {
                        data: 'from'
                    },
                    {
                        data: 'to'
                    },
                    @if(auth()->guard('admin')->user()->canany(['booking-edit','booking-view']))   {
                        mRender: function(data, type, row) {
                            var id = row.id; // Assuming id is a property of the row object
                            var editUrl = "{{ route('booking.edit', ':id') }}".replace(':id', row.id);
                            var viewUrl = "{{ route('booking.show', ':id') }}".replace(':id', id);
                            var payment_receiptUrl = "{{ route('admin.payment_receipt', ':id') }}".replace(':id', id);
                            var trackOrdertUrl = "{{ route('admin.track_order', ':id') }}".replace(':id', id);
                            return '<div class="d-flex order-actions">@if(auth()->guard("admin")->user()->can("booking-edit"))<a href="'+editUrl+'" class="me-2"><i class="bx bxs-edit"></i></a>@endif @if(auth()->guard("admin")->user()->can("booking-view"))<a href="'+viewUrl+'" class="me-2"><i class="bx bxs-show"></i></a>@endif<a href="'+payment_receiptUrl+'" class="me-2"><i class="bx bx-money"></i></a><a href="'+trackOrdertUrl+'" class="me-2"><i class="bx bx-map"></i></a><a href="#" onclick="open_status_model('+row.id+')" class="me-2"><i class="bx bx-view"></i></a> </div>'
                        }
                    }
                    @endif
                ]
            });

            $('#searchByName').keyup(function() {
                dataTable.draw();
            });

            $('#searchByGender').change(function() {
                dataTable.draw();
            });

            $('#branch_id').change(function() {
                dataTable.draw();
            });

            $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
                    'MM/DD/YYYY'));
                dataTable.draw();
            });

            $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                dataTable.draw();
            });
        });

        function open_status_model(id){
            $('#exampleModal2').modal('show');
            $('#booking_id').val(id);
        }

        function status_remark(){
            var booking_status=$('#status').val();
            if(booking_status == 'ndr'){
                $('#remark_ndr').show();
                $('#remark_delivery').hide();
            }
             if(booking_status == 'delivered'){
                $('#remark_ndr').hide();
                $('#remark_delivery').show();
            }

        }
    </script>
@endsection
