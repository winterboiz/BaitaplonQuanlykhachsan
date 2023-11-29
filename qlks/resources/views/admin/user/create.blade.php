@extends('adminlte::master')
@section('body')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Bảng điều khiển
                <small>Quản lý người dùng</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Quản lý người dùng</li>
            </ol>
        </section>
        <section class="content">
            <div class="pull-right-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Thêm người dùng</div>
                            <div class="panel-body">
                                <form method="POST" action="{{ route('admin.users.store') }}" id="frm_add_user" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <div class="widget-body">
                                            <div class="row">
                                                <div class="col-md-6 col-md-offset-3">
                                                    {{ csrf_field() }}
                                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                                        <label for="name">Họ tên</label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Họ tên"
                                                               value="{{ old('name') }}">
                                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                                        <span class="text-danger">
                                             <strong id="name-error"></strong>
                                         </span>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                                        <label for="email">Địa chỉ Email</label>
                                                        <input type="email" class="form-control" id="email" name="email"
                                                               placeholder="Địa chỉ Email"
                                                               value="{{ old('email') }}">
                                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                                        <label for="password">Mật khẩu</label>
                                                        <input type="password" class="form-control" id="password" name="password"
                                                               placeholder="Mật khẩu">
                                                        <span class="help-block">{{ $errors->first('password') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password_confirmation">Xác nhận mật khẩu</label>
                                                        <input type="password" class="form-control" id="password_confirmation"
                                                               name="password_confirmation" placeholder="Xác nhận mật khẩu">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="roles[]">Quyền</label>
                                                        <select name="roles[]" >
                                                            <option> Vui Lòng Chọn</option>
                                                                @foreach($roles as $role)
                                                                    <option value="{{ $role }}">{{ $role }}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info btn-flat" id="btn_add_user">Thêm</button>
                                        <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
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