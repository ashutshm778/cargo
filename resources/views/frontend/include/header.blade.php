    <!-- navbar start -->
    <header class="navbar-area">
        <nav class="navbar navbar-area-2 navbar-area navbar-expand-lg">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <button class="menu toggle-btn d-block d-lg-none" data-target="#transpro_main_menu"
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="logo">
                    <a class="logo-1" href="/"><img src="{{ asset('frontend/assets/img/logo.png')}}" alt="img"></a>
                    <a class="logo-2" href="/"><img src="{{ asset('frontend/assets/img/logo.png')}}" alt="logo"></a>
                </div>
                <div class="nav-right-part nav-right-part-mobile">
                    <a class="btn btn-base" href="#"><span>
                      </span> Get A Quote
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="transpro_main_menu">
                    <ul class="navbar-nav menu-open text-end">
                    <li><a href="/">Home</a></li>
                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li class="menu-item-has-children">
                            <a href="#">Services</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('services')}}">Service</a></li>
                                <li><a href="{{route('service_detail')}}">Service Details</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="nav-right-part nav-right-part-desktop">
                    <a class="btn btn-base" href="{{route('track_order')}}"><span>
                    </span> Track Your Order <i class="fa fa-paper-plane"></i>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <!-- navbar end -->
