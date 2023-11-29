<div id="add_phong" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Thêm phòng</b></h4>
            </div>
            <form method="POST" action="" id="frm_add_phong" enctype="multipart/form-data">
               <div class="col-md-12">
                   <div class="widget-body">
                       <div class="row">
                           <div class="col-md-6 col-md-offset-3">
                               {{ csrf_field() }}
                               <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                   <label for="name">Tên Phòng</label>
                                   <input type="text" class="form-control" id="name" name="name" placeholder="Tên Phòng" value="">
                                   <span class="help-block">{{ $errors->first('name') }}</span>
                                   <span class="text-danger"><strong id="name-error"></strong></span>
                               </div>
                               <div class="form-group {{ $errors->has('mota') ? 'has-error' : '' }}">
                                   <label for="mota">Mô Tả</label>
                                   <input type="text" class="form-control" id="mota" name="mota" placeholder="Mô Tả">
                                   <span class="help-block">{{ $errors->first('mota') }}</span>
                                   <span class="text-danger">
                                         <strong id="mota-error"></strong>
                                     </span>
                               </div>
                               <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                   <label for="image">Hình Ảnh Phòng</label>
                                   <input type="file" class="form-control" id="image" name="image"
                                         >
                                   <span class="help-block">{{ $errors->first('image') }}</span>
                                   <span class="text-danger">
                                         <strong id="image-error"></strong>
                                     </span>
                               </div>

                               <div class="form-group {{ $errors->has('images') ? 'has-error' : '' }}">
                                   <label for="images">Thư Viện Hình Ảnh Phòng</label>
                                   <input type="file" class="form-control" id="images" name="images[]"
                                   multiple="multiple">
                                   <span class="help-block">{{ $errors->first('images') }}</span>
                                   <span class="text-danger">
                                         <strong id="image-error"></strong>
                                     </span>
                               </div>
                               <div class="form-group {{ $errors->has('loaiphong_id') ? 'has-error' : '' }}">
                                   <label for="loaiphong_id">Loại Phòng</label>
                                   <select name="loaiphong_id" id="loaiphong_id" class="form-control">
                                       <option value="">Vui Lòng Chọn Loại Phòng</option>
                                       @if (count($loaiphongs) > 0)
                                           @foreach($loaiphongs as $loaiphong)
                                               <option value="{{ $loaiphong->id }}">{{ $loaiphong->tenloaiphong }}</option>
                                           @endforeach
                                       @endif
                                   </select>
                                   <span class="help-block">{{ $errors->first('loaiphong_id') }}</span>
                                   <span class="text-danger">
                                         <strong id="loaiphong_id-error"></strong>
                                     </span>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info btn-flat" id="btn_add_phong" value="Thêm">
                    <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>
