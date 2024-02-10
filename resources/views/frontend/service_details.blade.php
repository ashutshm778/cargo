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
                                <li><a href="/">Home</a></li>
                                <li><a href="/">Service</a></li>
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
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area">
                        <div class="widget widget_catagory">
                            <h4 class="widget-title">SERVICE LIST
                                <span class="dot"></span>
                            </h4>
                            <ul class="catagory-items">
                                <li><a href="#">Air Transportation <span><i class="fa fa-arrow-right"></i></span></a></li>
                                <li><a href="#">Sea Transportation <span><i class="fa fa-arrow-right"></i></span></a></li>
                                <li><a href="#">Warehouse <span><i class="fa fa-arrow-right"></i></span></a></li>
                                <li><a href="#">Road Transportation <span><i class="fa fa-arrow-right"></i></span></a></li>
                                <li><a href="#">Train Transportation <span><i class="fa fa-arrow-right"></i></span></a></li>
                                <li><a href="#">Land Transportation <span><i class="fa fa-arrow-right"></i></span></a></li>
                            </ul>
                        </div>
                        <div class="widget widget_support text-center mb-0" style="background: url({{ asset('frontend/assets/img/widget/support-bg.png')}});">
                            <h4 class="widget-title style-white">24/7 ONLINE SUPPORT <span class="dot"></span></h4>
                            <p>Assertively pontificate high standards in scenarios rather than sustainable system. Interactively empower.</p>
                            <p class="contact"><i class="fa fa-envelope"></i>info.info@prashantcargo.com</p>
                            <p class="contact mb-0"><i class="fa fa-phone-alt"></i>+91-1234567890</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area end -->

    @endsection
