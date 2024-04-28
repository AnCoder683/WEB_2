<?php
if(isset($_POST['submit'])) {
    // Kết nối đến cơ sở dữ liệu
    require_once 'ketnoidb.php';
    // Lấy dữ liệu từ form
    $username = $_POST['user'];
    $password = $_POST['password'];

    // Thực hiện truy vấn để chèn dữ liệu vào cơ sở dữ liệu
    // $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    // $sql = "SELECT * FROM taikhoan where taikhoan = '$username' and matkhau = '$password'";
    $sql = "SELECT *
    FROM taikhoan AS TK
    INNER JOIN PhanQuyenNguoiDung AS PQ ON TK.TaiKhoan = PQ.TaiKhoan
    INNER JOIN Quyen AS Q ON PQ.idQuyen = Q.idQuyen 
    WHERE TK.TaiKhoan = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Đăng ký thành công, chuyển hướng người dùng về trang đăng ký với thông báo thành công
        $row = $result->fetch_assoc();
        $quyen = $row["Quyen"];
        header("Location: dangnhap.php?success=1&permission=" . urlencode($quyen));
        exit();
    } else {
        // Đăng ký thất bại, chuyển hướng người dùng về trang đăng ký với thông báo lỗi
        header("Location: dangnhap.php?error=1" . urlencode($quyen));
        exit();
    }

    $conn->close();
}
?>
