@extends('backend.layouts.app')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Customer List</h6>
                        </div>
                        <div class="ms-auto">@if(auth()->guard("admin")->user()->can("customer-create"))<a href="{{ route('customer_create') }}"
                                class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New
                                Customer</a>@endif</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0"  id="datatable" >
                            <thead>
                                <tr>
                                    <th>Join Date</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Prime</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Refferal Code</th>
                                    <th>GP</th>
                                    <th>PP</th>
                                    <th>Wallet</th>
                                    <th>Status</th>
                                    @if(auth()->guard('admin')->user()->canany(['customer-edit','customer-view']))  <th>Action</th> @endif
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection
@section('script')
    <script>
        function update_status(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('customer.update_status') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function(data) {
                if (data == 1) {

                } else {

                }
            });
        }


        $(document).ready(function() {
            var dataTable = $('#datatable').DataTable({
                'processing': true,
                'serverSide': true,
                'stateSave': true,
                'serverMethod': 'get',
                "sPaginationType": "full_numbers",
                "iDisplayLength": 10,
                "ordering": true,
                //'searching': false, // Remove default Search Control
                'ajax': {
                    'url': '{{ route('get_customer') }}',
                    'data': function(data) {
                        // Read values
                        var gender = $('#searchByGender').val();
                        var name = $('#searchByName').val();

                        // Append to data
                        data.searchByGender = gender;
                        data.searchByName = name;
                    }
                },
                'columns': [
                    {
                        data: 'created_at',
                        render: function(data, type, row) {
                            const d = Date.parse(data);
                            var nd = new Date(d);
                            const year = nd.getFullYear();
                            const month = (nd.getMonth() + 1).toString().padStart(2, '0'); // Adding 1 to the month and padding with zeros if needed
                            const day = nd.getDate().toString().padStart(2, '0'); // Padding with zeros if needed
                            return year + '-' + month + '-' + day;
                        }
                    },
                    {
                        data: 'name'
                    },
                    {
                        mRender: function(data, type, row) {
                            if(row.designation){
                                return row.designation.toUpperCase().replace('_',' ');
                            }
                            return '';
                        }
                    },
                    {
                        mRender: function(data, type, row) {
                            var p=row.prime;
                            var pr='';
                            if(p==1){
                                pr='Prime';
                            }
                            return pr;
                        }
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'referral_code'
                    },
                    {
                        mRender: function(data, type, row) {
                            return Math.round(row.gb);
                        }
                    },
                    {
                        mRender: function(data, type, row) {
                            return Math.round(row.pp);
                        }
                    },
                    {
                        data: 'balance'
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            if (data == 1) {
                                return  '<p style="color:green;">Paid</p>';
                            }
                            if (data == 0) {
                                return  '<p style="color:red;">UnPaid</p>';
                            }
                        }
                    },
                    @if(auth()->guard('admin')->user()->canany(['customer-edit','customer-view']))   {
                        mRender: function(data, type, row) {
                            return '<div class="d-flex order-actions">@if(auth()->guard("admin")->user()->can("customer-edit"))<a href="{{ route('customer_edit', '') }}/' +
                                row.id + '" class="me-2"><i class="bx bxs-edit"></i></a>@endif @if(auth()->guard("admin")->user()->can("customer-view"))<a href="{{ route('customer_view', '') }}/' +
                                row.id + '" class=""><i class="bx bxs-show"></i></a>@endif</div>'
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
        });
    </script>
@endsection
