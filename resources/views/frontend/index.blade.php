@extends('frontend.layouts.front_app')
@section('content')
    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->
    <!-- banner start -->
    <div class="banner-area banner-area-1">
        <div class="banner-slider owl-carousel">
            {{-- <div class="item" style="background: url({{ asset('frontend/assets/img/banner/1.png')}});">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-8">
                            <div class="banner-inner style-white">
                                <h1 class="b-animate-2 title">RAIL & SHIP Logistics Services</h1>
                                <p class="b-animate-3 content">Logistics is generally the detailed organization and implementation of a complex tiona general business sense, logistics is the management.</p>
                                <div class="btn-wrap">
                                    <a class="btn btn-base b-animate-4" href="#"> Explore All Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background: url({{ asset('frontend/assets/img/banner/3.png')}});">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-8">
                            <div class="banner-inner style-white">
                                <h1 class="b-animate-2 title">Container Logistics Services</h1>
                                <p class="b-animate-3 content">Logistics is generally the detailed organization and implementation of a complex tiona general business sense, logistics is the management.</p>
                                <div class="btn-wrap">
                                    <a class="btn btn-base b-animate-4" href="#"> Explore All Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="item" style="background: url({{ asset('frontend/assets/img/banner/2.png')}});">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-8">
                            <div class="banner-inner style-white">
                                <h1 class="b-animate-2 title">FAST & RELIABLE LOGISTICS SERVICES</h1>
                                <p class="b-animate-3 content">Prashant Cargo & Logistics is a leading courier service company providing fast and reliable delivery services.</p>
                                <div class="btn-wrap">
                                    <a class="btn btn-base b-animate-4" href="#"> Explore All Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- about area start -->
    <div class="about-area pd-top-115 pd-bottom-90">
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
                                <div class="btn-wrap">
                                    <a class="btn btn-base" href="#">ABOUT MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!--fact-area start-->
    <div class="container pd-top-115">
        <div class="fact-counter-area" style="background: url({{ asset('frontend/assets/img/fact/bg.png')}});">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single-fact-wrap">
                        <h2><span class="counter">4500</span>+</h2>
                        <h5>Shipment Delivered</h5>
                        <p>Yay, packages delivered! That means someone sent you something special, like a present or something you ordered.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-fact-wrap">
                        <h2><span class="counter">20</span>+</h2>
                        <h5>Our Branches</h5>
                        <p>"Our branches" are like the different parts of a tree. Imagine a big tree with lots of branches spreading out in different directions.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-fact-wrap after-none">
                        <h2><span class="counter">15</span>K+</h2>
                        <h5>Happy Customer</h5>
                        <p>A "happy customer" is someone who feels really good about something they bought or experienced.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--fact-area end-->
    </div>
    <!-- about area end -->

<!-- service area start -->
<div class="service-area style-2 pd-top-115 pd-bottom-80" style="background: url({{ asset('frontend/assets/img/service/bg.png')}});">
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


  <!--wcu-area start-->
  <div class="wcu-area-2 pd-top-115" style="background-image: url({{ asset('frontend/assets/img/wcu/bg-2.png')}});">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title style-white text-center">
                    <h4 class="subtitle style-2">WHY CHOOSE US</h4>
                    <h2 class="title">WHY CHOOSE FOR US</h2>
                    <p class="text-white">When you choose us, you're choosing a team that cares about you like a friend. Here's why you might want to pick us.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="single-wcu-wrap style-2">
                    <div class="icon">
                        <img src="{{ asset('frontend/assets/img/wcu/icon-4.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h6>Fast Transportion Service</h6>
                        <p>"Fast transportation service" is like having a super speedy delivery service for getting things from one place to another really quickly. </p>
                    </div>
                </div>
                <div class="single-wcu-wrap style-2">
                    <div class="icon">
                        <img src="{{ asset('frontend/assets/img/wcu/icon-5.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h6>Safety And Reliability</h6>
                        <p>"Safety and reliability" are like having a superhero team protecting you and making sure everything goes smoothly.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="thumb text-center">
                    <img src="{{ asset('frontend/assets/img/wcu/delivery-man.png')}}" alt="img">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-wcu-wrap style-2">
                    <div class="icon">
                        <img src="{{ asset('frontend/assets/img/wcu/icon-6.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h6>24/7 Online Support</h6>
                        <p>
                            "24/7 online support" means that there are helpful people available to assist you any time of day or night, every day of the week. </p>
                    </div>
                </div>
                <div class="single-wcu-wrap style-2">
                    <div class="icon">
                        <img src="{{ asset('frontend/assets/img/wcu/icon-7.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h6>Online Tracking</h6>
                        <p>
                            "Online tracking" is like having a special map that shows you exactly where your package or delivery is at all times. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--wcu-area end-->

    <!--team-area start-->
    <div class="team-area pd-top-115 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h4 class="subtitle">TEAM MEMBERS</h4>
                        <h2 class="title">OUR PROFESSIONAL TEAM</h2>
                        <p>Our professional team is like a group of superheroes, each with their own special skills and powers.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="team-slider owl-carousel">
                        <div class="item">
                            <div class="single-team-wrap">
                                <div class="thumb">
                                    <img src="{{ asset('frontend/assets/img/testimonial/3.png')}}" alt="img">
                                </div>
                                <div class="details">
                                <h5>Shailesh Gupta</h5>
                                <p>Varanasi</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-team-wrap">
                                <div class="thumb">
                                    <img src="{{ asset('frontend/assets/img/testimonial/3.png')}}" alt="img">
                                </div>
                                <div class="details">
                                <h5>Shailesh Gupta</h5>
                                <p>Varanasi</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-team-wrap">
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
                </div>
            </div>
        </div>
    </div>
    <!--team-area end-->

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
                <div class="col-lg-7">
                    <div class="section-title text-center">
                        <h4 class="subtitle">HAPPY CLIENTS</h4>
                        <h2 class="title">TRUSTED OUR CLIENTS</h2>
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
