@extends('backend.layouts.app')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Branch List</h6>
                        </div>
                        <div class="ms-auto">@if(auth()->guard("admin")->user()->can("branch-create"))<a href="{{ route('branch.create') }}"
                                class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New
                                Branch</a>@endif</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0"  id="datatable" >
                            <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Branch Code</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    @if(auth()->guard('admin')->user()->canany(['branch-edit','branch-view']))
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
                    'url': '{{ route('admin.get_branch') }}',
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
                        data: 'branch_code'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'email'
                    },
                    @if(auth()->guard('admin')->user()->canany(['branch-edit','branch-view']))   {
                        mRender: function(data, type, row) {
                            var id = row.id; // Assuming id is a property of the row object
                            var editUrl = "{{ route('branch.edit', ':id') }}".replace(':id', row.id);
                            return '<div class="d-flex order-actions">@if(auth()->guard("admin")->user()->can("branch-edit"))<a href="'+editUrl+'" class="me-2"><i class="bx bxs-edit"></i></a>@endif</div>'
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
