$(function () {
    $('#frm_add_datphong').on('click','#btn_add_datphong',function (e) {
        event.preventDefault();
        $('#name-error').html("");
        var formData=  $('#frm_add_datphong').serialize();
        $.ajax({
            url: "./datphong",
            type: "POST",
            data:formData,
            success: function (data) {

                if (data.errors) {
                    $('#name-error').html(data.errors.name);
                    $('#dienthoai-error').html(data.errors.dienthoai);
                    $('#cmnd-error').html(data.errors.cmnd);
                    $('#diachi-error').html(data.errors.diachi);
                    $('#gioitinh-error').html(data.errors.gioitinh);
                    $('#phong_id-error').html(data.errors.phong_id);
                    swal({
                        title: "Errors!",
                        text: "Có Lỗi Khi Thêm Dữ Liệu",
                        icon: "error",
                        timer: '1000'
                    });

                }
                if (data.success) {
                    $(this).html('');
                    $("#frm_add_datphong")[0].reset();
                    $('#add_datphong').modal('hide');
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
            url:"datphong/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit_name').val(data.tenkhachhang);
                $('#edit_khachhang_id').val(data.khachhang_id);
                $('#edit_dienthoai').val(data.sodienthoai);
                $('#edit_cmnd').val(data.cmnd);
                $('#edit_phong_id').val(data.phong_id);
                $('#edit_checkin').val(data.ngaydat);
                $('#edit_checkout').val(data.ngaytra);
                $('#edit_id').val(data.id);
                $('#edit_order').modal('show');
            }
        })
    });

        $(document).on('click', '.btn-show', function(){
        var id = $(this).data('id');
        var url = $(this).data('show');
        $.ajax({
            url:"datphong/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#show_name').val(data.tenkhachhang);
                $('#show_dienthoai').val(data.sodienthoai);
                $('#show_cmnd').val(data.cmnd);
                $('#show_gioitinh').val(data.gioitinh);
                $('#show_phong_id').val(data.phong_id);
                $('#show_checkin').val(data.ngaydat);
                $('#show_checkout').val(data.ngaytra);
                $('#show_id').val(data.id);
                $('#show_order').modal('show');
            }
        })
    });



    $('#frm_edit_order').on('submit',function(event){
        event.preventDefault();
        var formd=new FormData($("#frm_edit_order")[0]);
        var form_data = $(this).serialize();
        var id =  $('#edit_id').val();
        $.ajax({
            url:"./datphong/"+id,
            method:"post",
            data:form_data,
            dataType:"json",
            success:function(data)
            {    console.log(form_data);
                if (data.errors) {
                    $('#edit-name-error').html(data.errors.edit_name);
                    $('#edit-dienthoai-error').html(data.errors.edit_dienthoai);
                    $('#edit-cmnd-error').html(data.errors.edit_cmnd);
                    swal({
                        title: "Errors!",
                        text: "Có Lỗi Khi Thêm Dữ Liệu",
                        icon: "error",
                        timer: '1300'
                    });

                }
                if (data.success) {

                    $('#edit_phong').modal('hide');
                    swal({
                        title: "Success!",
                        text: "Thêm Dữ Liệu Thành Công",
                        icon: "success",
                        timer: '1300'
                    });
                    $('#edit_order').modal('hide');
                    datatables.ajax.reload();
                }
            }
        })
    });

    $(document).on('click', '.btn_delete', function(){
        var id = $(this).data('id');
        var phong_id = $(this).data('phongid');
        var delete_id = $('#delete_id').val(id);
        var phong = $('#phong_id2').val(phong_id);
        $('#delete_datphong').modal('show');
''
    });
''
    $('#del_frm_datphong').on('submit', function(event){
        event.preventDefault();
        var form_data = $('#del_frm_datphong').serialize();
        var id =  $('#delete_id').val();
        $.ajax({
            url:"./datphong/"+id,
            method:"delete",
            data:form_data,
            dataType:'json',
            success:function(data)
            {

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
                    $('#delete_datphong').modal('hide');
                    datatables.ajax.reload();
                }
            }
        })
    });





});