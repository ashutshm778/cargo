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
                        <li><a href="{{route('services')}}">Service</a></li>
                        {{-- <li class="menu-item-has-children">
                            <a href="#">Services</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('services')}}">Service</a></li>
                                <li><a href="{{route('service_detail')}}">Service Details</a></li>
                            </ul>
                        </li> --}}
                        <li><a href="{{route('career')}}">Career</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                        <li style="border-bottom: 1px solid #541545;"><a href="#" style="color: #541545;">Staff Login</a></li>
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
    <div class="enquiryBtn"><a class="btn btn-base" data-bs-toggle="modal" data-bs-target="#myModal1">Franchise Enquiry <i class="fa fa-envelope" aria-hidden="true"></i></a></div>

    <div class="modal fade show" id="myModal1" >
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Franchise Business Enquiry Form!</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('franchise_save')}}" class="contact-form text-center" enctype="multipart/form-data">
                        @csrf
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                            <strong>Success!</strong> {{ $message }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <label><i class="fa fa-user"></i></label>
                                    <input type="text" name="name" placeholder="Full Name*" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <label><i class="fa fa-building"></i></label>
                                    <input type="text" name="company_name" placeholder="Company Name*" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <label><i class="fas fa-calculator"></i></label>
                                    <input type="text" placeholder=" Phone*" name="phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <label><i class="fa fa-envelope"></i></label>
                                    <input type="text" placeholder="Email*" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-select-inner">
                                    <label><i class="far fa-file-alt"></i></label>
                                    <select class="single-select" name="services">
                                        <option>Check the services you’re interested in</option>
                                        <option value="B2B">B2B</option>
                                        <option value="B2C">B2C</option>
                                        <option value="Cross-Border Logistics">Cross-Border Logistics</option>
                                        <option value="3rd Party Logistics (3PL)">3rd Party Logistics (3PL)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <label><i class="fa fa-map-marker"></i></label>
                                    <input type="text" name="location" placeholder="Location(s) for which you are interested in our services:" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner">
                                    <label><i class="fas fa-pencil-alt"></i></label>
                                    <textarea name="message" placeholder="Enter about your service requirement details"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-base"> ENQUIRY NOW</button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
        </div>
    </div>
