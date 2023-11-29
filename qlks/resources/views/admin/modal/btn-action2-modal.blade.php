<button data-target="{{ $edit }}" class="btn btn-sm btn-primary btn-flat btn-edit"
        data-id="{{$id}}"  data-show="{{$detail}}"  data-url="{{$urlEdit}}" data-toggle="modal"><i class="glyphicon glyphicon-edit">
    </i> Cập Nhật</button>
<a      href="{{ $delete }}" id="delete_user" data-toggle="modal" data-id="{{$id}}"  data-show="{{$detail}}" class="btn btn-sm btn-danger btn-flat btn-delete"
><i class="glyphicon glyphicon-trash"></i> Thanh Toán</a>