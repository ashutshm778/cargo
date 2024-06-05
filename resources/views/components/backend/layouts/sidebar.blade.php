<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('frontend/assets/img/favicon.png') }}" class="logo-icon" alt="logo icon" style="width: 66px;">
        </div>

        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
     </div>

    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.dashboard')}}" wire:navigate>
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        @if(auth()->guard('admin')->user()->can('pincode-list'))
        <li>
            <a href="{{route('admin.pincode')}}" aria-expanded="false" wire:navigate>
                <div class="parent-icon"><i class="bx bx-location-plus"></i>
                </div>
                <div class="menu-title">Pincode</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('branch-list'))
        <li>
            <a href="{{route('admin.branch')}}" wire:navigate>
                <div class="parent-icon"><i class='bx bx-git-branch'></i>
                </div>
                <div class="menu-title">Branch</div>
            </a>
        </li>
        @endif

        <li>
            <a href="{{route('admin.c_note')}}" wire:navigate>
                <div class="parent-icon"><i class='bx bx-user-check'></i>
                </div>
                <div class="menu-title">C-Note</div>
            </a>
        </li>
        @if(auth()->guard('admin')->user()->can('booking-list'))
        <li>
            <a href="{{route('admin.booking')}}" wire:navigate>
                <div class="parent-icon"><i class='bx bx-book-alt'></i>
                </div>
                <div class="menu-title">Booking</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('bookinglog-list'))
        <li>
            <a href="{{route('admin.booking_log')}}" wire:navigate>
                <div class="parent-icon"><i class='bx bx-book-alt'></i>
                </div>
                <div class="menu-title">Booking Log</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('delivery-list'))
        <li>
            <a href="{{route('admin.delivery')}}" wire:navigate>
                <div class="parent-icon"><i class='bx bx-book-alt'></i>
                </div>
                <div class="menu-title">Delivery</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('delivery_assign-list'))
        <li>
            <a href="{{route('admin.assign_delivery')}}" wire:navigate>
                <div class="parent-icon"><i class='bx bx-book-alt'></i>
                </div>
                <div class="menu-title">Assigned Delivery</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('mainifestation-list'))
        <li>
            <a href="{{route('admin.mainifestation')}}" wire:navigate>
                <div class="parent-icon"><i class='bx bx-list-check'></i>
                </div>
                <div class="menu-title">Manifestation</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('consigner-list'))
        <li>
            <a href="{{route('admin.consigner')}}" wire:navigate>
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Consigner</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('consignee-list'))
        <li>
            <a href="{{route('admin.consignee')}}" wire:navigate>
                <div class="parent-icon"><i class='bx bx-user-check'></i>
                </div>
                <div class="menu-title">Consignee</div>
            </a>
        </li>
        @endif

        @if(auth()->guard('admin')->user()->canany(['roles-list', 'staff-list']))
        <li>
            <a href="javascript:;" class="has-arrow" >
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Role & Permission</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.role')}}" wire:navigate ><i class='bx bx-radio-circle'></i>Role</a></li>
                <li> <a href="{{route('admin.staff')}}" wire:navigate ><i class='bx bx-radio-circle'></i>Staff</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.user_log')}}" aria-expanded="false">
                <div class="parent-icon"><i class="bx bxs-user-detail"></i>
                </div>
                <div class="menu-title">User Log</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('branch-report'))
        <li>
            <a href="{{route('admin.branch_report')}}" aria-expanded="false">
                <div class="parent-icon"><i class="bx bxs-user-detail"></i>
                </div>
                <div class="menu-title">Branch Report</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('contact_us-list'))
        <li>
            <a href="{{route('admin.contact_us')}}" wire:navigate>
                <div class="parent-icon"><i class='bx bx-git-branch'></i>
                </div>
                <div class="menu-title">Contact Us</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('career-list'))
        <li>
            <a href="{{route('admin.carrer')}}" wire:navigate>
                <div class="parent-icon"><i class='bx bx-git-branch'></i>
                </div>
                <div class="menu-title">Carrer</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('frenchies-list'))
        <li>
            <a href="{{route('admin.frenchies')}}" wire:navigate>
                <div class="parent-icon"><i class='bx bx-git-branch'></i>
                </div>
                <div class="menu-title">Frenchies</div>
            </a>
        </li>
        @endif
    </ul>
    <!--end navigation-->
</div>
