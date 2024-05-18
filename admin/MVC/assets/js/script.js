var BASE_URL = "http://localhost/WEB_2/admin";
var BASE_ASSETS = "http://localhost/WEB_2/admin/MVC/assets";
var currentpage = "sanpham";
function changeURL(newURL) {
    window.history.pushState({ path: newURL }, '', newURL);
}
var alertQueue = []; // Hàng đợi lưu trữ các thông báo đang chờ hiển thị
var isAlertShowing = false; // Biến kiểm tra xem có hiển thị thông báo không

function showAlert(message, type) {
    // Thêm thông báo mới vào hàng đợi
    alertQueue.push({ message: message, type: type });

    // Nếu không có thông báo nào đang hiển thị, hiển thị thông báo đầu tiên trong hàng đợi
    if (!isAlertShowing) {
        showNextAlert();
    }
}

function showNextAlert() {
    // Kiểm tra xem có thông báo trong hàng đợi không
    if (alertQueue.length > 0) {
        var nextAlert = alertQueue.shift(); // Lấy thông báo đầu tiên từ hàng đợi
        var message = nextAlert.message;
        var type = nextAlert.type;

        // Tạo một phần tử div cho thông báo
        var alertDiv = document.createElement('div');
        alertDiv.classList.add('alert', 'alert-' + type);
        alertDiv.textContent = message;
        alertDiv.style.position = 'fixed';
        alertDiv.style.top = '20px';
        alertDiv.style.right = '20px';
        alertDiv.style.zIndex = '9999';

        // Tạo nút tắt
        var closeButton = document.createElement('button');
        closeButton.setAttribute('type', 'button');
        closeButton.classList.add('btn-close');
        closeButton.setAttribute('aria-label', 'Close');
        closeButton.addEventListener('click', function() {
            alertDiv.remove();
            isAlertShowing = false; // Đặt lại biến kiểm tra
            showNextAlert(); // Hiển thị thông báo tiếp theo trong hàng đợi (nếu có)
        });

        // Thêm nút tắt vào thông báo
        alertDiv.appendChild(closeButton);

        // Thêm thông báo vào trang
        document.body.appendChild(alertDiv);

        isAlertShowing = true; // Đặt biến kiểm tra

        // Tự động biến mất sau một khoảng thời gian
        setTimeout(function() {
            alertDiv.remove();
            isAlertShowing = false; // Đặt lại biến kiểm tra
            showNextAlert(); // Hiển thị thông báo tiếp theo trong hàng đợi (nếu có)
        }, 3000); // 3000 milliseconds = 3 seconds
    }
}

function confirmLogout() {
    return confirm("Bạn có chắc muốn đăng xuất?");
}

function confirmAction() {
    return confirm("Bạn có muốn thực hiện hành động này?");
}
function textconfirm(text) {
    return confirm(text);
}
function setcurrentpage(page) {
    currentpage = page;
}
