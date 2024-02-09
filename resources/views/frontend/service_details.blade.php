@extends('frontend.layouts.front_app')
@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('{{ asset('frontend/assets/img/banner/breadcrumb.png')}}')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">SERVICES DETAILS</h2>
                            <ul class="page-list">
                                <li><a href="home.html">Home</a></li>
                                <li><a href="service.html">Service</a></li>
                                <li>Services Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- service area start -->
    <div class="service-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="service-details-wrap">
                        <div class="thumb">
                            <img src="{{ asset('frontend/assets/img/service/7.png')}}" alt="img">
                            <div class="icon">
                                <img src="{{ asset('frontend/assets/img/service/service-icon-1.png')}}" alt="img">
                            </div>
                        </div>
                        <h2>SEA TRANSPORTATION</h2>
                        <p>Globally optimize highly efficient solution whereas open-source application. Completely strategize quality internal or "organic" sources for virtual e-business. Phosfluorescently re-engineer enterprise markets via value-added networks. Seamlessly restore inexpensive e-markets vis-a-vis corporate intellectual capital. Holisticly reinvent compelling niche markets via scalable strategic.</p>
                        <p>Authoritatively scale business meta-services before client-based technologies. Collaboratively strategize synergistic scenarios rather than flexible action items. Continually deliver market positioning convergence and mission-critical infrastructures.</p>
                        <div class="row">
                            <div class="col-lg-6 align-self-center">
                                <div class="thumb mb-lg-0 mb-4">
                                    <img src="{{ asset('frontend/assets/img/service/8.png')}}" alt="img">
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <h4 class="subtitle">Global Transaction Advisory</h4>
                                <ul class="list-inner-wrap">
                                    <li> Customer engagement matters</li>
                                    <li> The Love Boat promis someg for Plan</li>
                                    <li> Research beyond the business plan</li>
                                    <li> Logistics ground in Asia Pacific</li>
                                    <li> Logistics ground in South America</li>
                                    <li> Transportation across Europe</li>
                                </ul>
                            </div>
                        </div>
                        <h4 class="subtitle mt-3">How It Works</h4>
                        <p>Holisticly conceptualize go forward customer service rather than transparent infomediaries. Continually envisioneer 2.0 potentialities without team building processes. Dramatically pursue client-centric human capital before client-centered sources.</p>
                        <div class="video-thumb-wrap pt-1 pb-4">
                            <img src="{{ asset('frontend/assets/img/service/9.png')}}" alt="img">
                            <a class="video-play-btn" href="https://www.youtube.com/embed/Wimkqo8gDZ0" data-effect="mfp-zoom-in"><i class="fa fa-play"></i></a>
                        </div>
                        <p class="last-para">Dramatically morph extensive users before market-driven partnerships. Conveniently initiate best-of-breed resources and enabled architectures.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area">
                        <div class="widget widget_search">
                            <form class="search-form">
                                <div class="form-group">
                                    <input type="text" placeholder="Search here...">
                                </div>
                                <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget widget_catagory">
                            <h4 class="widget-title">SERVICE LIST
                                <span class="dot"></span>
                            </h4>
                            <ul class="catagory-items">
                                <li><a href="blog.html">Air Transportation <span><i class="fa fa-arrow-right"></i></span></a></li>
                                <li><a href="blog.html">Sea Transportation <span><i class="fa fa-arrow-right"></i></span></a></li>
                                <li><a href="blog.html">Warehouse <span><i class="fa fa-arrow-right"></i></span></a></li>
                                <li><a href="blog.html">Road Transportation <span><i class="fa fa-arrow-right"></i></span></a></li>
                                <li><a href="blog.html">Train Transportation <span><i class="fa fa-arrow-right"></i></span></a></li>
                                <li><a href="blog.html">Land Transportation <span><i class="fa fa-arrow-right"></i></span></a></li>
                            </ul>
                        </div>
                        <div class="widget widget_download">
                            <h4 class="widget-title">DOWNLOAD BROCHURE
                                <span class="dot"></span>
                            </h4>
                            <ul class="download-items">
                                <li><a href="#"> <i class="far fa-file-pdf"></i> DOWNLOAD PDF</a></li>
                                <li><a href="#"> <i class="far fa-file-alt"></i> DOWNLOAD DOC </a></li>
                            </ul>
                        </div>
                        <div class="widget widget_support text-center mb-0" style="background: url({{ asset('frontend/assets/img/widget/support-bg.png')}});">
                            <h4 class="widget-title style-white">24/7 ONLINE SUPPORT <span class="dot"></span></h4>
                            <p>Assertively pontificate high standards in scenarios rather than sustainable system. Interactively empower.</p>
                            <p class="contact"><i class="fa fa-envelope"></i>info@transpro.com</p>
                            <p class="contact mb-0"><i class="fa fa-phone-alt"></i>+1 800-435-7106</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area end -->

    @endsection
