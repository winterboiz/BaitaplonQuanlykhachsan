$(function () {
    $('#frm_add_phong').on('submit', function(e) {
        e.preventDefault();
        var formData = $("#frm_add_phong").serialize();
        $('#name-error').html("");
        var formd=  new FormData($("#frm_add_phong")[0]);
        $.ajax({
            url: "./phong",
            type: "POST",
            data:formd,
            contentType:false,
            processData:false,
            success: function (data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.name) {
                        $('#name-error').html(data.errors.name);
                        $('#mota-error').html(data.errors.mota);
                        $('#loaiphong_id-error').html(data.errors.loaiphong_id);
                    }

                }
                if (data.success) {
                    $(this).html('');
                    $("#frm_add_phong")[0].reset();
                    $('#add_phong').modal('hide');
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

    //
    // $(document).on('click', '.btn-edit', function(){
    //     var id = $(this).data('id');
    //     var url = $(this).data('show');
    //     var editUrl = $(this).data('url');
    //     // $('#frm_edit_loaiphong').attr('action', editUrl);
    //     $.ajax({
    //         url:"phong/"+id,
    //         method:'get',
    //         dataType:'json',
    //         success:function(data)
    //         {
    //             $('#edit_name').val(data.tenphong);
    //             $('#edit_mota').val(data.mota);
    //             $('#edit_loaiphong_id').val(data.loaiphong_id);
    //             $('#image_thumbnail').attr("src",data.image);
    //             $('#edit_id').val(data.id);
    //             $('#edit_loaiphong').modal('show');
    //         }
    //     })
    // });
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    // $('#frm_edit_phong').on('click', '#btn_edit_phong',function(event){
    //     event.preventDefault();
    //     var formd=new FormData($("#frm_edit_phong")[0]);
    //     var form_data = $(this).serialize();
    //     var id =  $('#edit_id').val();
    //     $.ajax({
    //         url:"./phong/"+id,
    //         method:"POST",
    //         data:formd,
    //         dataType:"json",
    //         contentType:false,
    //         processData:false,
    //         success:function(data)
    //         {    console.log(formd);
    //             if (data.errors) {
    //                 if (data.errors.edit_name) {
    //                     $('#edit-name-error').html(data.errors.edit_name);
    //                     $('#edit-mota-error').html(data.errors.edit_mota[0]);
    //                     $('#ledit-oaiphong_id-error').html(data.errors.edit_loaiphong_id);
    //                 }
    //             }
    //             if (data.success) {
    //
    //                 $('#edit_phong').modal('hide');
    //                 swal({
    //                     title: "Success!",
    //                     text: "Thêm Dữ Liệu Thành Công",
    //                     icon: "success",
    //                     timer: '2000'
    //                 });
    //                 datatables.ajax.reload();
    //             }
    //         }
    //     })
    // });




    $(document).on('click', '#btn_delete', function(){
        var id = $(this).data('id');
        var delete_id = $('#delete_id').val(id);
        $('#delete_phong').modal('show');
        console.log(delete_id);

    });
    $('#del_frm_phong').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        var id =  $('#delete_id').val();
        $.ajax({
            url:"./phong/"+id,
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
                    $('#delete_phong').modal('hide');
                    datatables.ajax.reload();
                }
            }
        })
    });




});