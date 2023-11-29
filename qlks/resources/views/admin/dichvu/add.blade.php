<div id="add_dichvu" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Thêm Dịch Vụ</b></h4>
            </div>
            <div id="success-msg" class="hide">
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong>
                </div>
            </div>
                <form method="POST" action="" id="frm_add_dichvu" enctype="multipart/form-data">
                   <div class="col-md-12">
                       <div class="widget-body">
                           <div class="row">
                               <div class="col-md-6 col-md-offset-3">
                                   {{ csrf_field() }}
                                   <br>
                                   <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                       <label for="name">Tên Dịch Vụ</label>
                                       <input type="text" class="form-control" id="name" name="name" placeholder="Tên Dịch Vụ" value="">
                                       <span class="help-block">{{ $errors->first('name') }}</span>
                                       <span class="text-danger">
                                             <strong id="name-error"></strong>
                                         </span>
                                   </div>
                                   <div class="form-group {{ $errors->has('mota') ? 'has-error' : '' }}">
                                       <label for="gia">Giá</label>
                                       <input type="number" class="form-control" id="gia" name="gia" min="1" step="any" placeholder="VND"
                                              >
                                       <span class="text-danger">
                                             <strong id="gia-error"></strong>
                                         </span>
                                   </div>
                                   <div class="form-group {{ $errors->has('mota') ? 'has-error' : '' }}">
                                       <label for="gia">Số Lượng</label>
                                       <input type="number" class="form-control" id="soluong" name="soluong" placeholder="Số Lượng"
                                       >
                                       <span class="text-danger">
                                             <strong id="soluong-error"></strong>
                                         </span>
                                   </div>

                                   <div class="form-group {{ $errors->has('mota') ? 'has-error' : '' }}">
                                       <label for="gia">Đơn vị</label>
                                       <input type="text" class="form-control" id="donvi" name="donvi" placeholder="Dơn Vị"
                                       >
                                       <span class="text-danger">
                                             <strong id="donvi-error"></strong>
                                         </span>
                                   </div>
                                   <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                       <label for="image">Hình Ảnh Dịch Vụ</label>
                                       <input type="file" class="form-control" id="image" name="image"
                                             >
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
                        <button type="button" class="btn btn-info btn-flat" id="btn_add_dichvu">Thêm</button>
                        <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
                    </div>
                </form>

        </div>

    </div>
</div>
