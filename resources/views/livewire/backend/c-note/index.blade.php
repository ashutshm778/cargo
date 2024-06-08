<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">C-Note List</h6>
                        </div>
                        <div class="ms-auto">
                            @if (auth()->guard('admin')->user()->can('branch-create'))
                                <a href="{{ route('admin.c_note_create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0" wire:navigate ><i
                                        class="bx bxs-plus-square"></i>Add New
                                    C-Note</a>
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
                                    <th>Sr No</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Total</th>
                                    <th>Left</th>
                                    @if (auth()->guard('admin')->user()->canany(['branch-edit', 'branch-view']))
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->from }}</td>
                                        <td>{{ $data->to }}</td>
                                        <td>{{ count($data->c_note_detail_data) }}</td>
                                        <td>{{ count($data->c_note_detail_data->whereNull('assign_to')) }}</td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                @if (auth()->guard('admin')->user()->can('branch-edit'))
                                                    <a href="{{route('admin.c_note_assign',$data->id)}}" class="me-2">+</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$list->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
