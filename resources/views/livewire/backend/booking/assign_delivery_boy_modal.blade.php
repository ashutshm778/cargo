<div>
    <div class="modal fade" id="assign_delivery_boy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Delivery Boy To Booking</h5>
                </div>
                <div class="modal-body" id="modal_data">
                    <form class="row" method="post" action="#">
                        <div class="col-md-12">
                            <label for="fullname" class="form-label">Delivery Boy<span>*</span></label>
                            <select id='delivery_boy_id' wire:model="delivery_boy_id" class="form-control">
                                <option value=''>-- Select Delivery Boy--</option>
                                @foreach(Spatie\Permission\Models\Role::where('name', 'Delivery Boy')->first()->users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="text-end">
                                <button type="button" class="btn btn-primary" wire:click="assign_delivery_boy()">Assign</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
