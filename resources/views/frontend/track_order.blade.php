@extends('frontend.layouts.front_app')
@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('{{ asset('frontend/assets/img/banner/breadcrumb.png')}}')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">TRACK ORDER</h2>
                            <ul class="page-list">
                                <li><a href="#">Home</a></li>
                                <li>Track Order</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <div class="about-area pd-top-60 pd-bottom-100">
        <div class="container">
            <div class="about-area-inner">
                <div class="row">
                <div class="col-md-8 col-sm-12 m-auto">
                <div class="user-section">
                            <div class="user-all-form">
                                <div class="contact-form">
                                <div class="widget widget_subscribe">
                                    <div class="single-subscribe-inner">
                                        <input type="number" placeholder="Enter Order No.">
                                        <a class="btn btn-base" href="#">Track Order <i class="fa fa-paper-plane"></i></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
