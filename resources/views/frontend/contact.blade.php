@extends('frontend.layouts.front_app')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('{{ asset('frontend/assets/img/banner/breadcrumb.png')}}')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">CONTACT US</h2>
                            <ul class="page-list">
                                <li><a href="/">Home</a></li>
                                <li>Contact Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- contact area start -->
    <div class="container">
        <div class="contact-area mg-top-120 mb-120">
            <div class="row g-0 justify-content-center">
                <div class="col-lg-7">
                    <form method="post" action="{{route('contact_us_save')}}" class="contact-form text-center">
                        @csrf
                        <h3>GET A QUOTE</h3>
                        <div class="row">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                <strong>Success!</strong> {{ $message }}
                                </div>
                            @endif
                            <div class="col-md-12">
                                <div class="single-input-inner">
                                    <label><i class="fa fa-user"></i></label>
                                    <input type="text" name="name" placeholder="Your name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <label><i class="fa fa-envelope"></i></label>
                                    <input type="text" name="email" placeholder="Your email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <label><i class="fas fa-calculator"></i></label>
                                    <input type="text" name="phone" placeholder=" Phone number">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner">
                                    <label><i class="fas fa-pencil-alt"></i></label>
                                    <textarea placeholder="Write massage" name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-base" name="submit"> SEND MESSAGE </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="contact-information-wrap">
                        <h3>CONTACT INFORMATION</h3>
                        <div class="single-contact-info-wrap">
                            <h6>Contact Number:</h6>
                            <div class="media">
                                <div class="icon">
                                    <i class="fa fa-phone-alt"></i>
                                </div>
                                <div class="media-body">
                                    <p>+91-8887790443</p>
                                </div>
                            </div>
                        </div>
                        <div class="single-contact-info-wrap">
                            <h6>Mail Address:</h6>
                            <div class="media">
                                <div class="icon" style="background: #080C24;">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="media-body">
                                    <p>info@prashantcargo.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="single-contact-info-wrap mb-0">
                            <h6>Office Location:</h6>
                            <div class="media">
                                <div class="icon" style="background: #565969;">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                <div class="media-body">
                                    <p>S-21/123-1, SUBHASH NAGAR MALDAHIYA,
                                    </p>
                                    <p>CANTT,VARANASI-221005</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->

    <div class="contact-g-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115408.09799673867!2d82.90870585276089!3d25.320894921595844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e2db76febcf4d%3A0x68131710853ff0b5!2sVaranasi%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1707554127921!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    @endsection
