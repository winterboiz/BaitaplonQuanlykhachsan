$(function (){

    $('#frm_add_dichvu').on('click','#btn_add_dichvu',function (e) {
        event.preventDefault();
        $('#name-error').html("");
        var formData=  new FormData($("#frm_add_dichvu")[0]);
        $.ajax({
            url: "./dichvu",
            type: "POST",
            data:formData,
            contentType:false,
            processData:false,
            success: function (data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.name) {
                        $('#name-error').html(data.errors.name);
                        $('#donvi-error').html(data.errors.donvi);
                        $('#soluong-error').html(data.errors.soluong);
                        $('#gia-error').html(data.errors.gia);
                    }

                }
                if (data.success) {
                    $(this).html('');
                    $("#frm_add_dichvu")[0].reset();
                    $('#add_dichvu').modal('hide');
                    swal({
                        title: "Success!",
                        text: "Thêm Dữ Liệu Thành Công",
                        icon: "success",
                        timer: '2000'
                    });
                    datatables.ajax.reload();
                }
            },
        });
    });

    $(document).on('click', '.btn-edit', function(){
        var id = $(this).data('id');
        var url = $(this).data('show');
        $.ajax({
            url:"dichvu/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit_name').val(data.tendichvu);
                $('#edit_gia').val(data.gia);
                $('#edit_donvi').val(data.donvi);
                $('#edit_soluong').val(data.soluong);
                $('#image_thumbnail').attr("src",data.image);
                $('#edit_id').val(data.id);
                $('#edit_loaiphong').modal('show');
            }
        })
    });
    $('#frm_edit_dichvu').on('click', '#btn_edit_dichvu',function(event){
        event.preventDefault();
        var formd=new FormData($("#frm_edit_dichvu")[0]);
        var form_data = $(this).serialize();
        var id =  $('#edit_id').val();
        $.ajax({
            url:"dichvu/"+id,
            method:"POST",
            data:formd,
            dataType:"json",
            contentType:false,
            processData:false,
            success:function(data)
            {    console.log(formd);
                if (data.errors) {
                    if (data.errors.edit_name) {
                        $('#edit-name-error').html(data.errors.edit_name);
                        $('#edit-gia-error').html(data.errors.edit_gia);
                        $('#edit-donvi-error').html(data.errors.edit_donvi);
                        $('#edit-soluong-error').html(data.errors.edit_soluong);

                    }
                }
                if (data.success) {

                    $('#edit_dichvu').modal('hide');
                    swal({
                        title: "Success!",
                        text: "Cập Nhật Dữ Liệu Thành Công",
                        icon: "success",
                        timer: '2000'
                    });
                    datatables.ajax.reload();
                }
            }
        })
    });

    $(document).on('click', '.btn-delete', function(){
        var id = $(this).data('id');
        var url = $(this).data('show');
        // var editUrl = $(this).data('url');
        // $('#frm_edit_loaiphong').attr('action', editUrl);
        $.ajax({
            url:"dichvu/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#delete_id').val(data.id);
                $('#delete_dichvu').modal('show');
            }
        })
    });


    $('#del_frm_dichvu').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        var id =  $('#delete_id').val();
        $.ajax({
            url:"dichvu/"+id,
            method:"delete",
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
                    $('#delete_dichvu').modal('hide');
                    datatables.ajax.reload();
                }
            }
        })
    });





});