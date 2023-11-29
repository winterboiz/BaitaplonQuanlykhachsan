@extends('frontend.master')
@section('content')
    {{--@if (Auth::guard('web')->check())--}}
        {{--<p class="text-success">--}}
            {{--You are Logged In as a <strong>USER</strong>--}}
        {{--</p>--}}
    {{--@else--}}
        {{--<p class="text-danger">--}}
            {{--You are Logged Out as a <strong>USER</strong>--}}
        {{--</p>--}}
    {{--@endif--}}
    {{--@if (Auth::guard('customer')->check())--}}
        {{--<p class="text-success">--}}
            {{--{{ Auth::guard('customer')->user()->tenkhachhang}}--}}
            {{--You are Logged In as a <strong>ADMIN</strong>--}}
        {{--</p>--}}
    {{--@else--}}
        {{--<p class="text-danger">--}}
            {{--You are Logged Out as a <strong>ADMIN</strong>--}}
        {{--</p>--}}
    {{--@endif--}}
    <section class="section-slider">
        <h1 class="element-invisible">Slider</h1>
        <div id="slider-revolution">
            <ul>
                <li data-transition="fade">
                    <img src="{{ asset('theme/asset/images/slider/img-5.jpg') }}" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">

                    <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="100" data-speed="700" data-start="1500" data-easing="easeOutBack">
                        <img src="{{ asset('theme/asset/images/slider/hom1-slide1.png') }}" alt="icons">
                    </div>

                    <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="240" data-speed="700" data-start="1500" data-easing="easeOutBack">
                        Chào Mừng Đến Với
                    </div>

                    <div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280" data-speed="700" data-easing="easeOutBack"  data-start="2000">THE LOTUS HOTEL</div>

                    <a href="#" class="tp-caption sfb fadeout awe-btn awe-btn-12 awe-btn-slider" data-x="center" data-y="380" data-easing="easeOutBack" data-speed="700" data-start="2200">TÌM HIỂU NGAY</a>
                </li>

                <li data-transition="fade">
                    <img src="{{ asset('theme/asset/images/slider/img-4.jpg') }}" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">

                    <div class="tp-caption sft fadeout" data-x="center" data-y="195" data-speed="700" data-start="1300" data-easing="easeOutBack">
                        <img src="{{ asset('theme/asset/images/icon-slider-1.png') }}" alt="">
                    </div>

                    <div class="tp-caption sft fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="220" data-speed="700" data-start="1500" data-easing="easeOutBack">
                        EACH HOTEL IS
                    </div>

                    <div class="tp-caption sfb fadeout slider-caption slider-caption-3" data-x="center" data-y="260" data-speed="700" data-easing="easeOutBack"  data-start="2000">
                        UNIQUE 60%
                    </div>

                    <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="365" data-easing="easeOutBack" data-speed="700" data-start="2200">GIỐNG NHƯ BẠN</div>

                    <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="395" data-easing="easeOutBack" data-speed="700" data-start="2400"><img src="{{ asset('theme/asset/images/icon-slider-2.png') }}" alt=""></div>
                </li>

            </ul>
        </div>

    </section>
    <!-- END / BANNER SLIDER -->

    <!-- CHECK AVAILABILITY -->
    <section class="section-check-availability">
        <div class="container">
            <div class="check-availability">
                <div class="row v-align">
                    <div class="col-lg-3">
                        <h2 class="title-room">Phòng & Giá</h2>
                    </div>
                    <div class="col-lg-9">
                        <form method="POST" id="checkroomform" action="{{ route('frontend.home.checkroom') }}" class="availability-form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="text" autocomplete="off" name="ngayden" id="ngayden" class="awe-calendar from" placeholder="Ngày Đến">
                            <input type="text" autocomplete="off"  name="ngaytra" id="ngaytra" class="awe-calendar to" placeholder="Ngày Trả">

                            <select class="awe-select required" >
                                <option value="" >Người Lớn</option>
                                <option >1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                            <select class="awe-select">
                                <option>Trẻ Em</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                            <div class="vailability-submit">
                                <button class="awe-btn awe-btn-13" type="submit">Tìm Phòng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / CHECK AVAILABILITY -->

    <!-- ACCOMMODATIONS -->
    <section class="section-accommo_1 bg-white">
        <div class="container">

            <div class="accomd-modations_1">

                <h2 class="heading">Loại Phòng</h2>

                <div class="accomd-modations-content_1" >

                    <div class="accomd-modations-slide_1" >

                        <!-- ITEM -->
                        <div class="accomd-modations-room_1">

                            <div class="img">
                                <a href="#"><img src="{{asset('theme/asset/images/room/img-7.jpg')}}" alt=""></a>
                            </div>

                            <div class="text">
                                <h2><a href="#">Phòng Đôi</a></h2>
                                <p class="desc">Tiện nghi,buffe ăn sáng,spa đẳng cấp</p>
                                <div class="wrap-price">
                                    <p class="price">
                                        <span class="amout">3.2 triệu</span> /Ngày
                                    </p>
                                    <a href="#" class="awe-btn awe-btn-default">Xem Ngay</a>
                                </div>
                            </div>

                        </div>
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <div class="accomd-modations-room_1">
                            <div class="img">
                                <a href="#"><img src="{{asset('theme/asset/images/room/img-8.jpg')}}" alt=""></a>
                            </div>
                            <div class="text">
                                <h2><a href="#">Phòng Hạng Sang</a></h2>
                                <p class="desc">Tiện Nghi,View biển</p>
                                <div class="wrap-price">
                                    <p class="price">
                                        <span class="amout">3.2 triệu</span> /Ngày
                                    </p>
                                    <a href="#" class="awe-btn awe-btn-default">Xem Ngay</a>
                                </div>
                            </div>
                        </div>
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <div class="accomd-modations-room_1">
                            <div class="img">
                                <a href="#"><img src="{{asset('theme/asset/images/room/img-9.jpg')}}" alt=""></a>
                            </div>
                            <div class="text">
                                <h2><a href="#">Phòng Chuẩn</a></h2>
                                <p class="desc">Tiện Nghi,View biển</p>
                                <div class="wrap-price">
                                    <p class="price">
                                        <span class="amout">3.2 triệu</span> /Ngày
                                    </p>
                                    <a href="#" class="awe-btn awe-btn-default">Xem ngay</a>
                                </div>
                            </div>
                        </div>
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <div class="accomd-modations-room_1">
                            <div class="img">
                                <a href="#"><img src="{{asset('theme/asset/images/room/img-7.jpg')}}" alt=""></a>
                            </div>
                            <div class="text">
                                <h2><a href="#">Phòng Đôi</a></h2>
                                <p class="desc">Dành cho cặp đôi</p>
                                <div class="wrap-price">
                                    <p class="price">
                                        <span class="amout">$320</span> /days
                                    </p>
                                    <a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
                                </div>
                            </div>
                        </div>
                        <!-- END / ITEM -->

                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- ACCOMMODATIONS -->

    <!-- SECTION GUESTBOOK - EVENT DEAD -->
    <section class="section-guestbook-event bg-white">
        <div class="container">

            <div class="guestbook-event">
                <div class="row">

                    <div class="col-md-6">

                        <h2 class="heading">Đánh Giá</h2>

                        <div class="guestbook-content_1 owl-single">

                            <!-- ITEM -->
                            <div class="guestbook-item_1">
                                <div class="img">
                                    <img src="{{asset('theme/asset/images/avatar/img-5.jpg')}}" alt="">
                                    <span><strong>Seelentag</strong>From Los Angeles, California</span>
                                </div>

                                <div class="text">
                                    <p>Sau chuyến đi, khách kể với chúng tôi về kỳ nghỉ của mình. Chúng tôi kiểm tra xem có ngôn từ bậy hay không, xác minh tính chân thực của tất cả đánh giá và sau đó đưa các đánh giá này lên trang web Booking.com.</p>
                                </div>
                            </div>
                            <!-- END / ITEM -->

                            <!-- ITEM -->
                            <div class="guestbook-item_1">
                                <div class="img">
                                    <img src="{{asset('theme/asset/images/avatar/img-5.jpg')}}" alt="">
                                    <span><strong>Seelentag</strong>From Los Angeles, California</span>
                                </div>

                                <div class="text">
                                    <p>Both the outstanding staff and the beautiful room made our first visit to Catalina Island such a success! We enjoyed the appetizers during "wine time", the turndown service, the fresh flowers in our room and the breakfast delivered to our room in a wicker basket.. An attendant set it out for us in a charming fashion. We would not consider another property when we return to Catalina!</p>
                                </div>
                            </div>
                            <!-- END / ITEM -->

                        </div>

                    </div>

                    <div class="col-md-6">
                        <h2 class="heading">Đánh Giá</h2>

                        <div class="event-slide owl-single">
                            <!-- ITEM -->
                            <div class="event-item">
                                <div class="img hover-zoom">
                                    <a href="#">
                                        <img src="{{asset('theme/asset/images/home/eventdeal/img-1.jpg')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM -->

                            <!-- ITEM -->
                            <div class="event-item">
                                <div class="img hover-zoom">
                                    <a href="#">
                                        <img src="{{asset('theme/asset/images/home/eventdeal/img-1.jpg')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- END / ITEM -->

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- END / SECTION GUESTBOOK - EVENT DEAD -->

    <!-- ABOUT -->
    <section class="section-home-about bg-white">
        <div class="container">
            <div class="home-about">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img">
                            <a href="#"><img src="{{asset('theme/asset/images/home/about/img-1.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text">
                            <h2 class="heading">Về Chúng tôi </h2>
                            <span>Chúng tôi muốn giới thiệu cho bạn một chút về chúng tôi</span>
                            <p>Chúng tôi muốn giới thiệu cho bạn một chút về chúng tôi – chúng tôi là ai, chúng tôi làm gì và những gì là quan trọng đối với chúng tôi.
                                 Và thậm chí còn có nhiều thông tin hơn nữa về chúng tôi! Bạn có thể theo các liên kết tại đây để tìm hiểu triết lý kinh doanh của chúng tôi, về đội bay đầy ấn tượng của chúng tôi và các cơ hội để BẠN có thể đến với Jetstar.</p>
                            <a href="#" class="awe-btn awe-btn-default">Xem Thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / ABOUT -->

    <!-- OUR BEST -->
    <section class="section-our-best bg-white">
        <div class="container">

            <div class="our-best">
                <div class="row">

                    <div class="col-md-6 col-md-push-6">
                        <div class="img">
                            <img src="{{ asset('theme/asset/images/home/ourbest/img-1.jpg') }}" alt="">
                        </div>
                    </div>

                    <div class="col-md-6 col-md-pull-6 ">
                        <div class="text">
                            <h2 class="heading">Chúng tôi là sự lựa chọn hoàn hảo</h2>
                            <p>Một trong những khách sạn được yêu thích nhất của Đảo được công nhận là một trong những khách sạn hàng đầu của Avalon với lòng hiếu khách của hòn đảo duyên dáng, tiện nghi chu đáo và đặc sắc.
                                amenities and distinctive .</p>
                            <ul>
                                <li><img src="{{ asset('theme/asset/images/home/ourbest/icon-3.png') }}" alt="icon">250 phòng 5*</li>
                                <li><img src="{{ asset('theme/asset/images/home/ourbest/icon-2.png') }}" alt="icon">Bar & Spa</li>
                                <li><img src="{{ asset('theme/asset/images/home/ourbest/icon-5.png') }}" alt="icon">Độ Sang trọng cao </li>
                                <li><img src="{{ asset('theme/asset/images/home/ourbest/icon-1.png') }}" alt="icon">Ăn Sáng Mỗi Ngày</li>
                                <li><img src="{{ asset('theme/asset/images/home/ourbest/icon-6.png') }}" alt="icon">View Biến</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- END / OUR BEST -->


@endsection


