@extends('adminlte::master')
@section('body')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <section class="content">
            <div class="pull-right-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Cập Nhật Thông Tin Phòng</div>
                            <div class="panel-body">
                                <form id="frm_edit_phong" method="post" action="{{ route('admin.phong.update',['id'=> $phong->id]) }}" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                    <div class="col-md-12">
                                        <div class="widget-body">
                                            <div class="row">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <input type="hidden" name="edit_id" id="edit_id" value="" />
                                                    <div class="form-group {{ $errors->has('edit_name') ? 'has-error' : '' }}">
                                                        <label for="name">Tên Phòng</label>
                                                        <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Tên Phòng" value="{{$phong->tenphong}}">

                                                        <span class="text-danger">
                                             <strong id="edit-name-error"></strong>
                                         </span>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('mota') ? 'has-error' : '' }}">
                                                        <label for="mota">Mô Tả</label>
                                                        <input type="text" class="form-control" id="edit_mota" name="edit_mota" placeholder="Mô Tả" value="{{ $phong->mota }}">
                                                        <span class="help-block">{{ $errors->first('mota') }}</span>
                                                        <span class="text-danger">
                                                     <strong id="edit-mota-error"></strong>
                                                 </span>
                                                    </div>
                                                    <div class="form-group"  {{ $errors->has('edit_image.max') ? 'has-error' : '' }}>
                                                        <label for="image">Hình Ảnh Phòng</label>

                                                        <div>
                                                            <img id="image_thumbnail" src="{{asset('uploads/'.@$phong->image)}}" alt="image" class="img-thumbnail img-responsive" width="50px" height="50px">
                                                        </div>
                                                        <br>
                                                        <input type="file" class="form-control" id="edit_image" name="edit_image">


                                                        <div class="help-block">
                                                            <strong class="text-danger">{{ $errors->first('edit_image') }}</strong>
                                                        </div>

                                                 </div>
                                                    <div class="form-group" {{ $errors->has('edit_image.max') ? 'has-error' : '' }}>
                                                        <label for="image" style="display: block">Thư viện hình ảnh</label>
                                                        @forelse($phong->attachments as $file)
                                                            @if (file_exists(public_path(get_thumbnail("uploads/$file->path"))))
                                                                <img src="{{ asset(get_thumbnail("uploads/$file->path")) }}" alt="Image" class="img-responsive img-thumbnail" width="50px" height="50px" style="margin:10px 0px">
                                                            @else
                                                                <img src="{{ asset('images/no_image.jpg') }}" alt="No Image" class="img-responsive img-thumbnail" width="50px" height="50px" style="margin:10px 0px">
                                                            @endif
                                                        @empty
                                                            <img src="{{ asset('images/no_image.jpg') }}" alt="No Image" class="img-responsive img-thumbnail" width="50px" height="50px" style="margin:10px 0px">
                                                        @endforelse
                                                        {{--<div>--}}
                                                            {{--<img id="image_thumbnail2" alt="image2" class="img-thumbnail img-responsive" width="50px" height="50px">--}}
                                                        {{--</div>--}}
                                                        {{--<br>--}}
                                                        <input type="file" class="form-control" id="edit_images" name="edit_images[]" multiple>
                                                        <span class="help-block">{{ $errors->first('edit_image.max') }}</span>
                                                        <span class="text-danger">
                                                             <strong id="edit-image-error"></strong>
                                                        </span>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('loaiphong_id') ? 'has-error' : '' }}">
                                                        <label for="edit_loaiphong_id">Loại Phòng</label>
                                                        <select name="edit_loaiphong_id" id="edit_loaiphong_id" class="form-control">
                                                            <option value="">Vui Lòng Chọn Loại Phòng</option>
                                                            @if (count($loaiphongs) > 0)
                                                                @foreach($loaiphongs as $loaiphong)
                                                                    <option value="{{ $loaiphong->id }}" {{ $phong->loaiphong_id == $loaiphong->id ? 'selected' : '' }}>{{ $loaiphong->tenloaiphong }}</option>

                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <span class="help-block">{{ $errors->first('loaiphong_id') }}</span>
                                                        <span class="text-danger">
                                             <strong id="edit-loaiphong_id-error"></strong>
                                         </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-footer">
                                        <button type="submit" class="btn btn-info btn-flat" id="btn_edit_phong">Sửa</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>

@endsection