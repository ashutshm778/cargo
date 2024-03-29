<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('frontend/assets/img/favicon.png') }}" class="logo-icon" alt="logo icon" style="width: 72px;">
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
     </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        @if(auth()->guard('admin')->user()->can('branch-list'))
        <li>
            <a href="{{route('branch.index')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Branch</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('booking-list'))
        <li>
            <a href="{{route('booking.index')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Booking</div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.mainifestation_list')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Manifestation</div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.consigner')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Consigner</div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.consignee')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Consignee</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('pincode-list'))
        <li>
            <a href="{{route('admin.pincode')}}" aria-expanded="false">
                <div class="parent-icon"><i class="bx bx-location-plus"></i>
                </div>
                <div class="menu-title">Pincode</div>
            </a>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->canany(['roles-list', 'staff-list']))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Role & Permission</div>
            </a>
            <ul>
                <li> <a href="{{route('roles.index')}}"><i class='bx bx-radio-circle'></i>Role</a></li>
                <li> <a href="{{route('staff.index')}}"><i class='bx bx-radio-circle'></i>Staff</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.user_log')}}" aria-expanded="false">
                <div class="parent-icon"><i class="bx bx-location-plus"></i>
                </div>
                <div class="menu-title">User Log</div>
            </a>
        </li>
        @endif
    </ul>
    <!--end navigation-->
</div>
