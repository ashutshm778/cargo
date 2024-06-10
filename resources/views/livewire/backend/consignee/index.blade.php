<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Consignee List</h6>
                        </div>
                        <div class="ms-auto">@if(auth()->guard("admin")->user()->can("consignee-create"))
                            <a href="{{ route('admin.consignee_create') }}"
                                class="btn btn-primary radius-30 mt-2 mt-lg-0" wire:navigate ><i class="bx bxs-plus-square"></i>Add New</a>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">

                        </div>
                        <div class="col-2">

                        </div>
                        <div class="col-5">

                        </div>
                        <div class="col-3 mb-3">
                            <input type="search" wire:model.live="search" class="form-control form-control-sm"
                                placeholder="Type To Search" />
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table custom-brder align-middle mb-0"  id="datatable" >
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
                                <tbody>
                                    @foreach($list as $data)
                                    <tr>
                                        <td>
                                            {{$data->name}}
                                        </td>
                                        <td>
                                            {{$data->phone}}
                                        </td>
                                        <td>
                                            {{$data->pincode}}
                                        </td>
                                        <td>
                                            {{$data->full_address}}
                                        </td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                @if(auth()->guard("admin")->user()->can("consignee-edit"))
                                                <a href="{{route('admin.consignee_edit',$data->id)}}"  class="me-2" wire:navigate><i class="bx bxs-edit"></i></a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </tbody>
                        </table>
                    </div>
                    {{$list->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
