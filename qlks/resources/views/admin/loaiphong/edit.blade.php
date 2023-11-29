<div id="edit_loaiphong" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Sửa Người Dùng</b></h4>
            </div>
            <div id="success" class="hide">
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong>
                </div>
            </div>
            <form id="frm_edit_loaiphong" method="POST" action="" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                <div class="col-md-12">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                {{ csrf_field() }}
                                <span id="form_output"></span>
                                <input type="hidden" name="edit_id" id="edit_id" value="" />
                                <div class="form-group {{ $errors->has('edit_name') ? 'has-error' : '' }}">
                                    <label for="name">Tên Loại Phòng</label>
                                    <input type="text" class="form-control" id="edit_name" name="edit_name" value="" placeholder="Nhập Tên Loại Phòng">
                                    <span class="help-block">{{ $errors->first('edit_name') }}</span>
                                    <span class="text-danger">
                                             <strong id="gif-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group {{ $errors->has('edit_name') ? 'has-error' : '' }}">
                                    <label for="name">Slug</label>
                                    <input type="text" class="form-control" id="edit_slug" name="edit_slug" value="" placeholder="Nhập Tên Loại Phòng">
                                    <span class="help-block">{{ $errors->first('edit_name') }}</span>
                                    <span class="text-danger">
                                             <strong id="gif-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group {{ $errors->has('edit_giatien') ? 'has-error' : '' }}">
                                    <label for="name">Tên Loại Phòng</label>
                                    <input type="text" class="form-control" id="edit_giatien" name="edit_giatien" value="" placeholder="Nhập Giá tiền">
                                    <span class="help-block">{{ $errors->first('edit_giatien') }}</span>
                                    <span class="text-danger">
                                             <strong id="gif-error"></strong>
                                         </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-flat" id="btn_edit_user" >sửa</button>
                    <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
                </div>
            </form>

        </div>

    </div>
</div>