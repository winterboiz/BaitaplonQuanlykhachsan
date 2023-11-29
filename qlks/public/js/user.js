$(function () {


    $(document).on('click', '#btn_delete', function(){
        var id = $(this).data('id');
        var url = $(this).data('show');
        $('#delete_id').val(id);
        $('#delete_user').modal('show');

    });
    $('#del_frm_user').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        var id =  $('#delete_id').val();
        $.ajax({
            url:"./users/delete/"+id,
            method:"post",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
                console.log(data);
                if (data.errors) {
                    swal({
                        title: "Error!",
                        text: "Xóa Dữ Liệu Không Thành Công",
                        icon: "error",
                        timer: '2000'
                    });
                }
                else{
                    swal({
                        title: "Success!",
                        text: "Xóa Dữ Liệu Thành Công",
                        icon: "success",
                        timer: '2000'
                    });
                    $('#delete_user').modal('hide');
                    datatables.ajax.reload();
                }
            }
        })
    });

});