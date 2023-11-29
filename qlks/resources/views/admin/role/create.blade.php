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
                            <div class="panel-heading">Thêm người dùng</div>
                            <div class="panel-body">
                                <form method="POST" action="{{ route('admin.role.store') }}" id="frm_add_user" enctype="multipart/form-data">
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

                                                    <div class="form-group">
                                                        <strong>Permission:</strong>
                                                        <br/>
                                                        @foreach($permission as $value)
                                                        <label for="permission">
                                                                    <input type="checkbox" name="permission[]" value="{{$value->id}}">
                                                                {{ $value->name }}
                                                        </label>
                                                            <br/>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info btn-flat" >Thêm</button>
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