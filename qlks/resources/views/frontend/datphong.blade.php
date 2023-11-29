@extends('frontend.master')
@section('content')
    <section class="section-sub-banner bg-16">

        <div class="awe-overlay"></div>

        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>Đặt Phòng</h2>
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->

    <!-- RESERVATION -->
    <section class="section-reservation-page bg-white">

        <div class="container">
            <div class="reservation-page">

                <!-- STEP -->
                <div class="reservation_step">
                    <ul>
                        <li><a href="#"><span>1.</span> Chọn ngày</a></li>
                        <li class="active"><a href="#"><span>2.</span> Chọn phòng</a></li>
                        <li><a href="#"><span>3.</span>Điền Thông Tin</a></li>
                        <li><a href="#"><span>4.</span> Xác Nhận</a></li>
                    </ul>
                </div>
                <!-- END / STEP -->

                <div class="row">

                    <!-- SIDEBAR -->
                    <div class="col-md-4 col-lg-3">

                        <div class="reservation-sidebar">

                            {{--<!-- ROOM SELECT -->--}}
                            {{--<div class="reservation-room-selected bg-gray">--}}
                                {{--<!-- HEADING -->--}}
                                {{--<h2 class="reservation-heading">Select Rooms</h2>--}}
                                {{--<!-- END / HEADING -->--}}

                                {{--<!-- CURRENT -->--}}
                                {{--<div class="reservation-room-seleted_current bg-blue">--}}
                                    {{--<h6>YOU ARE BOOKING ROOM 2</h6>--}}
                                    {{--<span>2 Adult, 1 Chirld</span>--}}
                                {{--</div>--}}
                                {{--<!-- CURRENT -->--}}

                                {{--<!-- ITEM -->--}}
                                {{--<div class="reservation-room-seleted_item reservation_disable">--}}
                                    {{--<h6>ROOM 2</h6> <span class="reservation-option">2 Adult, 1 Child</span>--}}
                                {{--</div>--}}
                                {{--<!-- END / ITEM -->--}}

                            {{--</div>--}}
                            {{--<!-- END / ROOM SELECT -->--}}

                            <!-- SIDEBAR AVAILBBILITY -->
                            <form method="post" action="{{route('frontend.home.checkinfo')}}" class="reservation-sidebar_availability bg-gray">
                             {{ csrf_field() }}
                            <!-- HEADING -->
                                <h2 class="reservation-heading">ĐẶT PHÒNG CỦA BẠN</h2>
                                <!-- END / HEADING -->

                                <h6 class="check_availability_title">Ngày ở</h6>

                                <div class="check_availability-field">
                                    <label>Ngày Đặt</label>
                                    <input type="text" name="ngayden" class="awe-calendar awe-input from" placeholder="Ngày Đặt" value="{{ $ngayden }}">
                                </div>

                                <div class="check_availability-field">
                                    <label>Ngày Trả</label>
                                    <input type="text" name="ngaytra" class="awe-calendar awe-input to" placeholder="Ngày Trả" value="{{ $ngaytra }}">
                                </div>

                                <h6 class="check_availability_title">Phòng & Số Người</h6>

                                <div class="check_availability-field" style="display: none">
                                    <label>ROOMS</label>
                                    <select id="selectroom" name="maphong"class="">
                                        {{--<option>1</option>--}}
                                        {{--<option>2</option>--}}
                                        {{--<option>3</option>--}}
                                        {{--<option>4</option>--}}
                                        {{--<option>5</option>--}}
                                        {{--<option>6</option>--}}
                                    </select>
                                </div>

                                {{--<div class="check_availability_group">--}}

                                    {{--<span class="label-group">ROOM 1</span>--}}

                                    {{--<div class="check_availability-field_group">--}}

                                        {{--<div class="check_availability-field">--}}
                                            {{--<label>Adult</label>--}}
                                            {{--<select class="awe-select">--}}
                                                {{--<option>1</option>--}}
                                                {{--<option>2</option>--}}
                                                {{--<option>3</option>--}}
                                                {{--<option>4</option>--}}
                                                {{--<option>5</option>--}}
                                                {{--<option>6</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}

                                        {{--<div class="check_availability-field">--}}
                                            {{--<label>Chirld</label>--}}
                                            {{--<select class="awe-select">--}}
                                                {{--<option>1</option>--}}
                                                {{--<option>2</option>--}}
                                                {{--<option>3</option>--}}
                                                {{--<option>4</option>--}}
                                                {{--<option>5</option>--}}
                                                {{--<option>6</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}

                                    {{--</div>--}}

                                {{--</div>--}}
                                <button type="submit" class="awe-btn awe-btn-13">Đặt phòng</button>

                            </form>
                            <!-- END / SIDEBAR AVAILBBILITY -->

                        </div>

                    </div>
                    <!-- END / SIDEBAR -->

                    <!-- CONTENT -->
                    <div class="col-md-8 col-lg-9">

                        <div class="reservation_content">
                            <!-- RESERVATION ROOM -->
                            <div class="reservation-room">
                            @if(isset($phong) && count($phong))
                                @foreach($phong as $p)
                                <!-- ITEM -->
                                <div class="reservation-room_item">

                                    <h2 class="reservation-room_name"><a href="#">{{ $p->tenloaiphong }}</a></h2>

                                    <div class="reservation-room_img">
                                        <a href="#"><img src="{{asset('theme/asset/images/reservation/img-1.jpg')}}"
                                                         alt=""></a>
                                    </div>

                                    <div id="book-room" class="reservation-room_text">

                                        <div class="reservation-room_desc">
                                            <p>Nhiều tiện ích đi kiềm với dịch vụ chuẩn mực ...</p>
                                            <ul>
                                                <li>1 Giường lớn</li>
                                                <li>Miễn Phí ăn sáng</li>
                                                <li>View biển</li>

                                            </ul>
                                        </div>

                                        <a href="#" class="reservation-room_view-more">Xem Thêm Thông tin</a>

                                        <div class="clear"></div>

                                        <p class="reservation-room_price">
                                            <span class="reservation-room_amout">$ {{ get_currency_vn($p->giatien) }}</span> / Ngày
                                        </p>

                                        <a id="btn-book" data-id="{{ $p->id }}" type="submit" class="awe-btn awe-btn-default">Đặt Ngay</a>


                                    </div>
                                </div>
                                @endforeach
                                @endif
                                <!-- END / ITEM -->

                            </div>
                            <!-- END / RESERVATION ROOM -->

                        </div>

                    </div>
                    <!-- END / CONTENT -->

                </div>
            </div>
        </div>

    </section>
@endsection