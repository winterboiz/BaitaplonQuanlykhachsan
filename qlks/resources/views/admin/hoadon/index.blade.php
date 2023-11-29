@extends('adminlte::master')
@section('body')
    @include('sweetalert::alert')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Trang chủ
                <small>Hóa Đơn</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Hóa Đơn</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="pull-right-container">
                <div class="row">
                    <div class="col-xs-12">
                        <div>

                        </div>
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4>Danh Sách Hóa Đơn</h4></div>
                            <div class="panel-body">
                                <table class="table-responsive table-bordered table-striped text-center table-responsive-xl" id="khachhang-table">
                                    <thead>
                                    <tr>
                                        <th>Mã Hóa Đơn</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Phòng Thuê</th>
                                        <th>Ngày Tạo</th>
                                        <th>Tổng Tiền</th>
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

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script>

        $(function(){
            datatables =  $('#khachhang-table').DataTable({
                processing: false,
                serverSide: true,
                autoWidth: false,
                searching: true,
                responsive: true,
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
                    url:" {{route('admin.hoadon.data') }}",
                },
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'customer.tenkhachhang', name: 'customer.tenkhachhang'},
                    { data: 'phieuthue.phong.tenphong', name:'phieuthue.phong.tenphong'},
                    { data: 'created_at', name:'created_at'},
                    { data: 'tongtien', name:'tongtien'},
                    { data: 'action', name: 'action'}
                ]
            });

        });
    </script>
@endsection

