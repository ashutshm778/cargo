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
                                <p class="content left-line">Prashant  Cargo & Logistics is one of the renowned service provider for packing and moving of goods. We are one of the known names in packers and movers industry. We work for domestic markets. Our aim is to provide maximum customer satisfaction. We always honour your commitments.</p>
                                <p>We are also engaged into lifting of heavy materials and placing them on trailers. We also engage into activities like LCV, FTL, trucks and trailers.</p>
                                <p></p>
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
                        <p>I am highly impressed with the professionalism and passion of people in this warehouse. I am also equally impressed with the "5S" principles followed in material storage. I am proud of you all. Keep it up.</p>
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
                        <p>Very well organized operations, modern warehouses are very neat & clean. My heartiest congratulation to Prashant Cargo & Logistics.</p>
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
                <div class="item">
                    <div class="single-testimonial-wrap">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/img/testimonial/quote.png')}}" alt="img">
                        </div>
                        <p>Good and nice packaging with delivery in minimal duration, having good responsibility.</p>
                        <div class="client-wrap">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/img/testimonial/3.png')}}" alt="img">
                            </div>
                            <div class="details">
                                <h5>Abhishek Patel</h5>
                                <p>Delhi</p>
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
