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
                            <button type="button" class="btn bg-olive btn-flat margin btn_add_user" data-toggle="modal" data-target="#add_dichvu">
                                <i class="fa fa-plus" aria-hidden="true"></i> Thêm Dịch Vụ</button>
                        </div>
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4>Danh Sách Dịch Vụ</h4></div>
                            <div class="panel-body">
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <table class="table-responsive table-bordered table-striped" id="dichvu-table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Dịch Vụ</th>
                                        <th>Hình Ảnh</th>
                                        <th>Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Đơn Vị</th>
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
            </div>
            @include('admin.dichvu.add')
            @include('admin.dichvu.edit')
            @include('admin.dichvu.delete')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/dichvu.js') }}"></script>
    <script>
        $(function(){
            datatables =  $('#dichvu-table').DataTable({
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
                    url:" {{route('admin.dichvu.data') }}",
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'tendichvu', name: 'tendichvu'},
                    { data: 'image_show', name:'image_show'},
                    { data: 'gia', name: 'gia'},
                    { data: 'soluong', name: 'soluong'},
                    { data: 'donvi', name:'donvi'},
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action'}
                ]
            });

        });
    </script>
@endsection

