<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">User Log List</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0"  id="datatable" >
                            <thead>
                                <tr>

                                    <th>Detail</th>
                                    <th>Action</th>
                                    <th>User</th>
                                    <th>Model</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resource_logs as $log)
                                    <tr>
                                        <td>{{$log->details}}</td>
                                        <td>{{$log->action}}</td>
                                        <td>{{$log->user->name}}</td>
                                        <td>{{$log->model}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$resource_logs->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
