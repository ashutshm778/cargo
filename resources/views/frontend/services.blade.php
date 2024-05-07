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
<div class="service-area style-2 pd-top-115 pd-bottom-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title text-center">
                    <h4 class="subtitle style-2">SERVICES</h4>
                    <h2 class="title">OUR SERVICE FOR YOU</h2>
                    <p>Prashant Cargo & Logistics is an innovative service is effective logistics solution for the delivery of cargo. This service is useful for companies various.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="single-service-wrap">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/service/2.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h5>Air Cargo Services</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-service-wrap">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/service/1.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h5>Domestic Courier Services</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-service-wrap">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/service/3.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h5>Excess Baggage Courier</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-service-wrap">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/service/4.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h5>Food Items Delivery</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-service-wrap">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/service/5.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h5>International Courier Services</h5>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-service-wrap">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/service/6.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h5>Medicine Courier Services</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service area end -->
    @endsection
