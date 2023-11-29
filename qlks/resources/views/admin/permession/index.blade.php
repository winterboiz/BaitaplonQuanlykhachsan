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
                            <a href="{{route('admin.permession.create')}}" class="btn bg-olive btn-flat margin btn_add_user">
                                <i class="fa fa-plus" aria-hidden="true"></i> Thêm người dùng</a>
                        </div>
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading">Danh sách người dùng</div>
                            <div class="panel-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif


                                <table class="table table-bordered" id="role-table">
                                    <thead>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Ngày Tạo</th>
                                        <th width="280px">Action</th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.role.delete')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
 @endsection
@section('script')
    <script>
        $(document).on('click', '#btn_delete', function(){
            var id = $(this).data('id');
            var url = $(this).data('show');
            $('#delete_id').val(id);
            $('#delete_user').modal('show');

        });
        $('#del_frm_user').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            var id =  $('#delete_id').val();
            $.ajax({
                url:"./role/delete/"+id,
                method:"post",
                data:form_data,
                dataType:"json",
                success:function(data)
                {
                    console.log(data);
                    if (data.errors) {
                        swal({
                            title: "Error!",
                            text: "Xóa Dữ Liệu Không Thành Công",
                            icon: "error",
                            timer: '2000'
                        });
                    }
                    else{
                        swal({
                            title: "Success!",
                            text: "Xóa Dữ Liệu Thành Công",
                            icon: "success",
                            timer: '2000'
                        });
                        $('#delete_role').modal('hide');
                        datatables.ajax.reload();
                    }
                }
            })
        });

        $(function(){
                datatables =  $('#role-table').DataTable({
                processing: true,
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
                    url:" {{route('admin.permession.data') }}",
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action'}
                ]
            });

        });
    </script>
@endsection

