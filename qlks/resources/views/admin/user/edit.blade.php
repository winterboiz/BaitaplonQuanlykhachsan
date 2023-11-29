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
                            <div class="panel-heading">Cập Nhật người dùng</div>
                            <div class="panel-body">
            <form id="edit_frm_user" method="POST" action="{{ route('admin.users.update',$user->id) }}" enctype="multipart/form-data">

                <div class="col-md-12">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                {{ csrf_field() }}
                                <div class="form-group" style="display: none;">
                                    <input id="edit_id" type="text" name="id">
                                </div>
                                <div class="form-group {{ $errors->has('edit_name') ? 'has-error' : '' }}">
                                    <label for="name">Họ tên</label>
                                    <input type="text" class="form-control" id="edit_name" name="edit_name" value="{{$user->name}}">
                                    <span class="help-block">{{ $errors->first('edit_name') }}</span>
                                    <span class="text-danger">
                                             <strong id="name-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group {{ $errors->has('edit_email') ? 'has-error' : '' }}">
                                    <label for="email">Địa chỉ Email</label>
                                    <input type="email" class="form-control" id="edit_email" name="edit_email"
                                           placeholder="Địa chỉ Email" value="{{$user->email}}">
                                    <span class="help-block">{{ $errors->first('edit_email') }}</span>
                                </div>
                                <div class="form-group {{ $errors->has('edit_password') ? 'has-error' : '' }}">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" class="form-control" id="edit_password" name="edit_password"
                                           placeholder="Mật khẩu">
                                    <span class="help-block">{{ $errors->first('edit_password') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" id="edit_password_comfirm"
                                           name="edit_password_comfirm" placeholder="Xác nhận mật khẩu">
                                </div>

                                <div class="form-group">
                                    <label for="roles[]">Quyền</label>
                                    <select name="roles[]" >
                                        <option> Vui Lòng Chọn</option>
                                        @foreach($roles as $role)

                                            <option value="{{ $role }}" {{ in_array($role, $userRole) ? 'selected' : '' }}>{{ $role }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-flat" id="btn_edit_user">Sửa</button>
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