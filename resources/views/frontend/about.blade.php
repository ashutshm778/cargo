@extends('frontend.layouts.front_app')
@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('{{ asset('frontend/assets/img/banner/breadcrumb.png')}}')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">ABOUT US</h2>
                            <ul class="page-list">
                                <li><a href="#">Home</a></li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- about area start -->
    <div class="about-area pd-top-115 pd-bottom-80">
        <div class="container">
            <div class="about-area-inner">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-thumb-wrap">
                            <img class="img-1" src="{{ asset('frontend/assets/img/about/shape.png')}}" alt="img">
                            <img class="img-2" src="{{ asset('frontend/assets/img/about/1.png')}}" alt="img">
                            <img class="img-3" src="{{ asset('frontend/assets/img/about/2.png')}}" alt="img">
                            <div class="exprience-wrap">
                                <img src="{{ asset('frontend/assets/img/about/shape-3.png')}}" alt="img">
                                <div class="details">
                                    <h1>22</h1>
                                    <p>YEARS EXPERIENCE</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="about-inner-wrap">
                            <div class="section-title mb-0">
                                <h4 class="subtitle">ABOUT US</h4>
                                <h2 class="title">WELCOME PRASHANT CARGO & LOGISTICS</h2>
                                <p class="content left-line">Prashant Cargo & Logistics is your trusted logistics partner dedicated to delivering smiles across India. With our headquarters in Varanasi and zonal office in Delhi, we have earned a strong reputation for reliability, trust, and exceptional service.</p>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <ul class="list-inner-wrap mb-mb-0 mb-3 mb-lg-3 mb-xl-0">
                                            <li><img src="{{ asset('frontend/assets/img/icon/check.png')}}" alt="img">Free Pickup from Your Doorstep</li>
                                            <li><img src="{{ asset('frontend/assets/img/icon/check.png')}}" alt="img">Send Food, Liquid, Madicin, Household, etc.</li>
                                            <li><img src="{{ asset('frontend/assets/img/icon/check.png')}}" alt="img">Online Courier Tracking Feature.</li>
                                            <li><img src="{{ asset('frontend/assets/img/icon/check.png')}}" alt="img">Easy & Fast online Booking Process</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--fact-area start-->
    <div class="container pd-top-115">
        <div class="fact-counter-area">
            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-6 gx-2 col-6">
                    <div class="single-fact-wrap">
                        <img src="{{ asset('frontend/assets/img/ShipmentsDay.png')}}" alt="Counter Image">
                        <h2><span class="counter">1</span>L+/Month</h2>
                        <h5>Shipments/Day</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 gx-2 col-6">
                    <div class="single-fact-wrap">
                        <img src="{{ asset('frontend/assets/img/Hubs.png')}}" alt="Counter Image">
                        <h2><span class="counter">20</span>+</h2>
                        <h5>Hubs</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 gx-2 col-6">
                    <div class="single-fact-wrap">
                        <img src="{{ asset('frontend/assets/img/PinCodes.png')}}" alt="Counter Image">
                        <h2><span class="counter">1000</span>+</h2>
                        <h5>Pin Codes</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 gx-2 col-6">
                    <div class="single-fact-wrap">
                        <img src="{{ asset('frontend/assets/img/FieldServiceRepresentatives.png')}}" alt="Counter Image">
                        <h2><span class="counter">100</span>+</h2>
                        <h5>Team</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 gx-2 col-6">
                    <div class="single-fact-wrap">
                        <img src="{{ asset('frontend/assets/img/branch.png')}}" alt="Counter Image">
                        <h2><span class="counter">5</span>+</h2>
                        <h5>Branches </h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 gx-2 col-6">
                    <div class="single-fact-wrap">
                        <img src="{{ asset('frontend/assets/img/customer-satisfaction.png')}}" alt="Counter Image">
                        <h2><span class="counter">1</span>M+</h2>
                        <h5>Happy Customer</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--fact-area end-->
    </div>
    <!-- about area end -->

    <!-- testimonial area start -->
    <div class="testimonial-area pd-top-115 pd-bottom-120"  style="background: url({{ asset('frontend/assets/img/service/bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-0">
                        <h4 class="subtitle">TESTIMONIALS</h4>
                        <h2 class="title">OUR CLIENT’S FEEDBACK</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider owl-carousel">
                <div class="item">
                    <div class="single-testimonial-wrap">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/img/testimonial/quote.png')}}" alt="img">
                        </div>
                        <p>Amazing Courier service by Prashant Cargo & Logistics and on-time delivery.<br>
                            Best customer support and are always available to help out.<br>
                            I would highly recommend Prashant Cargo & Logistics and definitely use it for my couriers in the future too.</p>
                        <div class="client-wrap">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/img/testimonial/3.png')}}" alt="img">
                            </div>
                            <div class="details">
                                <h5>Shailesh Gupta</h5>
                                <p>Varanasi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-testimonial-wrap">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/img/testimonial/quote.png')}}" alt="img">
                        </div>
                        <p>Most prompt and best courier service given to me by Prashant Cargo & Logistics Delhi. My important documents reached at my home in Kolkatta in the next 2 days only. Thanks to their punctual and speedy courier service. I’d always take services and refer my friends for a wonderful and hassle-free courier delivery service.</p>
                        <div class="client-wrap">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/img/testimonial/3.png')}}" alt="img">
                            </div>
                            <div class="details">
                                <h5>Ankit Singh</h5>
                                <p>Prayagraj</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->

    <!--partner-area start-->
    <div class="partner-area pd-top-90 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center">
                        <h4 class="subtitle">OUR BRANDS</h4>
                        <h2 class="title">WE ARE THE FIRST PREFERENCE OF LEADING GLOBAL BRANDS</h2>
                    </div>
                </div>
            </div>
            <div class="partner-slider owl-carousel">
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/reliance.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/adidas.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/flipkart.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/boat.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/lic.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/first-cry.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/zara.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/cliq.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/Souled-Store.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/meesho.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/m-caffeine.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/purple.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/samsung.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/wow.jpg')}}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('frontend/assets/img/brand/au.jpg')}}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--partner-area end-->
    @endsection
