<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Branch List</h6>
                        </div>
                        <div class="ms-auto">
                            @if (auth()->guard('admin')->user()->can('branch-create'))
                                <a href="{{ route('branch.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0" wire:navigate ><i
                                        class="bx bxs-plus-square"></i>Add New
                                    Branch</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-7"></div>
                        <div class="col-3 mb-3">
                              <input type="search" wire:model.live="search" class="form-control form-control-sm" placeholder="Type To Search"  />
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Branch Code</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    @if (auth()->guard('admin')->user()->canany(['branch-edit', 'branch-view']))
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branch)
                                    <tr>
                                        <td>{{ $branch->name }}</td>
                                        <td>{{ $branch->branch_code }}</td>
                                        <td>{{ $branch->email }}</td>
                                        <td>{{ $branch->phone }}</td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                @if (auth()->guard('admin')->user()->can('branch-edit'))
                                                    <a href="{{route('branch.edit',$branch->id)}}" class="me-2"><i class="bx bxs-edit"></i></a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$branches->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
