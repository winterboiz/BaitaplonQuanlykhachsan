<div id="edit_dichvu" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Cập nhật thông tin phòng</b></h4>
            </div>
            <div id="success" class="hide">
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong>
                </div>

            </div>
            <form id="frm_edit_dichvu" method="POST" action="" enctype="multipart/form-data">
                {{--{{ method_field('PUT') }}--}}
                <div class="col-md-12">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                {{ csrf_field() }}
                                <br>
                                <input type="hidden" name="edit_id" id="edit_id" value="" />
                                <div class="form-group">
                                    <label for="name">Tên Dịch Vụ</label>
                                    <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Tên Dịch Vụ" value="">
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                    <span class="text-danger">
                                             <strong id="edit-name-error"></strong>
                                    </span>
                                </div>
                                <div class="form-group ">
                                    <label for="edit_gia">Giá</label>
                                    <input type="number" class="form-control" id="edit_gia" name="edit_gia" min="1" step="any" placeholder="VND">
                                    <span class="text-danger"><strong id="edit-gia-error"></strong></span>
                                </div>
                                <div class="form-group">
                                    <label for="gia">Số Lượng</label>
                                    <input type="number" class="form-control" id="edit_soluong" name="edit_soluong" placeholder="Số Lượng">
                                    <span class="text-danger"><strong id="edit-soluong-error"></strong></span>
                                </div>
                                <div class="form-group {{ $errors->has('edit_donvi') ? 'has-error' : '' }}">
                                    <label for="gia">Đơn vị</label>
                                    <input type="text" class="form-control" id="edit_donvi" name="edit_donvi" placeholder="Dơn Vị">
                                    <span class="text-danger">
                                             <strong id="edit-donvi-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                    <label for="image">Hình Ảnh Dịch Vụ</label>
                                    <div>
                                        <img id="image_thumbnail" alt="image" class="img-thumbnail img-responsive" width="50px" height="50px">
                                    </div>
                                    <br>
                                    <input type="file" class="form-control" id="edit_image" name="edit_image">
                                    <span class="help-block">{{ $errors->first('image') }}</span>
                                    <span class="text-danger">
                                             <strong id="image-error"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-flat" id="btn_edit_dichvu">Sửa</button>
                    <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
                </div>
            </form>

        </div>

    </div>
</div>