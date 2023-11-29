@extends('adminlte::master')
@section('body')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Bảng Điều Khiển
                <small>Đặt phòng</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Đặt phòng</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="pull-right-container">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <button type="button" class="btn bg-olive btn-flat margin btn_add_user" data-toggle="modal" data-target="#add_datphong">
                                <i class="fa fa-plus" aria-hidden="true"></i> Đặt Phòng</button>
                        </div>
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4>Danh Sách Đặt Phòng</h4></div>
                            <div class="panel-body">
                                <table class="table-responsive table-bordered table-striped text-center" id="khachhang-table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Phòng Đặt</th>
                                        <th>Ngày Đặt</th>
                                        <th>Ngày Trả</th>
                                        <th>Trạng Thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                    </thead>
                                    {{--<tbody>--}}

                                    {{--@foreach($datphong as $dat)--}}
                                        {{--<tr>--}}
                                            {{--<td>{{ $dat->tenkhachhang }}</td>--}}


                                        {{--</tr>--}}

                                        {{--@endforeach--}}
                                    {{--</tbody>--}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.datphong.add')
            @include('admin.datphong.edit')
            @include('admin.datphong.show')
            @include('admin.datphong.delete')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/datphong.js') }}"></script>
    <script>
        $('#form_add_datphong').ready(function() {
            $('#phong_id').select2();
        });

        $(function() {
            $('#datetimepicker1').datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'DD-MM-YYYY'
            });
        });


        $(function(){
            datatables =  $('#khachhang-table').DataTable({
                processing: false,
                serverSide: true,
                autoWidth: false,
                searching: true,
                language: {
                    "lengthMenu": "Hiển thị _MENU_ bản ghi",
                    "zeroRecords": "Không có bản ghi nào được tìm thấy",
                    "emptyTable": "Không có bản ghi nào được hiển thị",
                    "processing": "Đang xử lý",
                    "search": "Tìm kiếm",
                    "paginate": {
                        "first": "Đầu tiên",
                        "last": "Cuối cùng",
                        "next": "<i class='fa fa-chevron-right' aria-hidden='true'></i>",
                        "previous": "<i class='fa fa-chevron-left' aria-hidden='true'></i>"
                    },
                    "info": "Trình bày _START_ - _END_ trong số _TOTAL_ mục",
                    "infoEmpty": "Trình bày 0 - 0 trong 0 mục"
                },
                ajax: {
                    url:" {{route('admin.datphong.data') }}",
                },
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'customer.tenkhachhang', name: 'customer.tenkhachhang'},
                    { data: 'phong.tenphong', name:'phong.tenphong'},
                    { data: 'ngaydat', name:'ngaydat'},
                    { data: 'ngaytra', name:'ngaytra'},
                    { data: 'tinhtrang', name:'tinhtrang'},
                    { data: 'action', name: 'action'}
                ]
            });

        });
    </script>
@endsection

