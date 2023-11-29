@extends('adminlte::master')
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
            <section class="content">
                <div class="pull-right-container">
                    <div class="row">
                        <div class="col-md-7">
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading"><h4><i class="fa fa-table"></i>  Gọi Dịch Vụ Cho Phòng {{ $thuephong->phong->tenphong }}</h4></div>
                                <div class="panel-body">
                                    @if (session('message'))
                                        <div class="alert alert-success">
                                            {!! session('message') !!}
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <table class="table table-responsive table-bordered" id="table" style="width: 100%">
                                        <thead>
                                                <th>Hình Ảnh</th>
                                                <th>Tên Dịch Vụ</th>
                                                <th>Giá</th>
                                                <th>Số Lượng</th>
                                                <th>Đơn Vị</th>
                                                <th>Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dichvu as $dv)
                                                 <tr>
                                                     <td><img width="45px" height="45px" src="{{ asset('uploads/'.@$dv->image) }}"></td>
                                                     <td>{{$dv->tendichvu}}</td>
                                                     <td>{{$dv->gia}}</td>
                                                     <td>{{$dv->soluong}}</td>
                                                     <td>{{$dv->donvi}}</td>
                                                     <td> <a href="#" class="btn btn-xs btn-success btn-add" data-toggle="modal" data-dichvu="{{$dv->id}}" data-soluong="{{ $dv->soluong }}"  data-target="#popup"><span class="glyphicon glyphicon-plus"></span>Gọi DV</a>
                                                     </td>
                                                 </tr>
                                            @endforeach
                                        </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5" style="margin-top: 20px">
                            <div class="panel panel-default">
                                <div class="panel-heading"><h4>Dịch Vụ Đã Đặt</h4></div>
                                <div class="panel-body">
                                        <table class="table table-responsive table-bordered" id="table" style="width: 100%">
                                            <thead>
                                            <th>Tên Dịch Vụ</th>
                                            <th>Giá</th>
                                            <th>Số Lượng</th>
                                            <th>Thao Tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($sddichvu as $sd)
                                                <tr>
                                                    <td>{{$sd->tendichvu}}</td>
                                                    <td>{{$sd->gia}}</td>
                                                    <td>{{$sd->quantity}}</td>
                                                    <td> <a href="#" class="btn btn-xs btn-primary btn-edit" data-toggle="modal" data-sddichvu="{{$sd->id}}"  data-sl="{{ $sd->quantity }}" data-target="#edit"><span class="glyphicon glyphicon-edit"></span>Sửa</a>
                                                        <a href="#" class="btn btn-xs btn-danger btn-delete" data-toggle="modal" data-sddichvu="{{$sd->id}}"  data-target="#delete"><span class="glyphicon glyphicon-trash"></span>Xóa</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        <!-- /.content -->
    </div>

    <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.sddichvu.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chọn số lượng</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" id="thuephong_id" name="thuephong_id" style="display:none" type="text" value="{{$thuephong->id}}"/>
                        <input class="form-control" id="dichvu_id" name="dichvu_id" style="display: none" type="text"/>
                        <label> Số lượng</label>
                        <input class="form-control" id="so_luong" name="so_luong" style="width:50%" type="number" value="1" />


                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" onclick="">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.sddichvu.update',['id' => $thuephong->id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chọn số lượng</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" id="thuephong_id" name="thuephong_id" style="display:none" type="text" value="{{$thuephong->id}}"/>
                        <input class="form-control" id="sddichvu_id" name="edit_sddichvu_id" style="display:block" type="text" value=""/>
                        <label> Số lượng</label>
                        <input class="form-control" id="edit_so_luong" name="edit_so_luong" style="width:50%" type="number" value="1" />


                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" onclick="">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form  id="del_frm_dichvu" action="" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xóa Dịch Vụ</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" id="thuephong_id" name="thuephong_id" style="display:none" type="text" value="{{$thuephong->id}}"/>
                        <input class="form-control" id="delete_sddichvu_id" name="delete_sddichvu_id" style="display:block" type="text" value=""/>

                            <h3> Bạn Có Chắc Muốn Xóa</h3>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" onclick="">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: "Vui Lòng Chọn Dịch Vụ",
            width: 'resolve',
        });
    });

    $(document).ready( function (){
       datatables = $('#table').DataTable({
            searching:false,
            paginate:false,
            responsive: true,
        });

    });


    $(document).on('click', '.btn-add', function(){
        var id = $(this).data('dichvu');
        $('#dichvu_id').val(id);

    });
    $(document).on('click', '.btn-edit', function(){
        var id = $(this).data('sddichvu');
        var sl = $(this).data('sl');
        $('#sddichvu_id').val(id);
        $('#edit_so_luong').val(sl);


    });
    $(document).on('click', '.btn-delete', function(){
        var id = $(this).data('sddichvu');
        var sl = $(this).data('sl');
        $('#delete_sddichvu_id').val(id);
    });

    $('#del_frm_dichvu').on('submit', function(event){
        event.preventDefault();
        var form_data = $('#del_frm_dichvu').serialize();
        var id =  $('#delete_sddichvu_id').val();
        $.ajax({
            url:'{{url('admin/sddichvu')}}/'+id,
            method:"delete",
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
                        timer: '1000'
                    });
                    $('#delete').modal('hide');
                }
                else{
                    swal({
                        title: "Success!",
                        text: "Xóa Dữ Liệu Thành Công",
                        icon: "success",
                        timer: '1000'
                    });
                    location.reload(true);
                    $('#delete').modal('hide');
                }
            }
        })
    });
    // function checkInt() {
    //     var n = document.getElementById("so_luong").value;
    //     if (n % 1 === 0 && n >= 0) {
    //     } else {
    //         alert("Số lượng nhập không hợp lệ !");
    //         return false;
    //     }
    //     if (n > ton_kho) {
    //         alert("Số lượng nhập quá số lượng tồn kho !");
    //         return false;
    //     }
    //     return true;
    // }




</script>

@endsection