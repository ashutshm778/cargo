@extends('backend.layouts.app')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10" style="background: #e9e8e866;">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Track Order</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-body">
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
                                                        <span class="edd_day sfproBold fs-20px mb-0">Thursday</span>
                                                        <span class="edd_month sfproBold" id="edd_month">October</span>
                                                        <strong class="edd_date SFProSemibold fs-107px mb-0">05<span
                                                                class="year_txt">2023</span></strong>
                                                    </div>
                                                </div>

                                                <span class="SFProSemibold fs-16px"
                                                    id="shipment_status_label">Status:</span>
                                                <p class="SFProRegular" id="shipment_status">
                                                    <img class="status_icon"
                                                        src="{{ asset('frontend/assets/img/delivered.svg') }}">
                                                    <span class="status_green">Delivered</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="bgg">
                                    <div class="courier_info clearfix">
                                        <div class="pull-left courier_logo"
                                            style="background-image: url('{{ asset('frontend/assets/img/favicon.png') }}');background-repeat: no-repeat;">

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
                                        <div class="delievery_list_wrap clearfix">
                                            <ul>
                                                <li class="active">
                                                    <span class="fs-12px SFProMedium"><b>Activity : </b>
                                                        <activity>Delivered</activity>
                                                    </span>
                                                    <span class="fs-12px SFProMedium"><b>Location : </b>
                                                        <activity>Malkapur, Malkapur, MAHARASHTRA</activity>
                                                    </span>
                                                    <!-- Delivered or RTO delivered -->
                                                    <!-- <i class="check_delievery"></i> -->
                                                    <!-- undelivered -->
                                                    <div class="date_info_wrap fs-12px SFProMedium">
                                                        <span class="date">05 Oct</span>
                                                        <span class="time">07:24 PM</span>
                                                    </div>
                                                    <i class="circle_icon"></i>
                                                </li>

                                                <li>
                                                    <span class="fs-12px SFProMedium"><b>Activity : </b>
                                                        <activity>InTransit Shipment added in Bag nxb-c48241766</activity>
                                                    </span>
                                                    <span class="fs-12px SFProMedium"><b>Location : </b>
                                                        <activity>Varanasi, VARANASI, UTTAR PRADESH</activity>
                                                    </span>
                                                    <!-- Delivered or RTO delivered -->
                                                    <!-- undelivered -->
                                                    <div style="padding-left: 5px;"
                                                        class="date_info_wrap fs-12px SFProMedium">
                                                        <span class="date">25 Sep</span>
                                                        <span class="time">08:40 PM</span>
                                                    </div>
                                                    <i class="circle_icon"></i>
                                                </li>
                                                <li>
                                                    <span class="fs-12px SFProMedium"><b>Activity : </b>
                                                        <activity>InTransit Shipment added in Bag nxb-c48241766</activity>
                                                    </span>
                                                    <span class="fs-12px SFProMedium"><b>Location : </b>
                                                        <activity>Varanasi, VARANASI, UTTAR PRADESH</activity>
                                                    </span>
                                                    <!-- Delivered or RTO delivered -->
                                                    <!-- undelivered -->
                                                    <div class="date_info_wrap fs-12px SFProMedium">
                                                        <span class="date">25 Sep</span>
                                                        <span class="time">08:40 PM</span>
                                                    </div>
                                                    <i class="circle_icon"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end page wrapper -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
