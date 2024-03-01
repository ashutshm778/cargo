@extends('backend.layouts.app')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Consigner List</h6>
                        </div>
                        <div class="ms-auto">@if(auth()->guard("admin")->user()->can("booking-create"))
                            <a href="{{ route('admin.consigner_create') }}"
                                class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New</a>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0"  id="datatable" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Pincode</th>
                                    <th>Full Address</th>
                                    <th>Action</th>
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
                    'url': '{{ route('admin.get_consigner') }}',
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
                        data: 'name'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'pincode'
                    },
                    {
                        data: 'full_address'
                    },
                    {
                        mRender: function(data, type, row) {
                            var id = row.id; // Assuming id is a property of the row object
                            var editUrl = "{{ route('admin.consigner_edit', ':id') }}".replace(':id', row.id);
                            return '<div class="d-flex order-actions">@if(auth()->guard("admin")->user()->can("branch-edit"))<a href="'+editUrl+'" class="me-2"><i class="bx bxs-edit"></i></a>@endif</div>'
                        }
                    },

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
