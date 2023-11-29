@extends('frontend.master')
@section('content')
    <section class="section-sub-banner bg-16">

        <div class="awe-overlay"></div>

        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>RESERVATION</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing</p>
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
                        <li><a href="#"><span>1.</span> Choose Date</a></li>
                        <li class="active"><a href="#"><span>2.</span> Choose Room</a></li>
                        <li><a href="#"><span>3.</span> Make a Reservation</a></li>
                        <li><a href="#"><span>4.</span> Confirmation</a></li>
                    </ul>
                </div>
                <!-- END / STEP -->

                <div class="row">

                    <!-- SIDEBAR -->
                    <div class="col-md-4 col-lg-3">

                        <div class="reservation-sidebar">

                            <!-- ROOM SELECT -->
                            <div class="reservation-room-selected bg-gray">
                                <!-- HEADING -->
                                <h2 class="reservation-heading">Select Rooms</h2>
                                <!-- END / HEADING -->

                                <!-- CURRENT -->
                                <div class="reservation-room-seleted_current bg-blue">
                                    <h6>YOU ARE BOOKING ROOM 2</h6>
                                    <span>2 Adult, 1 Chirld</span>
                                </div>
                                <!-- CURRENT -->

                                <!-- ITEM -->
                                <div class="reservation-room-seleted_item reservation_disable">
                                    <h6>ROOM 2</h6> <span class="reservation-option">2 Adult, 1 Child</span>
                                </div>
                                <!-- END / ITEM -->

                            </div>
                            <!-- END / ROOM SELECT -->

                            <!-- SIDEBAR AVAILBBILITY -->
                            <div class="reservation-sidebar_availability bg-gray">

                                <!-- HEADING -->
                                <h2 class="reservation-heading">YOUR RESERVATION</h2>
                                <!-- END / HEADING -->

                                <h6 class="check_availability_title">your stay dates</h6>

                                <div class="check_availability-field">
                                    <label>Arrive</label>
                                    <input type="text" class="awe-calendar awe-input from" placeholder="Arrive" value="{{ $ngayden }}">
                                </div>

                                <div class="check_availability-field">
                                    <label>Depature</label>
                                    <input type="text" class="awe-calendar awe-input to" placeholder="Depature" value="{{ $ngaytra }}">
                                </div>

                                <h6 class="check_availability_title">ROOMS &amp; GUest</h6>

                                <div class="check_availability-field" style="display: none">
                                    <label>ROOMS</label>
                                    <select class="awe-select">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
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
                                <button class="awe-btn awe-btn-13">CHECK AVAILABLE</button>

                            </div>
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

                                            <h2 class="reservation-room_name"><a href="#">{{ $p['tenloaiphong'] }}</a></h2>

                                            <div class="reservation-room_img">
                                                <a href="#"><img src="{{asset('theme/asset/images/reservation/img-1.jpg')}}"
                                                                 alt=""></a>
                                            </div>

                                            <div id="book-room" class="reservation-room_text">

                                                <div class="reservation-room_desc">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                        since the 1500s, when an unknown printer took a galley of type ...</p>
                                                    <ul>
                                                        <li>1 King Bed</li>
                                                        <li>Free Wi-Fi in all guest rooms</li>
                                                        <li>Separate sitting area</li>

                                                    </ul>
                                                </div>

                                                <a href="#" class="reservation-room_view-more">View More Infomation</a>

                                                <div class="clear"></div>

                                                <p class="reservation-room_price">
                                                    <span class="reservation-room_amout">${{ $p['giatien'] }}</span> / days
                                                </p>

                                                <a id="btn-book" href="{{route('frontend.home.checkroom2',$p['id'])}}" data-id="{{ $p['id'] }}" type="submit" class="awe-btn awe-btn-default">BOOK ROOM</a>


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