$(function () {
    $("#add_monhoc").select2({
        placeholder: "--Chọn môn học--",
        multiple: true,
    });
    $("#add_gioitinh").select2({
        placeholder: "--Giới Tính--",
        allowClear: true,
        minimumResultsForSearch: -1
    });
    $("#type_search").select2({
        minimumResultsForSearch: -1,
    });
    $("#type_search").change(function () {
       $("#search-lop").val("");
       $("#search-masv").val("");
       $("#search-hosv").val("");
       $("#search-tensv").val("");
       $("#search-quequan").val("");
        datatable.ajax.reload();
    });
    $('#btn_add_student').on('click', function (e) {
        e.preventDefault();
        $('#frm_add_student').submit();
    });
    $('#frm_add_student').validate({
        errorClass: 'error-msg-validate',
        rules: {
            add_hosv: {
                required: true,
            },
            add_tensv: {
                required: true,
            },
            add_gioitinh: {
                required: true,
            },
            add_ngaysinh: {
                required: true,
            },
            add_monhoc: {
                required: true,
            },
            add_quequan: {
                required: true,
            },
        }
    });
    $("#frm_add_student").on('submit', function (e) {
        if ($(this).valid()) {
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.post(url, data, function (resp) {
                if (resp.error == 1) {
                    toastr.error(resp.message, 'Thông Báo!', {closeButton: true});
                    datatable.ajax.reload();
                    $('#add_student').modal('hide');
                } else {
                    toastr.success(resp.message, 'Thông Báo!', {closeButton: true});
                    datatable.ajax.reload();
                    $('#add_student').modal('hide');
                }
            }, 'json');
            return false;
        }
    });
    /**
     * Edit form
     */
    $('#btn_edit_student').on('click', function (e) {
        e.preventDefault();
        $('#frm_edit_student').submit();
    })
    $('#frm_edit_student').validate({
        errorClass: 'error-msg-validate',
        rules: {
            edit_hosv: {
                required: true,
            },
            edit_tensv: {
                required: true,
            },
            edit_gioitinh: {
                required: true,
            },
            edit_ngaysinh: {
                required: true,
            },
            edit_quequan: {
                required: true,
            },
        }
    });
    $("#frm_edit_student").on('submit', function (e) {
        if ($(this).valid()) {
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.post(url, data, function (resp) {
                if (resp.error == 1) {
                    toastr.error(resp.message, 'Thông Báo!', {closeButton: true});
                } else {
                    toastr.success(resp.message, 'Thông Báo!', {closeButton: true});
                    datatable.ajax.reload();
                    $('#edit_student').modal('hide');
                    // $('#edit_name').val('');
                    // $('#edit_email').val('');
                    // $('#edit_level').select2('val', 'All');
                }
            }, 'json');
            return false;
        }
    });
});