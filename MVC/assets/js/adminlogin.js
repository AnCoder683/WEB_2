$("#loginform").submit(function (event) {
    event.preventDefault();
    var formData = $(this).serializeArray();
    formData.push({name: 'action', value: 'themloaisanpham'});
    $.ajax({
        type: 'POST',
        url: BASE_URL+'/auth/loginhandle', // Đường dẫn tới trang quản trị
        data: formData,
        success: function (response) {
            // Xử lý phản hồi từ server
            response = JSON.parse(response);
            if (response['success']) {
                // Chuyển hướng đến trang đăng nhập hoặc hiển thị thông báo lỗi
                window.location.href = response['redirect'];
            } else {
                showAlert(response['error'],'danger');
            }
        },
    });
});