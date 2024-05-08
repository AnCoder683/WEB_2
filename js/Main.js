document.addEventListener("DOMContentLoaded", function() {
    // Lắng nghe sự kiện click từ biểu tượng người dùng
    document.querySelector('.user').addEventListener('click', function() {
        // Lấy phần tử chứa menu người dùng
        var userSelection = document.querySelector('.user-selection');

        // Kiểm tra hiển thị của menu người dùng
        if (userSelection.style.display === "none") {
            // Nếu đang ẩn, hiển thị menu người dùng
            userSelection.style.display = "block";
        } else {
            // Nếu đang hiển thị, ẩn menu người dùng
            userSelection.style.display = "none";
        }
    });
});
