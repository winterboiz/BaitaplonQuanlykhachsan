<div class="modal fade" id="delete_khachhang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Xóa người dùng</h4>
            </div>
            <form  id="del_frm_khachhang" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                        <input type="hidden" name="id" id="delete_id" value="">
                        <h4 class="nnbodydelete">Bạn có chắc muốn xóa <strong id="khachhang_name" class="text-danger text-center" ></strong></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng cửa sổ</button>
                    <button type="submit" class="btn btn-warning">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>