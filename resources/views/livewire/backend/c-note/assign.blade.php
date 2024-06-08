<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Add C-Note</h6>
                        </div>
                    </div>
                </div>
                @if(empty($from))
                <div style="text-align:center;">
                  <p style="color:red;">All C-Note Assigned</p>
                </div>
               @else
                <div class="card-body">
                    <div class="form-body">
                        <form class="row">
                            <div class="col-md-4 mb-3">
                                <label for="from" class="form-label">From<span>*</span></label>
                                <input type="text" class="form-control" id="from" wire:model="from"
                                    placeholder="From" readonly>
                                @error('from')
                                    <span
                                        style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                        role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="to" class="form-label">To<span>*</span></label>
                                <input type="text" class="form-control" id="to" wire:model="to"
                                    placeholder="To">
                                @error('to')
                                    <span
                                        style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                        role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="to" class="form-label">Assign To<span>*</span></label>
                                <select id='branch' wire:model="branch" class="form-control">
                                    <option value=''>-- Select Branch--</option>
                                    @foreach (App\Models\Branch::all() as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                                @error('branch')
                                    <span
                                        style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                        role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="">
                                    <button type="button" wire:click="store()" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
               @endif


                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Branch</th>
                                <th>From</th>
                                <th>To</th>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
