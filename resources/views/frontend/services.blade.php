@extends('frontend.layouts.front_app')
@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('{{ asset('frontend/assets/img/banner/breadcrumb.png')}}')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">SERVICES</h2>
                            <ul class="page-list">
                                <li><a href="home.html">Home</a></li>
                                <li>Services</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- service area start -->
    <div class="service-area style-2 pd-top-115 pd-bottom-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center">
                        <h4 class="subtitle">SERVICES</h4>
                        <h2 class="title">OUR SERVICE FOR YOU</h2>
                        <p>Quickly optimize cooperative models for long-term high-impact ROI. Dynamically drive innovative e-commerce and distributed paradigms.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="single-service-wrap">
                        <div class="thumb">
                            <img src="{{ asset('frontend/assets/img/service/1.png')}}" alt="img">
                            <div class="icon">
                                <img src="{{ asset('frontend/assets/img/service/service-icon-1.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="details">
                            <h5>SEA TRANSPORTATION</h5>
                            <p>Intrinsicly exploit e-business imperative with emerging human capital.</p>
                            <div class="btn-wrap">
                                <a class="read-more-text" href="service-details.html">READ MORE <span><i class="fa fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-service-wrap">
                        <div class="thumb">
                            <img src="{{ asset('frontend/assets/img/service/2.png')}}" alt="img">
                            <div class="icon">
                                <img src="{{ asset('frontend/assets/img/service/service-icon-2.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="details">
                            <h5>AIR TRANSPORTATION</h5>
                            <p>Intrinsicly exploit e-business imperative with emerging human capital.</p>
                            <div class="btn-wrap">
                                <a class="read-more-text" href="service-details.html">READ MORE <span><i class="fa fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-service-wrap">
                        <div class="thumb">
                            <img src="{{ asset('frontend/assets/img/service/3.png')}}" alt="img">
                            <div class="icon">
                                <img src="{{ asset('frontend/assets/img/service/service-icon-3.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="details">
                            <h5>WAREHOUSING</h5>
                            <p>Intrinsicly exploit e-business imperative with emerging human capital.</p>
                            <div class="btn-wrap">
                                <a class="read-more-text" href="service-details.html">READ MORE <span><i class="fa fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-service-wrap">
                        <div class="thumb">
                            <img src="{{ asset('frontend/assets/img/service/4.png')}}" alt="img">
                            <div class="icon">
                                <img src="{{ asset('frontend/assets/img/service/service-icon-4.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="details">
                            <h5>ROAD TRANSPORTATION</h5>
                            <p>Intrinsicly exploit e-business imperative with emerging human capital.</p>
                            <div class="btn-wrap">
                                <a class="read-more-text" href="service-details.html">READ MORE <span><i class="fa fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-service-wrap">
                        <div class="thumb">
                            <img src="{{ asset('frontend/assets/img/service/5.png')}}" alt="img">
                            <div class="icon">
                                <img src="{{ asset('frontend/assets/img/service/service-icon-5.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="details">
                            <h5>TRAIN TRANSPORTATION</h5>
                            <p>Intrinsicly exploit e-business imperative with emerging human capital.</p>
                            <div class="btn-wrap">
                                <a class="read-more-text" href="service-details.html">READ MORE <span><i class="fa fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-service-wrap">
                        <div class="thumb">
                            <img src="{{ asset('frontend/assets/img/service/6.png')}}" alt="img">
                            <div class="icon">
                                <img src="{{ asset('frontend/assets/img/service/service-icon-6.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="details">
                            <h5>LAND TRANSPORTATION</h5>
                            <p>Intrinsicly exploit e-business imperative with emerging human capital.</p>
                            <div class="btn-wrap">
                                <a class="read-more-text" href="service-details.html">READ MORE <span><i class="fa fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area end -->

    <!--contact-area start-->
    <div class="call-to-contact-area pd-top-140  mt-0">
        <img src="{{ asset('frontend/assets/img/contact/1.png')}}" alt="img">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="cta-inner-wrap">
                        <div class="section-title style-white mb-0">
                            <h4 class="subtitle style-2">LET’S TALK</h4>
                            <h2 class="title">YOU NEED ANY HELP?
                                GET FREE CONSULTATION</h2>
                        </div>
                        <div class="single-cta-wrap">
                            <div class="icon">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="details">
                                <h6>Have Any Question</h6>
                                <h3>+19524357106</h3>
                            </div>
                        </div>
                        <a class="btn btn-base" href="contact.html">CONTACT US</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact-area end-->

    <!--partner-area start-->
    <div class="partner-area pd-top-115 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center">
                        <h4 class="subtitle">HAPPY CLIENTS</h4>
                        <h2 class="title">TRUSTED BY OUR
                            365,000 CLIENTS</h2>
                        <p class="content">Dramatically enhance interactive metrics for reliable services. Proactively unleash fully researched e-commerce.</p>
                    </div>
                </div>
            </div>
            <div class="partner-slider owl-carousel">
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/partner/1.png')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/partner/2.png')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/partner/3.png')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/partner/4.png')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/partner/5.png')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/partner/6.png')}}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--partner-area end-->

    @endsection
