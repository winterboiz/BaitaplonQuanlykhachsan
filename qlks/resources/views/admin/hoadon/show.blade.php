@extends('adminlte::master')
@section('title','Thanh Toán')
@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section id="content" class="content">
            <div class="pull-right-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div id="invoiceheader" class="panel-heading"><h4>Hóa Đơn Trả
                                    Phòng {{ $hoadon->phieuthue->phong->tenphong }}</h4></div>
                            <div id="invoicebody" class="panel-body">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-md-4">Họ tên</label>
                                        <div class="col-md-8">{{$hoadon->customer->tenkhachhang}}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Số điện thoại</label>
                                        <div class="col-md-8">{{$hoadon->customer->dienthoai}}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Email</label>
                                        <div class="col-md-8">{{$hoadon->customer->email}}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Địa chỉ</label>
                                        <div class="col-md-8">{{$hoadon->customer->diachi}}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Tài khoản</label>
                                        <div class="col-md-8">
                                            @if ($hoadon->customer->username !== null)
                                                {{ $hoadon->customer->username }}
                                            @else
                                                Không
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Ngày Vào</label>
                                        <div class="col-md-8">{{Carbon\Carbon::parse($hoadon->phieuthue->ngaydat)->format('d/m/Y') }}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Ngày Dự Kiến Trả</label>
                                        <div class="col-md-8">{{Carbon\Carbon::parse($hoadon->phieuthue->ngaytra)->format('d/m/Y')}}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Ngày Trả</label>
                                        <div class="col-md-8">{{$mytime }}</div>
                                    </div>

                                    @php

                                          $ngaydat = Carbon\Carbon::parse($hoadon->phieuthue->ngaydat)->format('d');
                                        $day = abs($mytime->day - $ngaydat);
                                        $giaphong=0;
                                        if($day == 0){
                                             $giaphong += ($hoadon->phieuthue->phong->loaiphong->giatien * 1);
                                              $day = 1;
                                        }else{
                                            $giaphong += ($hoadon->phieuthue->phong->loaiphong->giatien * $day);

                                        }

                                    @endphp
                                    <div class="row">
                                        <label class="col-md-4">Tiền phòng</label>
                                        <div class="col-md-8">
                                            <table class="table table-responsive table-bordered">
                                                <thead>
                                                <th>Giá Phòng</th>
                                                <th>Số Ngày Thuê</th>
                                                <th>Thành Tiền</th>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{ $hoadon->phieuthue->phong->loaiphong->giatien }}</td>
                                                    <td>{{ $day }}</td>
                                                    <td>{{$giaphong}}</td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-responsive table-bordered ">
                                        <thead>
                                        <tr>
                                            <th>Tên Dịch Vụ</th>
                                            <th>Đơn Vị</th>
                                            <th>Số Lượng</th>
                                            <th>Giá</th>

                                        </tr>
                                        </thead>
                                        @php
                                            $totaldv = 0;
                                        @endphp
                                        <tbody>
                                        @if(isset($hoadon->phieuthue->sddichvu) && count($hoadon->phieuthue->sddichvu))
                                            @foreach($hoadon->phieuthue->sddichvu as $sddv)
                                                <tr>
                                                    <td>{{ $sddv->dichvu->tendichvu }}</td>
                                                    <td>{{ $sddv->dichvu->donvi }}</td>
                                                    <td>{{ $sddv->quantity }}</td>
                                                    <td>{{ $sddv->dichvu->gia }}</td>
                                                </tr>

                                            @endforeach
                                            @php

                                                $subtotal = $sddv->quantity * $sddv->dichvu->gia;
                                                $totaldv += $subtotal;
                                            @endphp
                                            <tr>
                                                <td colspan="3">Tổng tiền</td>
                                                <td>{{get_currency_vn($totaldv)}}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="4">Không có dịch vụ đã sử dụng</td>
                                            </tr>
                                        @endif
                                        </tbody>

                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        @php
                                            $maintotal = 0;
                                           $maintotal += $totaldv + $giaphong;
                                        @endphp
                                        <h3> Tổng tiền phải thanh toán
                                            <span><strong>{{ get_currency_vn($maintotal) }}</strong></span></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                {{--<form action="{{ route('admin.thuephong.hoadon') }}" method="post"--}}
                                      {{--enctype="multipart/form-data" style="display:inline;">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<input type="hidden" name="makhachhang" value="{{$checkin->khachhang_id}}">--}}
                                    {{--<input type="hidden" name="mathuephong" value="{{$checkin->id}}">--}}

                                    {{--<input type="hidden" name="maphong" value="{{$checkin->phong_id}}">--}}
                                    {{--<input type="hidden" name="tongtien" value="{{$maintotal}}">--}}
                                    {{--<input type="hidden" name="tiendichvu" value="{{$totaldv}}">--}}
                                    {{--<input type="hidden" name="tienphong" value="{{$giaphong}}">--}}
                                    {{--<button type="submit" class="btn btn-primary btn-sm" >Thanh Toán</button>--}}
                                {{--</form>--}}
                                <button id="inhoadon" class="btn btn-primary btn-sm">In hóa đơn</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/thuephong.js') }}"></script>
@endsection