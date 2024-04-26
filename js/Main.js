document.addEventListener("DOMContentLoaded", function() {
    // Kiểm tra đăng nhập khi trang được tải
    checkLoginStatus();

    function checkLoginStatus() {
        // Gửi yêu cầu Ajax để kiểm tra đăng nhập
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../Genaral/check_login_status.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status === "logged_in") {
                        // Người dùng đã đăng nhập, cập nhật giao diện tương ứng
                        updateLoggedInUI(response.username);
                    } else {
                        // Người dùng chưa đăng nhập, cập nhật giao diện tương ứng
                        updateLoggedOutUI();
                    }
                } else {
                    console.error("Lỗi khi gửi yêu cầu Ajax");
                }
            }
        };
        xhr.send();
    }

    function updateLoggedInUI(username) {
        // Cập nhật giao diện cho trạng thái đã đăng nhập
        var userIcon = document.querySelector('.user');
        var userSelection = document.querySelector('.user-selection');
        var logElement = document.querySelector('.log');
        var unlogElement = document.querySelector('.unlog');

        // Hiển thị tên người dùng và các tùy chọn liên quan
        logElement.innerHTML = `<a href="#">Hi, ${username}</a><br>
                                <a href="#">Thông tin</a><br>
                                <a href="#">Đơn hàng</a><br>
                                <a href="./Genaral/logout.php">Đăng xuất</a>`;

        // Hiển thị các phần tử cần thiết và ẩn phần tử không cần thiết
        userSelection.style.display = 'block';
        logElement.style.display = 'block';
        unlogElement.style.display = 'none';

        // Xử lý sự kiện click cho biểu tượng người dùng
        userIcon.addEventListener('click', function() {
            if (userSelection.style.display === 'block') {
                userSelection.style.display = 'none';
            } else {
                userSelection.style.display = 'block';
            }
        });
    }

    function updateLoggedOutUI() {
        // Cập nhật giao diện cho trạng thái chưa đăng nhập
        var userSelection = document.querySelector('.user-selection');
        var unlogElement = document.querySelector('.unlog');
        var logElement = document.querySelector('.log');

        // Hiển thị các phần tử cần thiết và ẩn phần tử không cần thiết
        userSelection.style.display = 'block';
        unlogElement.style.display = 'block';
        logElement.style.display = 'none';

        // Xử lý sự kiện click cho biểu tượng người dùng
        var userIcon = document.querySelector('.user');
        userIcon.addEventListener('click', function() {
            if (userSelection.style.display === 'block') {
                userSelection.style.display = 'none';
            } else {
                userSelection.style.display = 'block';
            }
        });
    }
});
