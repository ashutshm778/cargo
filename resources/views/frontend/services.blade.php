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
                                <li><a href="/">Home</a></li>
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
<div class="service-area style-2 pd-top-115 pd-bottom-80" style="background: url({{ asset('frontend/assets/img/service/bg.png')}});">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title text-center">
                    <h4 class="subtitle style-2">SERVICES</h4>
                    <h2 class="title">OUR SERVICE FOR YOU</h2>
                    <p>Express delivery is an innovative service is effective logistics solution for the delivery of cargo. This service is useful for companies various.</p>
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
                        <h5>Sea transportation</h5>
                        <p>Express delivery is an innovative service is effective logistics solution for the delivery of cargo. This service is useful for companies various.</p>
                        <div class="btn-wrap">
                            <a class="read-more-text" href="#">READ MORE <span><i class="fa fa-arrow-right"></i></span></a>
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
                        <h5>Air transportation</h5>
                        <p>Air transportation is like riding on a giant bird that can carry people and things through the sky! Instead of driving on roads or sailing on water, airplanes use wings and engines to fly high above the ground.</p>
                        <div class="btn-wrap">
                            <a class="read-more-text" href="#">READ MORE <span><i class="fa fa-arrow-right"></i></span></a>
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
                        <h5>Warehousing</h5>
                        <p>Express delivery inno service effective logistics solutions for delivery of domestic cargo.</p>
                        <div class="btn-wrap">
                            <a class="read-more-text" href="#">READ MORE <span><i class="fa fa-arrow-right"></i></span></a>
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
                        <h5>Road transportation</h5>
                        <p>
                            "Road transportation" is when things or people are moved from one place to another using vehicles that go on roads, like cars, trucks, and buses. </p>
                        <div class="btn-wrap">
                            <a class="read-more-text" href="#">READ MORE <span><i class="fa fa-arrow-right"></i></span></a>
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
                        <h5>Rail/ Ship Transportation</h5>
                        <p>Express delivery inno service effective logistics solution for delivery of cargo also.</p>
                        <div class="btn-wrap">
                            <a class="read-more-text" href="#">READ MORE <span><i class="fa fa-arrow-right"></i></span></a>
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
                        <h5>Full Truck Load</h5>
                        <p>Express delivery inno service effective logistics solutionw for delivery of cargo.</p>
                        <div class="btn-wrap">
                            <a class="read-more-text" href="#">READ MORE <span><i class="fa fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service area end -->
    @endsection
