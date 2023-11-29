$(function () {

    $('#frm_add_loaiphong').on('submit', function(e) {
        e.preventDefault();
        var registerForm = $("#frm_add_loaiphong");
        var formData = registerForm.serialize();
        $.ajax({
            url: "./loaiphong",
            type: "POST",
            data: formData,
            success: function (data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.name) {
                        $('#name-error').html(data.errors.name[0]);
                    }

                }
                if (data.success) {
                    $("#frm_add_loaiphong")[0].reset();
                    $('#add_loaiphong').modal('hide');
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


    $('#frm_edit_loaiphong').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        var id =  $('#edit_id').val();
        $.ajax({
            url:"./loaiphong/"+id,
            method:"PUT",
            data:form_data,
            dataType:"json",
            success:function(data)
            {    console.log(form_data);
                if (data.errors) {
                    if (data.errors.edit_name) {
                        $('#gif-error').html(data.errors.edit_name[0]);
                    }
                }
                else{
                    $('#frm_edit_loaiphong')[0].reset();
                    swal({
                        title: "Success!",
                        text: "Cập Nhật Dữ Liệu Thành Công",
                        icon: "success",
                        timer: '2000'
                    });
                    $('#edit_loaiphong').modal('hide');
                    datatables.ajax.reload();
                }
            }
        })
    });
    $(document).on('click', '.btn-edit', function(){
        var id = $(this).data('id');
        var url = $(this).data('show');
        var editUrl = $(this).data('url');
        // $('#frm_edit_loaiphong').attr('action', editUrl);
        $.ajax({
            url:"loaiphong/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit_name').val(data.tenloaiphong);
                $('#edit_slug').val(data.slug);
                $('#edit_id').val(data.id);
                $('#edit_giatien').val(data.giatien);
                $('#edit_loaiphong').modal('show');
            }
        })
    });


    $(document).on('click', '.btn-delete', function(){
        var id = $(this).data('id');
        var url = $(this).data('show');
        // var editUrl = $(this).data('url');
        // $('#frm_edit_loaiphong').attr('action', editUrl);
        $.ajax({
            url:"loaiphong/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#delete_id').val(data.id);
                $('#delete_loaiphong').modal('show');
            }
        })
    });


    $('#del_frm_loaiphong').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        var id =  $('#delete_id').val();
        $.ajax({
            url:"./loaiphong/"+id,
            method:"delete",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
                console.log(data);
                if (data.errors) {
                    if (data.errors.edit_name) {
                        $('#gif-error').html(data.errors.edit_name[0]);
                    }
                }
                else{
                    $('#success3').removeClass('hide');
                    swal({
                        title: "Success!",
                        text: "Xóa Dữ Liệu Thành Công",
                        icon: "success",
                        timer: '2000'
                    });
                    $('#delete_loaiphong').modal('hide');
                    datatables.ajax.reload();
                }
            }
        })
    });



});