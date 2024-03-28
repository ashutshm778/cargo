@extends('frontend.layouts.front_app')
@section('content')
<div class="content">
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2"
        style="background-image:url('{{ asset('frontend/assets/img/banner/breadcrumb.png') }}')">
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
                <form method="GET" action="{{route('track_order')}}">
                <div class="row">
                    <div class="col-md-8 col-sm-12 m-auto">
                        <div class="user-section">
                            <div class="user-all-form">
                                <div class="contact-form">
                                    <div class="widget widget_subscribe">
                                        <div class="single-subscribe-inner">

                                            <input type="text" name="tracking_code" placeholder="Enter Order No." value="{{request('tracking_code')}}" required>
                                            <button type="submit" class="btn btn-base" href="#">Track Order <i class="fa fa-paper-plane"></i></button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                @if(!empty($booking->id))
                    <div class="row mt-3">
                        <div class="col-sm-4 col-xs-12 inner_page">
                            <div class="hp_cards mt-0 mb-3">
                                <div class="hp_cards_info">
                                    <div class="clearfix  delievery_status">
                                        <div class="status_cont">
                                            <div class="status_check clearfix">
                                                <span class="status-css">Delivered On</span>
                                                <hr>
                                                <div class="edd_info">
                                                    <span class="edd_day sfproBold fs-20px mb-0">{{ \Carbon\Carbon::parse($booking->edd)->format('D') }}</span>
                                                    <span class="edd_month sfproBold" id="edd_month">{{ \Carbon\Carbon::parse($booking->edd)->format('M') }}</span>
                                                    <strong class="edd_date SFProSemibold fs-107px mb-0">{{ \Carbon\Carbon::parse($booking->edd)->format('d') }}<span
                                                            class="year_txt">{{ \Carbon\Carbon::parse($booking->edd)->format('Y') }}</span></strong>
                                                </div>
                                            </div>

                                            <span class="SFProSemibold fs-16px"
                                                id="shipment_status_label">Status:</span>
                                            <p class="SFProRegular" id="shipment_status">
                                                <img class="status_icon"
                                                    src="{{ asset('frontend/assets/img/delivered.svg') }}">
                                                <span class="status_green">{{strtoupper(str_replace('_',' ',$booking->status))}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="">
                                <div class="courier_info clearfix">
                                    <div class="pull-left courier_logo"
                                        style="background-image: url('{{ asset('frontend/assets/img/favicon.png')}}');background-repeat: no-repeat;">

                                    </div>
                                    <div class="pull-left">
                                        <span class="fs-17px SFProSemibold"><b>Prashant Cargo & Logistics</b></span>
                                        <!-- <a href="#" class="tracking_id">Support?</a> -->
                                    </div>
                                    <div class="pull-right trackingid_mobile">
                                        <span class="sfproBold" style="font-size: 13px;"><b>Tracking ID</b> </span>
                                        <span class="tracking_id fs-12px sfproBold">{{$booking->tracking_code}}</span>
                                    </div>
                                </div>
                                <div class="delievery_info pt-0 ulli_border">
                                    <div class="delievery_list_wrap clearfix" >
                                        <ul>
                                            @foreach($booking->booking_log as $log)
                                                <li>
                                                    <span class="fs-12px SFProMedium"><b>Activity : </b>
                                                        <activity>{{$log->action}}</activity>
                                                    </span>
                                                    <span class="fs-12px SFProMedium"><b>Location : </b>
                                                        <activity>
                                                            @if($log->status == 'order_created')
                                                            @php $pincode_data=App\Models\Pincode::where('pincode',$booking->from)->first(); @endphp
                                                            {{$pincode_data->pincode}},{{$pincode_data->city}},{{$pincode_data->state}}
                                                            @endif
                                                        </activity>
                                                    </span>
                                                    <!-- Delivered or RTO delivered -->
                                                    <!-- undelivered -->
                                                    <div class="date_info_wrap fs-12px SFProMedium">
                                                        <span class="date">{{ \Carbon\Carbon::parse($log->created_at)->format('d M') }}</span>
                                                        <span class="time">{{ \Carbon\Carbon::parse($log->created_at)->format('h:i A') }}</span>
                                                    </div>
                                                    <i class="circle_icon"></i>
                                                </li>
                                                @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
