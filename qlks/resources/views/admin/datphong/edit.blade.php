<div id="edit_order" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>thông tin nhận phòng</b></h4>
            </div>
            <form id="frm_edit_order" method="POST" action="" enctype="multipart/form-data">
                {{ method_field('post') }}
                {{ csrf_field() }}
                <div class="col-md-12">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <br>
                                <input type="hidden" name="edit_id" id="edit_id" value="" />
                                <input type="hidden" name="edit_khachhang_id" id="edit_khachhang_id" value="" />
                                <div class="form-group">
                                    <label for="edit_name">Tên Khách Hàng</label>
                                    <input type="text" class="form-control" id="edit_name" name="edit_name" readonly placeholder="Tên Khách Hàng" value="">
                                    <span class="text-danger">
                                             <strong id="edit-name-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group">
                                    <label for="edit_cmnd">CMND</label>
                                    <input type="number" class="form-control" id="edit_cmnd" name="edit_cmnd" readonly  placeholder="CMND"
                                    >
                                    <span class="text-danger">
                                             <strong id="edit-cmnd-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group ">
                                    <label for="edit_diachi">Số Điện Thoại</label>
                                    <input type="tel" class="form-control" id="edit_dienthoai" name="edit_dienthoai" readonly placeholder="Địa Chỉ">
                                    <span class="text-danger">
                                             <strong id="edit-dienthoai-error"></strong>
                                         </span>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <br>
                                <div class="form-group">
                                    <label for="phong_id" style="display: block">Phòng</label>
                                    <select name="edit_phong_id" id="edit_phong_id" class="form-control"  readonly="" style="width: 70%">
                                        <option  value=""></option>
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
                                    <label for="checkin">Ngày Đặt</label>
                                    <input type="text" class="form-control" id="edit_checkin" name="edit_checkin" value="" placeholder="Ngày Đặt">
                                    <span class="text-danger">
                                             <strong id="edit_checkin-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group ">
                                    <label for="checkout">Ngày Trả</label>
                                    <input type="text" class="form-control" id="edit_checkout" name="edit_checkout" value="" placeholder="Ngày Trả">
                                    <span class="text-danger">
                                             <strong id="edit_checkin-error"></strong>
                                         </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-flat" id="btn_edit_order">Nhận Phòng</button>
                    <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
                </div>
            </form>

        </div>

    </div>
</div>