<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Staff List</h6>
                        </div>
                        <div class="ms-auto">@if(auth()->guard("admin")->user()->can("staff-create"))<a href="{{ route('admin.staff_create') }}"
                            class="btn btn-primary radius-30 mt-2 mt-lg-0" wire:navigate ><i class="bx bxs-plus-square"></i>Add New
                            Staff</a>@endif</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table custom-brder" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Code</th>
                                    <th>Roles</th>
                                    @if(auth()->guard('admin')->user()->canany(['staff-edit','staff-delete']))   <th width="280px">Action</th> @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $key => $data)
                                    <tr>
                                        <th scope="row">{{ $key + 1 + ($list->currentPage() - 1) * $list->perPage() }}</th>
                                        <td>{{  $data->name }}</td>
                                        <td>{{  $data->email }}</td>
                                        <td>{{  $data->code }}</td>
                                        <td>
                                            @if (!empty($data->getRoleNames()))
                                                @foreach ($data->getRoleNames() as $v)
                                                    <label class="badge bg-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        @if(auth()->guard('admin')->user()->canany(['staff-edit','staff-delete']))
                                        <td>
                                            <div class="d-flex order-actions">
                                                @if(auth()->guard("admin")->user()->can("staff-edit"))
                                                <a href="{{ route('admin.staff_edit',$data->id) }}" class="me-2" wire:navigate><i class="bx bxs-edit"></i></a>
                                                @endif
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
