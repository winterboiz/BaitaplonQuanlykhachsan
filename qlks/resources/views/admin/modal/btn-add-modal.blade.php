<button data-target="{{ $edit }}" class="btn btn-sm btn-warning btn-flat btn-edit"
        data-id="{{$id}}"  data-show="{{$detail}}"  data-url="{{$urlEdit}}" data-toggle="modal"><i class="glyphicon glyphicon-edit">
    </i> Nhận Phòng</button>

<button   data-url="{{ $delete }}" id="delete_order" data-toggle="modal" data-id="{{$id}}"  data-phongid="{{$phong_id}}" class="btn btn-sm btn-danger btn-flat btn_delete"
><i class="glyphicon glyphicon-trash"></i> Xóa</button>