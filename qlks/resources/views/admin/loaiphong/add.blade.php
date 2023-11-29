<div id="add_loaiphong" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Thêm Loại phòng</b></h4>
            </div>
                <form method="POST" action="" id="frm_add_loaiphong" enctype="multipart/form-data">
                   <div class="col-md-12">
                       <div class="widget-body">
                           <div class="row">
                               <div class="col-md-6 col-md-offset-3">
                                   {{ csrf_field() }}
                                   <div class="form-group">
                                       <label for="name">Tên Loại phòng</label>
                                       <input type="text" class="form-control" id="name" name="name" placeholder="Tên Loại Phòng"
                                                   value="{{ old('name') }}">
                                       <span class="text-danger"><strong id="name-error"></strong></span>
                                   </div>
                                   <div class="form-group">
                                       <label for="giatien">Giá Tiền</label>
                                       <span class="text-danger"><strong id="name-error"></strong></span>
                                       <input type="number" class="form-control" id="giatien" name="giatien" placeholder="Giá Tiền"
                                              value="{{ old('giatien') }}">
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn-flat" id="btn_add_loaiphong" >Thêm</button>
                        <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
                    </div>
                </form>

        </div>

    </div>
</div>
