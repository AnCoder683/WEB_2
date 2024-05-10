var formSubmitted = false;
function sendPermissionRequest() {
    $.ajax({
        url: BASE_URL+'/admin/getpermission', // Đường dẫn đến file xử lý AJAX
        data: $(this).serializeArray(),
        success: function(response) {
            // Xử lý phản hồi từ máy chủ
            var permission = JSON.parse(response);
            // if(permission[0].tinhtrang == "0") {
            //     showAlert("Tài khoản của bạn đã bị khóa", "danger");
            //     blockAccount();
            //     return;
            // }
            formSubmitted = true;
            for (var i = 0; i < permission.length; i++) {
                var element = document.getElementById(permission[i].tenchucnang);
                if (element) {
                    // Gán giá trị cho thuộc tính display của phần tử
                    element.style.display = "list-item";
                } else {
                    console.error("Không tìm thấy phần tử với ID: " + item);
                }
            }
        },
    });
}
window.addEventListener('load', function() {
    // Chỉ gọi hàm sendPermissionRequest() nếu form đã được submit
    if (!formSubmitted) {
        sendPermissionRequest();
    }
});