@extends('backend.layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Show Booking  </h6><br>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! $barcode !!}
            </div>
        </div>
    </div>
</div>
@endsection
