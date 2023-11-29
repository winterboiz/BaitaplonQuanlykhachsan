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
                                <form method="POST" action="{{ route('admin.role.update',$role->id )}}" id="frm_add_user" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <div class="widget-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{ csrf_field() }}
                                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" style="width: 200px">
                                                        <label for="name">Tên Vai Trò</label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="tên Vai trò"
                                                               value="{{ $role->name }}" >
                                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                                        <span class="text-danger">
                                                         <strong id="name-error"></strong>
                                                     </span>
                                                    </div>

                                                    <div class="form-group">
                                                        <strong>Permission:</strong>
                                                        <br/>
                                                        @foreach($permission as $value)

                                                            <label for="permission" style="margin: 15px;">
                                                                <input type="checkbox" name="permission[]" value="{{$value->id}}" {{ in_array($value->id, $rolePermissions)?'checked':''}} >
                                                                {{ $value->name }}
                                                            </label>

                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info btn-flat" >Cập Nhật</button>
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