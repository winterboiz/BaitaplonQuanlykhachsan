@extends('adminlte::master')
@section('body')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Bảng Điều Khiển
                <small>Sử Dụng Dịch Vụ</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
                <li class="active">Sử dụng dịch vụ</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="pull-right-container">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4>Danh Sách Sử Dụng Dịch Vụ</h4></div>
                            <div class="panel-body">
                                <table class="table-responsive table-bordered table-striped text-center" id="khachhang-table">
                                    <thead>
                                    <tr>
                                        <th>Phiếu Thuê Phòng</th>
                                        <th>Phòng Sử Dụng</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Ngày Vào</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.sudungdichvu.edit')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/sddichvu.js') }}"></script>
    <script>
        $('#form_add_datphong').ready(function() {
            $('#phong_id').select2();
        });
        $(function () {
            $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss'
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
                    url:" {{route('admin.sddichvu.data') }}",
                },
                columns: [
                    { data: 'id', name:'id'},
                    { data: 'phong.tenphong', name:'phong.tenphong'},
                    { data: 'customer.tenkhachhang', name: 'customer.tenkhachhang'},
                    { data: 'ngaydat', name:'ngaydat'},
                    { data: 'action', name: 'action'}
                ]
            });

        });
    </script>
@endsection

