@extends('frontend.master')
@section('content')

    <!-- SUB BANNER -->
    <section class="section-sub-banner bg-16">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>Phòng Hạng Sang</h2>
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->

    <!-- ROOM DETAIL -->
    <section class="section-room-detail bg-white">
        <div class="container">

            <!-- DETAIL -->
            <div class="room-detail">
                <div class="row">
                    <div class="col-lg-9">

                        <!-- LAGER IMGAE -->
                        <div class="room-detail_img">
                            <div class="room_img-item">
                                <img src="{{ asset('theme/asset/images/room/detail/lager/img-1.jpg') }}" alt="">
                                <h6>Đây là mô tả</h6>
                            </div>
                            <div class="room_img-item">
                                <img src="{{ asset('theme/asset/images/room/detail/lager/img-2.jpg') }}" alt="">
                                <h6>Đây là mô tả</h6>
                            </div>
                            <div class="room_img-item">
                                <img src="{{ asset('theme/asset/images/room/detail/lager/img-3.jpg') }}" alt="">
                                <h6>Đây là mô tả</h6>
                            </div>
                            <div class="room_img-item">
                                <img src="{{ asset('theme/asset/images/room/detail/lager/img-5.jpg') }}" alt="">
                                <h6>Đây là mô tả</h6>
                            </div>
                            <div class="room_img-item">
                                <img src="{{ asset('theme/asset/images/room/detail/lager/img-6.jpg') }}" alt="">
                                <h6>Đây là mô tả</h6>
                            </div>
                            <div class="room_img-item">
                                <img src="{{ asset('theme/asset/images/room/detail/lager/img-7.jpg') }}" alt="">
                                <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                            </div>
                            <div class="room_img-item">
                                <img src="i{{ asset('theme/asset/images/room/detail/lager/img-5.jpg') }} alt="">
                                <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                            </div>
                        </div>
                        <!-- END / LAGER IMGAE -->

                        <!-- THUMBNAIL IMAGE -->
                        <div class="room-detail_thumbs">
                            <a href="#"><img src="{{asset('theme/asset/images/room/detail/img-2.jpg')}}" alt=""></a>
                            <a href="#"><img src="{{asset('theme/asset/images/room/detail/img-3.jpg')}}" alt=""></a>
                            <a href="#"><img src="{{asset('theme/asset/images/room/detail/img-4.jpg')}}" alt=""></a>
                            <a href="#"><img src="{{asset('theme/asset/images/room/detail/img-5.jpg')}}" alt=""></a>
                            <a href="#"><img src="{{asset('theme/asset/images/room/detail/img-9.jpg')}}" alt=""></a>
                            <a href="#"><img src="{{asset('theme/asset/images/room/detail/img-8.jpg')}}" alt=""></a>
                            <a href="#"><img src="{{asset('theme/asset/images/room/detail/img-7.jpg')}}" alt=""></a>
                            <a href="#"><img src="{{asset('theme/asset/images/room/detail/img-6.jpg')}}" alt=""></a>
                        </div>
                        <!-- END / THUMBNAIL IMAGE -->

                    </div>

                    <div class="col-lg-3">

                        <!-- FORM BOOK -->
                        <div class="room-detail_book">

                            <div class="room-detail_total">
                                <img src="images/icon-logo.png" alt="" class="icon-logo">

                                <h6>Giá chỉ từ</h6>

                                <p class="price">
                                    <span class="amout">2.3 Triệu VND</span>  /ngày
                                </p>
                            </div>
                            <form method="POST" id="checkroomform" action="{{ route('frontend.home.checkroom') }}" >
                                {{ csrf_field() }}
                            <div class="room-detail_form">

                                <label>Ngày Đặt</label>
                                <input type="text" class="awe-calendar from" name="ngayden" id="ngayden" placeholder="Ngày Đặt">
                                <label>Ngày Tra</label>
                                <input type="text" class="awe-calendar to" name="ngaytra" id="ngaytra"  placeholder="Ngay Trả">
                                <label>Người Lớn</label>
                                <select class="awe-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option selected>3</option>
                                    <option>4</option>
                                </select>
                                <label>Trẻ Em</label>
                                <select class="awe-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option selected>3</option>
                                    <option>4</option>
                                </select>
                                <button class="awe-btn awe-btn-13" type="submit">Đặt Ngay</button>
                            </div>
                            </form>
                        </div>
                        <!-- END / FORM BOOK -->

                    </div>
                </div>
            </div>
            <!-- END / DETAIL -->

            <!-- TAB -->
            <div class="room-detail_tab">

                <div class="row">
                    <div class="col-md-3">
                        <ul class="room-detail_tab-header">
                            <li class="active"><a href="#overview" data-toggle="tab">Tổng Quan</a></li>

                        </ul>
                    </div>

                    <div class="col-md-9">
                        <div class="room-detail_tab-content tab-content">

                            <!-- OVERVIEW -->
                            <div class="tab-pane fade active in" id="overview">

                                <div class="room-detail_overview">
                                    <h5 class='text-uppercase
                                        '>Giới thiệu phòng</h5>
                                    <p> Đây là mô tả.</p>

                                    <div class="row">
                                        <div class="col-xs-6 col-md-4">
                                            <h6>Thông tin phòng chung</h6>
                                            <ul>
                                                <li>Tối Đa 4 Người</li>
                                                <li>Diện Tích: 35 m2 / 376 ft2</li>
                                                <li>View: Biển</li>
                                                <li>Giường lớn kèm 2 giường nhỏ</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <h6>Dịch Vụ phòng</h6>
                                            <ul>
                                                <li>Bàn lớn làm viện</li>
                                                <li>Buffe ăn sáng miễn phí</li>
                                                <li>Bếp nấu riêng</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- END / OVERVIEW -->

                            <!-- AMENITIES -->
                            <div class="tab-pane fade " id="amenities">

                                <div class="room-detail_amenities">
                                    <p>Located in the heart of Aspen with a unique blend of contemporary luxury and historic heritage, deluxe accommodations, superb amenities, genuine hospitality and dedicated service for an elevated experience in the Rocky Mountains.</p>

                                    <div class="row">
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>LIVING ROOM</h6>
                                            <ul>
                                                <li>Oversized work desk</li>
                                                <li>Hairdryer</li>
                                                <li>Iron/ironing board upon request</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>KITCHEN ROOM</h6>
                                            <ul>
                                                <li>AM/FM clock radio</li>
                                                <li>Voicemail</li>
                                                <li>High-speed Internet access</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>balcony</h6>
                                            <ul>
                                                <li>AM/FM clock radio</li>
                                                <li>Voicemail</li>
                                                <li>High-speed Internet access</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>bedroom</h6>
                                            <ul>
                                                <li>Coffee maker</li>
                                                <li>25 inch or larger TV</li>
                                                <li>Cable/satellite TV channels</li>
                                                <li>AM/FM clock radio</li>
                                                <li>Voicemail</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>bathroom</h6>
                                            <ul>
                                                <li>Dataport</li>
                                                <li>Phone access fees waived</li>
                                                <li>24-hour Concierge service</li>
                                                <li>Private concierge</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>Oversized work desk</h6>
                                            <ul>
                                                <li>Dataport</li>
                                                <li>Phone access fees waived</li>
                                                <li>24-hour Concierge service</li>
                                                <li>Private concierge</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- END / AMENITIES -->

                            <!-- PACKAGE -->
                            <div class="tab-pane fade" id="package">

                                <div class="room-detail_package">

                                    <!-- ITEM package -->
                                    <div class="room-package_item">

                                        <div class="text">
                                            <h4><a href="#">package standar</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>

                                            <div class="room-package_price">
                                                <p class="price">
                                                    <span class="amout">$260</span> / Package
                                                </p>
                                                <a href="#" class="awe-btn awe-btn-default">Book package</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END / ITEM package -->

                                    <!-- ITEM package -->
                                    <div class="room-package_item">

                                        <div class="text">
                                            <h4><a href="#">package standar</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>

                                            <div class="room-package_price">
                                                <p class="price">
                                                    <span class="amout">$260</span> / Package
                                                </p>
                                                <a href="#" class="awe-btn awe-btn-default">Book package</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END / ITEM package -->

                                    <!-- ITEM package -->
                                    <div class="room-package_item">

                                        <div class="text">
                                            <h4><a href="#">package standar</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>

                                            <div class="room-package_price">
                                                <p class="price">
                                                    <span class="amout">$260</span> / Package
                                                </p>
                                                <a href="#" class="awe-btn awe-btn-default">Book package</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END / ITEM package -->
                                </div>

                            </div>
                            <!-- END / PACKAGE -->

                            <!-- RATES -->
                            <div class="tab-pane fade" id="rates">

                                <div class="room-detail_rates">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Rate Period</th>
                                            <th>Nightly</th>
                                            <th>Weekend Night</th>
                                            <th>Weekly</th>
                                            <th>Monthly</th>
                                            <th>Event</th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <td>
                                                <h6>Spring/Summer Season</h6>
                                                <ul>
                                                    <li>Jun 1 - Aug 31</li>
                                                    <li>3 night minimum stay</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$320</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$23</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$120</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$100</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$89</span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>Summer/Fall Season</h6>
                                                <ul>
                                                    <li>Jun 1 - Aug 31</li>
                                                    <li>3 night minimum stay</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$320</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$23</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$120</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$100</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$89</span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>Christmas Season</h6>
                                                <ul>
                                                    <li>Jun 1 - Aug 31</li>
                                                    <li>3 night minimum stay</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$320</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$23</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$120</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$100</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$89</span></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <!-- END / RATES -->

                            <!-- CALENDAR -->
                            <div class="tab-pane fade" id="calendar">

                                <div class="room-detail_calendar-wrap row">

                                    <div class="col-sm-6">
                                        <!-- CALENDAR ITEM -->
                                        <div class="calendar_custom">

                                            <div class="calendar_title">
                                                <span class="calendar_month">JUNE</span>
                                                <span class="calendar_year">2015</span>

                                                <a href="#" class="calendar_prev calendar_corner"><i class="lotus-icon-left-arrow"></i></a>
                                            </div>

                                            <table class="calendar_tabel">

                                                <thead>
                                                <tr>
                                                    <th>Su</th>
                                                    <th>Mo</th>
                                                    <th>Tu</th>
                                                    <th>We</th>
                                                    <th>Th</th>
                                                    <th>Fr</th>
                                                    <th>Sa</th>
                                                </tr>
                                                </thead>

                                                <tr>
                                                    <td></td>
                                                    <td class="apb-calendar_current-date">
                                                        <a href="#"><small>1</small></a>
                                                    </td>
                                                    <td><a href="#"><small>2</small></a></td>
                                                    <td><a href="#"><small>3</small></a></td>
                                                    <td><a href="#"><small>4</small></a></td>
                                                    <td><a href="#"><small>5</small></a></td>
                                                    <td><a href="#"><small>6</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>7</small></a></td>
                                                    <td><a href="#"><small>8</small></a></td>
                                                    <td><a href="#"><small>9</small></a></td>
                                                    <td><a href="#"><small>10</small></a></td>
                                                    <td class="apb-calendar_current-select"><a href="#"><small>11</small></a></td>
                                                    <td class="apb-calendar_current-select"><a href="#"><small>12</small></a></td>
                                                    <td><a href="#"><small>13</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>14</small></a></td>
                                                    <td><a href="#"><small>15</small></a></td>
                                                    <td class="not-available"><a href="#"><small>16</small></a></td>
                                                    <td class="not-available"><a href="#"><small>17</small></a></td>
                                                    <td><a href="#"><small>18</small></a></td>
                                                    <td><a href="#"><small>19</small></a></td>
                                                    <td><a href="#"><small>20</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>21</small></a></td>
                                                    <td><a href="#"><small>22</small></a></td>
                                                    <td><a href="#"><small>23</small></a></td>
                                                    <td><a href="#"><small>24</small></a></td>
                                                    <td><a href="#"><small>25</small></a></td>
                                                    <td><a href="#"><small>26</small></a></td>
                                                    <td><a href="#"><small>27</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>28</small></a></td>
                                                    <td><a href="#"><small>29</small></a></td>
                                                    <td><a href="#"><small>30</small></a></td>
                                                    <td><a href="#"><small>31</small></a></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </table>

                                        </div>
                                        <!-- END CALENDAR ITEM -->
                                    </div>

                                    <div class="col-sm-6">

                                        <!-- CALENDAR ITEM -->
                                        <div class="calendar_custom">

                                            <div class="calendar_title">
                                                <span class="calendar_month">JUNE</span>
                                                <span class="calendar_year">2015</span>

                                                <a href="#" class="calendar_next calendar_corner"><i class="lotus-icon-right-arrow"></i></a>
                                            </div>

                                            <table class="calendar_tabel">

                                                <thead>
                                                <tr>
                                                    <th>Su</th>
                                                    <th>Mo</th>
                                                    <th>Tu</th>
                                                    <th>We</th>
                                                    <th>Th</th>
                                                    <th>Fr</th>
                                                    <th>Sa</th>
                                                </tr>
                                                </thead>

                                                <tr>
                                                    <td></td>
                                                    <td class="apb-calendar_current-date">
                                                        <a href="#"><small>1</small></a>
                                                    </td>
                                                    <td><a href="#"><small>2</small></a></td>
                                                    <td><a href="#"><small>3</small></a></td>
                                                    <td><a href="#"><small>4</small></a></td>
                                                    <td><a href="#"><small>5</small></a></td>
                                                    <td><a href="#"><small>6</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>7</small></a></td>
                                                    <td><a href="#"><small>8</small></a></td>
                                                    <td><a href="#"><small>9</small></a></td>
                                                    <td><a href="#"><small>10</small></a></td>
                                                    <td class="apb-calendar_current-select"><a href="#"><small>11</small></a></td>
                                                    <td class="apb-calendar_current-select"><a href="#"><small>12</small></a></td>
                                                    <td><a href="#"><small>13</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>14</small></a></td>
                                                    <td><a href="#"><small>15</small></a></td>
                                                    <td class="not-available"><a href="#"><small>16</small></a></td>
                                                    <td class="not-available"><a href="#"><small>17</small></a></td>
                                                    <td><a href="#"><small>18</small></a></td>
                                                    <td><a href="#"><small>19</small></a></td>
                                                    <td><a href="#"><small>20</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>21</small></a></td>
                                                    <td><a href="#"><small>22</small></a></td>
                                                    <td><a href="#"><small>23</small></a></td>
                                                    <td><a href="#"><small>24</small></a></td>
                                                    <td><a href="#"><small>25</small></a></td>
                                                    <td><a href="#"><small>26</small></a></td>
                                                    <td><a href="#"><small>27</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>28</small></a></td>
                                                    <td><a href="#"><small>29</small></a></td>
                                                    <td><a href="#"><small>30</small></a></td>
                                                    <td><a href="#"><small>31</small></a></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </table>

                                        </div>
                                        <!-- END CALENDAR ITEM -->
                                    </div>

                                    <div class="calendar_status text-center col-sm-12">
                                        <span>Available</span>
                                        <span class="not-available">Not Available</span>
                                    </div>
                                </div>

                            </div>
                            <!-- END / CALENDAR -->

                        </div>
                    </div>

                </div>

            </div>
            <!-- END / TAB -->

            <!-- COMPARE ACCOMMODATION -->
            <div class="room-detail_compare">
                <h2 class="room-compare_title">COMPARE ACCOMMODATION</h2>

                <div class="room-compare_content">

                    <div class="row">
                        <!-- ITEM -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="room-compare_item">
                                <div class="img">
                                    <a href="#"><img src="{{asset('theme/asset/images/room/detail/compare/img-1.jpg')}}" alt=""></a>
                                </div>

                                <div class="text">
                                    <h2><a href="">Phòng Hạng Sang</a></h2>

                                    <ul>
                                        <li><i class="lotus-icon-person"></i> Tối đa: 2 Người(s)</li>
                                        <li><i class="lotus-icon-bed"></i> Giường Lớn Hoàng Gia</li>
                                        <li><i class="lotus-icon-view"></i> View: Biển</li>
                                    </ul>

                                    <a href="#" class="awe-btn awe-btn-default">Xem Chi tiết</a>

                                </div>

                            </div>
                        </div>
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="room-compare_item">
                                <div class="img">
                                    <a href="#"><img src="{{asset('theme/asset/images/room/detail/compare/img-2.jpg')}}" alt=""></a>
                                </div>

                                <div class="text">
                                    <h2><a href="">Phòng Gia Đình</a></h2>

                                    <ul>
                                        <li><i class="lotus-icon-person"></i> Tối đa: 2 Người(s)</li>
                                        <li><i class="lotus-icon-bed"></i> Giường Lớn Hoàng Gia</li>
                                        <li><i class="lotus-icon-view"></i> View: Biển</li>
                                    </ul>

                                    <a href="#" class="awe-btn awe-btn-default">Xem Chi tiết</a>

                                </div>

                            </div>
                        </div>
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="room-compare_item">
                                <div class="img">
                                    <a href="#"><img src="{{asset('theme/asset/images/room/detail/compare/img-3.jpg')}}" alt=""></a>
                                </div>

                                <div class="text">
                                    <h2><a href="">Phòng Chuẩn</a></h2>

                                    <ul>
                                        <li><i class="lotus-icon-person"></i> Tối đa: 2 Người(s)</li>
                                        <li><i class="lotus-icon-bed"></i> Giường Lớn Hoàng Gia</li>
                                        <li><i class="lotus-icon-view"></i> View: Biển</li>
                                    </ul>

                                    <a href="#" class="awe-btn awe-btn-default">Xem Chi tiết</a>

                                </div>

                            </div>
                        </div>
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="room-compare_item">
                                <div class="img">
                                    <a href="#"><img src="{{asset('theme/asset/images/room/detail/compare/img-4.jpg')}}" alt=""></a>
                                </div>

                                <div class="text">
                                    <h2><a href="">Phòng Đôi</a></h2>

                                    <ul>
                                        <li><i class="lotus-icon-person"></i> Tối đa: 2 Người(s)</li>
                                        <li><i class="lotus-icon-bed"></i> Giường Lớn Hoàng Gia</li>
                                        <li><i class="lotus-icon-view"></i> View: Biển</li>
                                    </ul>

                                    <a href="#" class="awe-btn awe-btn-default">Xem Chi tiết</a>

                                </div>

                            </div>
                        </div>
                        <!-- END / ITEM -->
                    </div>

                </div>
            </div>
            <!-- END / COMPARE ACCOMMODATION -->

        </div>
    </section>
    <!-- END / SHOP DETAIL -->








@endsection