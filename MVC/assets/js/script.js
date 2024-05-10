var BASE_URL = "http://localhost/fashionstoremvc";
function changeURL(newURL) {
    window.history.pushState({ path: newURL }, '', newURL);
}
function showAlert(message, type) {
    // Tạo một phần tử div cho thông báo
    var alertDiv = document.createElement('div');
    alertDiv.classList.add('alert', 'alert-' + type);
    alertDiv.textContent = message;
    alertDiv.style.position = 'fixed';
    alertDiv.style.top = '20px';
    alertDiv.style.right = '20px';
    alertDiv.style.zIndex = '9999';
    // Thêm thông báo vào trang
    document.body.appendChild(alertDiv);
    // Tự động biến mất sau một khoảng thời gian
    setTimeout(function() {
        alertDiv.remove();
    }, 3000); // 3000 milliseconds = 3 seconds
}

function confirmLogout() {
    return confirm("Bạn có chắc muốn đăng xuất?");
}