<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>




              <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                        <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                        </a>
                    </li>
                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;"  onclick="change_theme()">@if(session()->get('theme_mode')=='light-theme')<i class='bx bx-moon'></i>@endif @if(session()->get('theme_mode')=='dark-theme')<i class='bx bx-sun'></i>@endif
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-app">
                        <div class="dropdown-menu dropdown-menu-end p-0">
                            <div class="app-container p-2 my-2">
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="header-notifications-list">
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="header-message-list">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box ">
                <a class="d-flex align-items-center nav-link gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('frontend/assets/img/favicon.png') }}" class="user-img" alt="user avatar">
                </a>
                    {{-- <div class="user-info">
                        <p class="user-name mb-0">{{Auth::guard('admin')->user()->name}}</p>

                    </div> --}}
                    <div class="user-info">
                        @livewire('Backend.Auth.Logout')
                    </div>

            </div>
        </nav>
    </div>
</header>
