<div id="show_order" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Chi tiết Đặt Phòng</b></h4>
            </div>
                <form id="frm_show_order" method="POST" action="" enctype="multipart/form-data">
                {{ method_field('post') }}
                {{ csrf_field() }}
                <div class="col-md-12">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <br>
                                <input type="hidden" name="show_id" id="show_id" value="" />
                                <input type="hidden" name="show_khachhang_id" id="show_khachhang_id" value="" />
                                <div class="form-group">
                                    <label for="show_name">Tên Khách Hàng</label>
                                    <input type="text" class="form-control" id="show_name" name="show_name" readonly placeholder="Tên Khách Hàng" value="">
                                    <span class="text-danger">
                                             <strong id="edit-name-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group">
                                    <label for="show_cmnd">CMND</label>
                                    <input type="number" class="form-control" id="show_cmnd" name="show_cmnd" readonly placeholder="CMND"
                                    >
                                    <span class="text-danger">
                                             <strong id="edit-cmnd-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group ">
                                    <label for="show_diachi">Số Điện Thoại</label>
                                    <input type="tel" class="form-control" id="show_dienthoai" name="show_dienthoai" readonly placeholder="Địa Chỉ">
                                    <span class="text-danger">
                                             <strong id="edit-dienthoai-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group">
                                    <label for="gioitinh">Giới tính</label>

                                    <br>
                                    <select name="show_gioitinh" id="show_gioitinh">
                                        <option value="">---- Chọn Giới tính -----</option>
                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                    </select>
                                    <span class="text-danger" style="display: block;">
                                             <strong id="edit-gioitinh-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group ">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control" id="show_email" name="show_email" placeholder="Email">
                                    <span class="text-danger">
                                             <strong id="edit-email-error"></strong>
                                         </span>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <br>
                                <div class="form-group">
                                    <label for="phong_id" style="display: block">Phòng</label>
                                    <select name="show_phong_id" id="show_phong_id" class="form-control"  readonly="" style="width: 70%">
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
                                <div class="form-group ">
                                    <label for="checkin">Giá Phòng</label>
                                    <input type="text" class="form-control" id="show_gia" name="show_gia" value="10000 VND" placeholder="Giá Phòng">
                                    <span class="text-danger">
                                             <strong id="show_checkin-error"></strong>
                                         </span>
                                </div>

                                <div class="form-group ">
                                    <label for="checkin">Ngày Đặt</label>
                                    <input type="text" class="form-control" id="show_checkin" name="show_checkin" value="" placeholder="Ngày Đặt">
                                    <span class="text-danger">
                                             <strong id="show_checkin-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group ">
                                    <label for="checkout">Ngày Trả</label>
                                    <input type="text" class="form-control" id="show_checkout" name="show_checkout" value="" placeholder="Ngày Trả">
                                    <span class="text-danger">
                                             <strong id="show_checkin-error"></strong>
                                         </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Xong</button>
                </div>
            </form>

        </div>

    </div>
</div>