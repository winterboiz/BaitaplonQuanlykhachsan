@extends('adminlte::master')
@section('body')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Bảng điều khiển
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Bảng điều khiển</li>
            </ol>
        </section>
        <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{ $order }}</h3>

                                <p>Đơn đặt phòng mới</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{ $phong }}<sup style="font-size: 20px"></sup></h3>

                                <p>Phòng đang thuê</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{$phongtrong}}</h3>

                                <p>Phòng Trống</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{ get_currency_vn($tongtien) }}</h3>

                                <p>Tổng doanh thu</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
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
                    {{--You are Logged In as a <strong>ADMIN</strong>--}}
                {{--</p>--}}
            {{--@else--}}
                {{--<p class="text-danger">--}}
                    {{--You are Logged Out as a <strong>ADMIN</strong>--}}
                {{--</p>--}}
            {{--@endif--}}
            {{--Đây Là Dashboard--}}

        </section>

    </div>



@endsection
