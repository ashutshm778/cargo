@extends('frontend.layouts.front_app')
@section('content')
    <!-- banner start -->
    <div class="banner-area banner-area-1">
        <div class="banner-slider owl-carousel">
            <div class="item" style="background: url({{ asset('frontend/assets/img/banner/1.png')}});">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-8">
                            <div class="banner-inner style-white">
                                <h1 class="b-animate-2 title">FAST CERTIFIED &
                                    BEST WORLD WIDE
                                    SERVICE</h1>
                                <p class="b-animate-3 content">Professionally strategize stand-alone functionalities and cooperative total linkage. Objectively predominate virtual quality vectors with orthogonal.</p>
                                <div class="btn-wrap">
                                    <a class="btn btn-base b-animate-4" href="#"> Explore The Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background: url({{ asset('frontend/assets/img/banner/2.png')}});">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-8">
                            <div class="banner-inner style-white">
                                <h1 class="b-animate-2 title">FAST CERTIFIED &
                                    BEST WORLD WIDE
                                    SERVICE</h1>
                                <p class="b-animate-3 content">Professionally strategize stand-alone functionalities and cooperative total linkage. Objectively predominate virtual quality vectors with orthogonal.</p>
                                <div class="btn-wrap">
                                    <a class="btn btn-base b-animate-4" href="#"> Explore The Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- feature area start -->
    <div class="container">
        <div class="feature-area">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-title mb-0">
                        <h4 class="subtitle">FEATURES</h4>
                        <h2 class="title">WHAT WE OFFER</h2>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="section-title">
                        <p class="content left-line">Collaboratively customize front-end materials with standardized infomediaries. Holisticly engineer performance based value. Assertively benchmark turnkey web-readiness rather than long.</p>
                    </div>
                </div>
            </div>
            <div class="feature-slider owl-carousel">
                <div class="item">
                    <div class="feature-wrap bg-pink">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/img/icon/feature-1.png')}}" alt="img">
                        </div>
                        <h5>TRANSPARENT PRICING</h5>
                        <p>Globally initiate resource maximizing total linkage via enabled process improvements.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="feature-wrap bg-ash">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/img/icon/feature-2.png')}}" alt="img">
                        </div>
                        <h5>ONLINE TRACKING</h5>
                        <p>Globally initiate resource maximizing total linkage via enabled process improvements.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="feature-wrap bg-sky">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/img/icon/feature-3.png')}}" alt="img">
                        </div>
                        <h5>WAREHOUSE STORAGE</h5>
                        <p>Globally initiate resource maximizing total linkage via enabled process improvements.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature area end -->

    <!-- about area start -->
    <div class="about-area pd-bottom-120">
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
                                <h2 class="title">WELCOME WORLD WIDE BEST
                                        TRANSPORT COMPANY</h2>
                                <p class="content left-line">Competently implement efficient e-commerce without cross-unit growth strategies.</p>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                        <ul class="list-inner-wrap mb-mb-0 mb-3 mb-lg-3 mb-xl-0">
                                            <li><img src="{{ asset('frontend/assets/img/icon/check.png')}}" alt="img"> Unlimited Revisions</li>
                                            <li><img src="{{ asset('frontend/assets/img/icon/check.png')}}" alt="img">Best Fitness Excercise</li>
                                            <li><img src="{{ asset('frontend/assets/img/icon/check.png')}}" alt="img">Combine Fitness and</li>
                                            <li><img src="{{ asset('frontend/assets/img/icon/check.png')}}" alt="img">Best Solutions</li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6 align-self-center">
                                        <div class="thumb"><img src="{{ asset('frontend/assets/img/about/3.png')}}" alt="img"></div>
                                    </div>
                                </div>
                                <div class="btn-wrap">
                                    <a class="btn btn-base" href="about.html">ABOUT MORE</a>
                                    <div class="author-wrap">
                                        <div class="thumb"><img src="{{ asset('frontend/assets/img/about/4.png')}}" alt="img"></div>
                                        <div class="details">
                                            <img src="{{ asset('frontend/assets/img/about/signature.png')}}" alt="img">
                                            <p>CEO, Of Company</p>
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
    <!-- about area end -->

    <!-- service area start -->
    <div class="service-area pd-top-115 pd-bottom-90 pb-lg-0" style="background: url({{ asset('frontend/assets/img/service/bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center">
                        <h4 class="subtitle style-2">SERVICES</h4>
                        <h2 class="title">OUR SERVICE FOR YOU</h2>
                        <p>Quickly optimize cooperative models for long-term high-impact ROI. Dynamically drive innovative e-commerce and distributed paradigms.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
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
                <div class="col-lg-4 col-md-6">
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
                <div class="col-lg-4 col-md-6">
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
            </div>
        </div>
    </div>
    <!-- service area end -->

    <!--wcu-area start-->
    <div class="wcu-area bg-overlay" style="background: url({{ asset('frontend/assets/img/wcu/bg.png')}});">
        <img class="img-1" src="{{ asset('frontend/assets/img/wcu/1.png')}}" alt="img">
        <img class="img-2" src="{{ asset('frontend/assets/img/wcu/2.png')}}" alt="img">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-6 order-lg-2">
                    <div class="video-thumb-wrap">
                        <img src="{{ asset('frontend/assets/img/wcu/video.png')}}" alt="img">
                        <a class="video-play-btn" href="https://www.youtube.com/embed/Wimkqo8gDZ0" data-effect="mfp-zoom-in"><i class="fa fa-play"></i></a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 order-lg-1">
                    <div class="section-title style-white mb-0">
                        <h4 class="subtitle style-2">WHY CHOOSE US</h4>
                        <h2 class="title">WHY CHOOSE FOR US</h2>
                        <p class="content">Dramatically enhance interactive metrics for reliable services. Proactively unleash fully researched e-commerce.</p>
                    </div>
                    <div class="single-wcu-wrap">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/img/wcu/icon-1.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h6>FAST TRANSPORTION SERVICE</h6>
                            <p>Enhance interactive metrics for reliable services. Proactively unleash fully researched.</p>
                        </div>
                    </div>
                    <div class="single-wcu-wrap">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/img/wcu/icon-2.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h6>24/7 ONLINE SUPPORT</h6>
                            <p>Enhance interactive metrics for reliable services. Proactively unleash fully researched.</p>
                        </div>
                    </div>
                    <div class="single-wcu-wrap">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/img/wcu/icon-3.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h6>SAFETY AND RELIABILITY</h6>
                            <p>Enhance interactive metrics for reliable services. Proactively unleash fully researched.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--wcu-area end-->

    <!--fact-area start-->
    <div class="container">
        <div class="fact-counter-area" style="background: url({{ asset('frontend/assets/img/fact/bg.png')}});">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="single-fact-wrap">
                        <h2><span class="counter">2000</span>+</h2>
                        <h5>PROJECT COMPLETE</h5>
                        <p>Conveniently impact front-end
                            niches via maintainable.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-fact-wrap">
                        <h2><span class="counter">100</span>+</h2>
                        <h5>BEST EMPLOYEES</h5>
                        <p>Conveniently impact front-end
                            niches via maintainable.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-fact-wrap">
                        <h2><span class="counter">450</span>+</h2>
                        <h5>WORLDWIDE CLIENTS</h5>
                        <p>Conveniently impact front-end
                            niches via maintainable.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-fact-wrap after-none">
                        <h2><span class="counter">80</span>+</h2>
                        <h5>WORLD AWARDS</h5>
                        <p>Conveniently impact front-end
                            niches via maintainable.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--fact-area end-->

    <!--team-area start-->
    <div class="team-area pd-top-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h4 class="subtitle">TEAM MEMBERS</h4>
                        <h2 class="title">OUR PROFESSIONAL TEAM</h2>
                        <p>Dramatically enhance interactive metrics for reliable services. Proactively unleash fully researched e-commerce.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="team-slider owl-carousel">
                        <div class="item">
                            <div class="single-team-wrap">
                                <div class="thumb">
                                    <img src="{{ asset('frontend/assets/img/team/1.png')}}" alt="img">
                                </div>
                                <div class="details">
                                    <h5>MICHEL RICHARD</h5>
                                    <p>Director & CEO</p>
                                    <div class="hover-icon">
                                        <i class="fa fa-plus"></i>
                                        <ul class="social-area">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-team-wrap">
                                <div class="thumb">
                                    <img src="{{ asset('frontend/assets/img/team/2.png')}}" alt="img">
                                </div>
                                <div class="details">
                                    <h5>ANJELINA ROSEE</h5>
                                    <p>Founder</p>
                                    <div class="hover-icon">
                                        <i class="fa fa-plus"></i>
                                        <ul class="social-area">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-team-wrap">
                                <div class="thumb">
                                    <img src="{{ asset('frontend/assets/img/team/3.png')}}" alt="img">
                                </div>
                                <div class="details">
                                    <h5>MISHEL MARSH</h5>
                                    <p>Co-Founder</p>
                                    <div class="hover-icon">
                                        <i class="fa fa-plus"></i>
                                        <ul class="social-area">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--team-area end-->

    <!--contact-area start-->
    <div class="call-to-contact-area pd-top-240" style="background: #F9F9F9;">
        <img src="{{ asset('frontend/assets/img/contact/1.png')}}" alt="img">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-6 col-lg-7">
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

    <!-- testimonial area start -->
    <div class="testimonial-area pd-top-115 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-0">
                        <h4 class="subtitle">TESTIMONIALS</h4>
                        <h2 class="title">OUR CLIENT’S FEEDBACK</h2>
                        <p class="content">Dramatically enhance interactive metrics for reliable services. Proactively unleash fully researched e-commerce.</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider owl-carousel">
                <div class="item">
                    <div class="single-testimonial-wrap">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/img/testimonial/quote.png')}}" alt="img">
                        </div>
                        <p>“Progressively strategize intermandated manufactured products after multidisci plinary sources. Conveniently iterate value-added systems with.”</p>
                        <div class="client-wrap">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/img/testimonial/1.png')}}" alt="img">
                            </div>
                            <div class="details">
                                <h5>ANJELINA MATHEUS</h5>
                                <p>Co-Founder</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-testimonial-wrap">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/img/testimonial/quote.png')}}" alt="img">
                        </div>
                        <p>“Progressively strategize intermandated manufactured products after multidisci plinary sources. Conveniently iterate value-added systems with.”</p>
                        <div class="client-wrap">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/img/testimonial/2.png')}}" alt="img">
                            </div>
                            <div class="details">
                                <h5>MONISH POUL</h5>
                                <p>Co-Founder</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-testimonial-wrap">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/img/testimonial/quote.png')}}" alt="img">
                        </div>
                        <p>“Progressively strategize intermandated manufactured products after multidisci plinary sources. Conveniently iterate value-added systems with.”</p>
                        <div class="client-wrap">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/img/testimonial/3.png')}}" alt="img">
                            </div>
                            <div class="details">
                                <h5>MICHEL CLACRK</h5>
                                <p>Co-Founder</p>
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
