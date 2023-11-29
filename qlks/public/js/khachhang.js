$(function (){

    $('#frm_add_khachhang').on('click','#btn_add_khachhang',function (e) {
        event.preventDefault();
        $('#name-error').html("");
        var formData=  $('#frm_add_khachhang').serialize();
        $.ajax({
            url: "./khachhang",
            type: "POST",
            data:formData,
            success: function (data) {
                console.log(data);
                if (data.errors) {
                        $('#name-error').html(data.errors.name);
                        $('#dienthoai-error').html(data.errors.dienthoai);
                        $('#cmnd-error').html(data.errors.cmnd);
                        $('#diachi-error').html(data.errors.diachi);
                        $('#gioitinh-error').html(data.errors.gioitinh);
                    swal({
                        title: "Errors!",
                        text: "Có Lỗi Khi Thêm Dữ Liệu",
                        icon: "error",
                        timer: '1000'
                    });

                }
                if (data.success) {
                    $(this).html('');
                    $("#frm_add_khachhang")[0].reset();
                    $('#add_khachhang').modal('hide');
                    swal({
                        title: "Success!",
                        text: "Thêm Dữ Liệu Thành Công",
                        icon: "success",
                        timer: '1000'
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
            url:"khachhang/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit_name').val(data.tenkhachhang);
                $('#edit_dienthoai').val(data.dienthoai);
                $('#edit_diachi').val(data.diachi);
                $('#edit_gioitinh').val(data.gioitinh);
                $('#edit_email').val(data.email);
                $('#edit_cmnd').val(data.cmnd);
                $('#edit_id').val(data.id);
                $('#edit_khachhang').modal('show');
            }
        })
    });
    $('#frm_edit_khachhang').on('submit',function(event){
        event.preventDefault();
        var form_data = $('#frm_edit_khachhang').serialize();
        var id =  $('#edit_id').val();
        $.ajax({
            url:"khachhang/"+id,
            method:"PUT",
            data:form_data,
            dataType:"json",
            success:function(data)
            {    console.log(data);
                if (data.errors) {
                        $('#edit-name-error').html(data.errors.edit_name);
                        $('#edit-dienthoai-error').html(data.errors.edit_dienthoai);
                        $('#edit-diachi-error').html(data.errors.edit_diachi);
                        $('#edit-gioitinh-error').html(data.errors.edit_gioitinh);
                        $('#edit-cmnd-error').html(data.errors.edit_cmnd);
                    swal({
                        title: "Errors!",
                        text: "Có Lỗi Khi Thêm Dữ Liệu",
                        icon: "error",
                        timer: '1300'
                    });

                }
                if (data.success) {

                    $('#edit_khachhang').modal('hide');
                    swal({
                        title: "Success!",
                        text: "Cập Nhật Dữ Liệu Thành Công",
                        icon: "success",
                        timer: '1300'
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
            url:"khachhang/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#delete_id').val(data.id);
                $('#khachhang_name').html(data.tenkhachhang);
                $('#delete_khachhang').modal('show');
            }
        })
    });


    $('#del_frm_khachhang').on('submit', function(event){
        event.preventDefault();
        var form_data = $('#del_frm_khachhang').serialize();
        var id =  $('#delete_id').val();
        $.ajax({
            url:"./khachhang",
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
                        timer: '1000'
                    });
                    $('#delete_khachhang').modal('hide');
                }
                else{
                    swal({
                        title: "Success!",
                        text: "Xóa Dữ Liệu Thành Công",
                        icon: "success",
                        timer: '1000'
                    });
                    $('#delete_khachhang').modal('hide');
                    datatables.ajax.reload();
                }
            }
        })
    });





});