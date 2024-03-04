@extends('backend.layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-content row">
            @if (auth()->guard('admin')->user()->can('pincode-create'))
                <div class="col-4">
                    <div class="card radius-10">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">{{ !empty($pincode->id) ? 'Edit' : 'Add' }} Pincode</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="pincode" name="pincode" method="post" action="{{ route('admin_pincode.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @if (!empty($pincode->id))
                                    <input type="hidden" name="id" value="{{ $pincode->id }}" />
                                @endif
                                <div class="col-md-12 mb-3">
                                    <label for="bsValidation1" class="form-label">Pincode<span>*</span></label>
                                    <input type="text" class="form-control" name="pincode" id="bsValidation1"
                                        placeholder="Pincode"
                                        value="@if (!empty($pincode->pincode)) {{ $pincode->pincode }} @endif" required>
                                    <span
                                        style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;"
                                        role="alert">
                                        <strong>{{ $errors->first('pincode') }}</strong>
                                    </span>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="bsValidation1" class="form-label">City<span>*</span></label>
                                    <input type="text" class="form-control" name="city" id="bsValidation1"
                                        placeholder="City"
                                        value="@if (!empty($pincode->city)) {{ $pincode->city }} @endif" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="bsValidation1" class="form-label">State<span>*</span></label>
                                    <input type="text" class="form-control" name="state" id="bsValidation1"
                                        placeholder="State"
                                        value="@if (!empty($pincode->state)) {{ $pincode->state }} @endif" required>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit"
                                            class="btn btn-primary px-4">{{ !empty($pincode->id) ? 'Update' : 'Submit' }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-8">
                <div class="card radius-10">
                    <div class="card-header">
                        <form id="search_form" method="GET" action="{{ route('admin.pincode') }}">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Pincode List</h6>
                                </div>

                                <div class="ms-auto"> <input class="form-control" type="text" name="q"
                                        value="{{ request('q') }}" placeholder="Search By Pincode">
                                </div>
                                <button type="submit" class="btn btn-primary px-4">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Pincode</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Status</th>
                                        @if (auth()->guard('admin')->user()->canany(['pincode-edit', 'product-delete']))
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pincodes as $pincode)
                                        <tr>
                                            <td>{{ $pincode->pincode }}</td>
                                            <td>{{ $pincode->city }}</td>
                                            <td>{{ $pincode->state }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" onchange="update_status(this)"
                                                        value="{{ $pincode->id }}" type="checkbox"
                                                        id="flexSwitchCheckChecked"
                                                        @if ($pincode->status == 'active') {{ 'checked' }} @endif>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                                </div>
                                            </td>
                                            @if (auth()->guard('admin')->user()->canany(['pincode-edit', 'product-delete']))
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        @if (auth()->guard('admin')->user()->can('pincode-edit'))
                                                            <a href="{{ route('admin_pincode.edit', $pincode->id) }}"
                                                                class=""><i class="bx bxs-edit"></i></a>
                                                        @endif
                                                        @if (auth()->guard('admin')->user()->can('pincode-delete'))
                                                            <a href="{{ route('admin_pincode.delete', $pincode->id) }}"
                                                                class="ms-3"><i class="bx bxs-trash"></i></a>
                                                        @endif
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                            </table>
                            {{ $pincodes->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        function update_status(el) {
            if (el.checked) {
                var status = 'active';
            } else {
                var status = 'inactive';
            }
            $.post('{{ route('admin_pincode.update_status') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function(data) {
                if (data == 1) {

                } else {

                }
            });
        }

        function filter() {
            $('#search_form').submit();
        }
    </script>
@endsection
