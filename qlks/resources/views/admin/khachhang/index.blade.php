@extends('adminlte::master')
@section('body')


    <!-- Content Wrapper. Contains page content -->
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
        <section class="content">
            <div class="pull-right-container">
                <div class="row">
                    <div class="col-md-12">
                        <div>

                        </div>
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4 style="display: inline;">Danh Sách Khách Hàng</h4><span class="pull-right"><button type="button" class="btn bg-olive btn-flat margin btn_add_user" data-toggle="modal" data-target="#add_khachhang">
                                <i class="fa fa-plus" aria-hidden="true"></i> Thêm Khách Hàng</button></span></div>
                            <div class="panel-body">
                                <table class="table-responsive table-bordered table-striped" id="khachhang-table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>CMND</th>
                                        <th>Địa Chỉ</th>
                                        <th>Điện Thoại</th>
                                        <th>Giới Tính</th>
                                        <th>Ngày tạo</th>
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
            </div>
            @include('admin.khachhang.add')
            @include('admin.khachhang.edit')
            @include('admin.khachhang.delete')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/khachhang.js') }}"></script>
    <script>
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
                    url:" {{route('admin.khachhang.data') }}",
                },
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'tenkhachhang', name: 'tenkhachhang'},
                    { data: 'cmnd', name: 'cmnd'},
                    { data: 'diachi', name: 'diachi'},
                    { data: 'dienthoai', name:'dienthoai'},
                    { data: 'gioitinh', name:'gioitinh'},
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action'}
                ]
            });

        });
    </script>
@endsection

