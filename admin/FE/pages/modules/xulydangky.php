<?php
if(isset($_POST['submit'])) {
    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root"; // Thay bằng tên người dùng cơ sở dữ liệu
    $password = ""; // Thay bằng mật khẩu của người dùng cơ sở dữ liệu
    $dbname = "FashionStore"; // Thay bằng tên cơ sở dữ liệu

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Lấy dữ liệu từ form
    $username = $_POST['user'];
    $password = $_POST['password'];

    // Thực hiện truy vấn để chèn dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        // Đăng ký thành công, chuyển hướng người dùng về trang đăng ký với thông báo thành công
        header("Location: dangky.php?success=1");
        exit();
    } else {
        // Đăng ký thất bại, chuyển hướng người dùng về trang đăng ký với thông báo lỗi
        header("Location: dangky.php?error=1");
        exit();
    }

    $conn->close();
}
?>
