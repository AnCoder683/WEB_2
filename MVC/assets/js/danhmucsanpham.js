$("#formThemLoaiSanPham").submit(function (event) {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: BASE_URL+'/loaisanpham/them', // Đường dẫn tới trang quản trị
        data: $(this).serializeArray(),
        success: function (response) {
            // Xử lý phản hồi từ server
            response = JSON.parse(response);
            if (response['result']) {
                // Chuyển hướng đến trang đăng nhập hoặc hiển thị thông báo lỗi
                showAlert(response['message'],'success');
                alert(response['message']);
            } else {
                showAlert(response['message'],'danger');
            }
        },
    });
});

$("#formSuaLoaiSanPham").submit(function (event) {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: BASE_URL+'/loaisanpham/sua', // Đường dẫn tới trang quản trị
        data: $(this).serializeArray(),
        success: function (response) {
            // Xử lý phản hồi từ server
            response = JSON.parse(response);
            if (response['result']) {
                // Chuyển hướng đến trang đăng nhập hoặc hiển thị thông báo lỗi
                showAlert(response['message'],'success');
                alert(response['message']);
            } else {
                showAlert(response['message'],'danger');
            }
        },
    });
});




function xoaLoaiSanPham(id) {
    if(confirmAction()) {
            $.ajax({
                type: 'POST',
                url: BASE_URL+'/loaisanpham/xoa/'+id, // Đường dẫn tới trang quản trị
                data: $(this).serializeArray(),
                success: function (response) {
                    // Xử lý phản hồi từ server
                    response = JSON.parse(response);
                    if (response['result']) {
                        // Chuyển hướng đến trang đăng nhập hoặc hiển thị thông báo lỗi
                        showAlert(response['message'],'success');
                        alert(response['message']);
                        window.location.href = BASE_URL+'/loaisanpham';
                    } else {
                        showAlert(response['message'],'danger');
                    }
                },
            });
    }
}
