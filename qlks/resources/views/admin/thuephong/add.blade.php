<div id="add_thuephong" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Đặt Phòng</b></h4>
            </div>
            <div id="success-msg" class="hide">
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong>
                </div>
            </div>
                <form method="POST" action="" id="frm_add_thuephong" enctype="multipart/form-data">
                    {{ csrf_field() }}
                   <div class="col-md-12">
                       <div class="widget-body">
                           <div class="row">
                               <div class="col-md-6 ">
                                   <br>
                                   <div class="form-group">
                                       <label for="name">Tên Khách Hàng</label>
                                       <input type="text" class="form-control" id="name" name="name" placeholder="Tên Khách Hàng" value="">
                                       <span class="text-danger">
                                             <strong id="name-error"></strong>
                                         </span>
                                   </div>
                                   <div class="form-group">
                                       <label for="cmnd">CMND</label>
                                       <input type="number" class="form-control" id="cmnd" name="cmnd" placeholder="CMND"
                                              >
                                       <span class="text-danger">
                                             <strong id="cmnd-error"></strong>
                                         </span>
                                   </div>
                                   <div class="form-group ">
                                       <label for="diachi">Địa Chỉ</label>
                                       <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa Chỉ">
                                       <span class="text-danger">
                                             <strong id="diachi-error"></strong>
                                         </span>
                                   </div>
                                   <div class="form-group ">
                                       <label for="diachi">Số Điện Thoại</label>
                                       <input type="tel" class="form-control" id="dienthoai" name="dienthoai" placeholder="Địa Chỉ">
                                       <span class="text-danger">
                                             <strong id="dienthoai-error"></strong>
                                         </span>
                                   </div>

                               </div>
                               <div class="col-md-6">
                                   <br>
                                   <div class="form-group">
                                       <label for="gioitinh">Giới tính</label>

                                       <br>
                                        <select name="gioitinh" id="gioitinh">
                                            <option value="">---- Chọn Giới tính -----</option>
                                            <option value="0">Nam</option>
                                            <option value="1">Nữ</option>
                                        </select>
                                       <span class="text-danger" style="display: block;">
                                             <strong id="gioitinh-error"></strong>
                                         </span>
                                   </div>
                                   <div class="form-group">
                                       <label for="phong_id" style="display: block">Phòng</label>
                                       <select name="phong_id" id="phong_id" class="form-control"  style="width: 70%">
                                           <option>---Vui Lòng chọn phòng ---</option>
                                           @if (count($phongs) > 0)
                                               @foreach($phongs as $phong)
                                                   <option value="{{ $phong->id }}">{{ $phong->tenphong }}</option>
                                               @endforeach
                                           @endif
                                       </select>
                                       <span class="text-danger">
                                         <strong id="phong_id-error"></strong>
                                     </span>
                                   </div>
                                   <div class="form-group">
                                       <div class='input-group date' id='datetimepicker1'>
                                           <input type='text' class="form-control"  name="checkin" />
                                           <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <div class='input-group date' id='datetimepicker2'>
                                           <input type='text' class="form-control"  name="checkout" />
                                           <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-flat" id="btn_add_thuephong">Thêm</button>
                        <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
                    </div>
                </form>

        </div>

    </div>
</div>
