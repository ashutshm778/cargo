<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">All Branch C-Note</h6>
                        </div>
                    </div>
                </div>



                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Branch</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                       @if($data->assign_type=='branch')
                                       {{App\Models\Branch::find($data->assign_to)->name}}
                                       @endif
                                    </td>
                                    <td>{{$data->smallest_c_no}}</td>
                                    <td>{{$data->largest_c_no}}</td>
                                    <td>
                                       <div class="d-flex order-actions">

                                            <a href="{{route('admin.c_note_frenchies_assign',['id'=>$data->id,'start_range'=>$data->smallest_c_no,'end_range'=>$data->largest_c_no])}}" class="me-2">+</a>

                                       </div>
                                     </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
