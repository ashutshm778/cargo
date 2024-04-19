<div>
    <div class="page-wrapper">
        <div class="page-content row">
            <div class="col-6 m-auto">
                <div class="card radius-10">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0"> Staff Edit</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-sm-10 m-auto mb-2">
                                        <div class="form-group mb-25">
                                            <label for="text-placeholder">Staff Name *</label>
                                            <input type="text" class="form-control" placeholder="Role Name"
                                                wire:model="name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group  mb-25">
                                            <label for="text-placeholder">Staff Email *</label>
                                            <input type="email" class="form-control" placeholder="Email"
                                                wire:model="email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group  mb-25">
                                            <label for="text-placeholder">Password *</label>
                                            <input type="password" class="form-control" placeholder="Password"
                                                wire:model="password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group  mb-25">
                                            <label for="text-placeholder">Role</label>
                                            <select class="form-control" wire:model="role">
                                                <option>Select Role</option>
                                                @foreach($roles as $role)
                                                <option value="{{$role->name}}" >{{ explode('_', $role->name)[0] }}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group  mb-25">
                                            <label for="text-placeholder">Branch</label>
                                            <select class="form-control" wire:model="branch">
                                                <option>Select Branch</option>
                                                @foreach($branches as $branch)
                                                <option value="{{ $branch->id}}" >{{ $branch->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('branch')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">

                                    <button type="button" class="btn btn-primary CardBtn"
                                        wire:click="update()">Save</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
