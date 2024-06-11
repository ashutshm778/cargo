<div>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Shipment In Scan</h6>
                        </div>
                        <div class="ms-auto">
                            @if (!empty($message))
                                <h4 style="color:red;"> {{ $message }}</h4>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-3 mb-3">
                            MFNo:
                            <input type="text" id="mf_no" wire:model.live="mf_no" class="form-control " />
                        </div>






                        <div class="col-3 mb-3">
                            AWB No:
                            <input type="text" id="awb_no" wire:model.live="awb_no" wire:keyup="add_fields()"
                                class="form-control " />
                        </div>
                    </div>





                </div>
            </div>
        </div>
        @push('scripts')
            <script>
                function printDiv(divId) {
                    var printContents = document.getElementById(divId).innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();

                    document.body.innerHTML = originalContents;
                }
            </script>
        @endpush
    </div>
</div>
