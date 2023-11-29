<div id="edit_khachhang" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Cập nhật thông tin phòng</b></h4>
            </div>
            <form id="frm_edit_khachhang" method="POST" action="" enctype="multipart/form-data">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <div class="col-md-12">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <br>
                                <input type="hidden" name="edit_id" id="edit_id" value="" />
                                <div class="form-group">
                                    <label for="edit_name">Tên Khách Hàng</label>
                                    <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Tên Khách Hàng" value="">
                                    <span class="text-danger">
                                             <strong id="edit-name-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group">
                                    <label for="edit_cmnd">CMND</label>
                                    <input type="number" class="form-control" id="edit_cmnd" name="edit_cmnd" placeholder="CMND"
                                    >
                                    <span class="text-danger">
                                             <strong id="edit-cmnd-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group ">
                                    <label for="edit_diachi">Địa Chỉ</label>
                                    <input type="text" class="form-control" id="edit_diachi" name="edit_diachi" placeholder="Địa Chỉ">
                                    <span class="text-danger">
                                             <strong id="edit-diachi-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group ">
                                    <label for="edit_diachi">Số Điện Thoại</label>
                                    <input type="tel" class="form-control" id="edit_dienthoai" name="edit_dienthoai" placeholder="Địa Chỉ">
                                    <span class="text-danger">
                                             <strong id="edit-dienthoai-error"></strong>
                                         </span>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <br>
                                <div class="form-group">
                                    <label for="gioitinh">Giới tính</label>

                                    <br>
                                    <select name="edit_gioitinh" id="edit_gioitinh">
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
                                    <input type="email" class="form-control" id="edit_email" name="edit_email" placeholder="Email">
                                    <span class="text-danger">
                                             <strong id="edit-email-error"></strong>
                                         </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-flat" id="btn_edit_khachhang">Sửa</button>
                    <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
                </div>
            </form>

        </div>

    </div>
</div>