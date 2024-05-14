<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Contact-Us List</h6>
                        </div>
                        <div class="ms-auto">

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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>
                                           {{$data->message}}
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
