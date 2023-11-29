$(function () {

    $('#frm_add_thuephong').on('click','#btn_add_thuephong',function (e) {
        event.preventDefault();
        $('#name-error').html("");
        var formData=  $('#frm_add_thuephong').serialize();
        $.ajax({
            url: "./thuephong",
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
                    $("#frm_add_thuephong")[0].reset();
                    $('#add_thuephong').modal('hide');
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
    $(document).ready(function(){
        $('#inhoadon').click(function () {
            $('#invoiceheader,#invoicebody').printThis();
        });
    });



    $(document).on('click', '.btn-edit', function(){
        var id = $(this).data('id');
        var url = $(this).data('show');
        $.ajax({
            url:"thuephong/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit_name').val(data.tenkhachhang);
                $('#edit_khachhang_id').val(data.khachhang_id);
                $('#p_id').val(data.phong_id);
                $('#tenphong').val(data.tenphong);
                $('#edit_checkin').val(data.ngaydat);
                $('#edit_checkout').val(data.ngaytra);
                $('#edit_id').val(data.id);
            }
        })
    });

    $(function () {
        $('#edit_checkin').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#edit_checkout').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });

    $('#frm_edit_thuephong').on('submit',function(event){
        event.preventDefault();
        var formd=new FormData($("#frm_edit_thuephong")[0]);
        var form_data = $(this).serialize();
        var id =  $('#edit_id').val();
        $.ajax({
            url:"thuephong/"+id,
            method:"put",
            data:form_data,
            success:function(data)
            {    console.log(form_data);
                if (data.errors) {
                    $('#edit-name-error').html(data.errors.edit_name);
                    $('#edit-dienthoai-error').html(data.errors.edit_dienthoai);
                    $('#edit_phong_id_error').html(data.errors.edit_phong_id);
                    swal({
                        title: "Errors!",
                        text: "Có Lỗi Khi Thêm Dữ Liệu",
                        icon: "error",
                        timer: '1300'
                    });

                }
                if (data.success) {

                    $('#edit_thuephong').modal('hide');
                    swal({
                        title: "Success!",
                        text: "Thêm Dữ Liệu Thành Công",
                        icon: "success",
                        timer: '1300'
                    });
                    setTimeout(location.reload.bind(location), 1300);
                }
            }
        })
    });


});