@extends('adminlte::master')
@section('body')
    @include('sweetalert::alert')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Bảng Điều khiển
                <small>Quản lý Danh Mục Phòng</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-header">
                                <h3 class="inline">Danh Sách Phòng</h3><button type="button" class="btn bg-olive btn-flat margin btn_add_user" data-toggle="modal" data-target="#add_phong">
                                <i class="fa fa-plus" aria-hidden="true"></i> Thêm Phòng</button>
                        </div>

                        <div class="box-body">

                            <table class="table-responsive table-bordered table-hover text-center" id="phong-table" style="min-width:100%;">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Phòng</th>
                                    <th>Tình Trạng</th>
                                    <th>Loại Phòng</th>
                                    <th>Hình Ảnh</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Thao Tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('admin.phong.add')
    @include('admin.phong.delete')
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/phong.js') }}"></script>
    <script>

        $(function(){
            datatables =  $('#phong-table').DataTable({
                processing: false,
                serverSide: true,
                searching: true,
                columnDefs: [
                    { width: '12%', targets: 3},
                    { width: '5%', targets: 2 },
                    { width: '10%', targets: 4 },
                ],
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
                    "infoEmpty": "Trình bày 0 - 0 trong 0 mục",
                },
                ajax: {
                    url:" {{route('admin.phong.data') }}",
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'tenphong', name: 'tenphong' },
                    { data: 'tinhtrang', name: 'tinhtrang'},
                    { data: 'loaiphong.tenloaiphong', name: 'loaiphong.tenloaiphong', },
                    { data: 'image_show', name:'image_show'},
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action'}
                ]
            });

        });
    </script>
@endsection

