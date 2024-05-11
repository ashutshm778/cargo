@extends('frontend.layouts.front_app')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2"
        style="background-image:url('{{ asset('frontend/assets/img/banner/breadcrumb.png') }}')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">CAREER</h2>
                            <ul class="page-list">
                                <li><a href="#">Home</a></li>
                                <li>Career</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- about area start -->
    <div class="about-area pd-top-115 pd-bottom-120">
        <div class="container">
            <div class="contact-area mg-top-50 mb-120">
                <div class="row g-0 justify-content-center">
                    <div class="col-lg-5">
                        <div class="contact-information-wrap dds">
                            <h3>JOIN US</h3>
                            <p>Prashant Cargo & Logistics is India’s largest fully integrated logistics service provider.</p>
                            <p>We move fast, operate under pressure and solve business problems.</p>
                            <p>Our aim is to attract the highest quality of talent and provide them opportunities for leadership and professional growth in a diverse and inclusive environment.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <form method="post" action="{{route('career_save')}}" class="contact-form text-center" enctype="multipart/form-data">
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
                                        <input type="text" placeholder="Full Name*" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input-inner">
                                        <label><i class="fa fa-building"></i></label>
                                        <input type="text" placeholder="Company Name*" name="company_name" required>
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
                                    <label for="" style="justify-content: left;display: flex;">Applied Post</label>
                                    <div class="single-select-inner">
                                        <select class="single-select" name="post_name">
                                            <option>Choose Post</option>
                                            <option value="operation">Operation</option>
                                            <option value="sales-&-marketing">Sales & Marketing</option>
                                            <option value="delivery-staff">Delivery Staff</option>
                                            <option value="drivers">Drivers</option>
                                            <option value="support-staff">Support Staff</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="" style="justify-content: left;display: flex;">Resume</label>
                                    <div class="single-input-inner">
                                        <input type="file" value="Upload Resume" name="resume" accept="application/pdf" style="padding: 14px 20px;">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-input-inner">
                                        <label><i class="fas fa-pencil-alt"></i></label>
                                        <textarea placeholder="About..." name="message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-base"> Submit <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--about area end-->
    @endsection
