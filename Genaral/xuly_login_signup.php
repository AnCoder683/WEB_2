<?php
require_once 'connect.php';
include('general.php');

function SignupUser($username, $password, $password_confirm, $fullname, $email, $phone)
{
    $db = new DatabaseUtil();
    $conn = $db->connect();
    $query = "SELECT * FROM taikhoan WHERE tenDanhNhap='$username'";
    $result = $db->executeQuery($query);
    $query_taikhoan = "INSERT INTO taikhoan (maTK, tenDanhNhap, MatKhau, tinhTrang, iqQuyen) VALUES ('','$username', '$password', 0, 'Q001')";
    $query_khachhang = "INSERT INTO khachhang (idKhachHang, ten, SDT, email, gioiTinh, ngaySinh, diaChiGiaoHang) VALUES ('$username', '$fullname', '$phone', '$email', 1, '', '')";
    if ($result->num_rows > 0) {
        echo json_encode(array("status" => 0,"message" => "exist-account_error"));
        exit();
    }else if ($db->executeQuery($query_khachhang)) {
        $db->executeQuery($query_taikhoan);
        echo json_encode(array("status" => 1,"message" => "signup_success"));
        exit();
    }
}

function LoginUser($username, $password)
{
    $role_admin = "Q000";
    $role_user = "Q001";
    $role_staff = "Q002";
    $ss = new Session();
    $db = new DatabaseUtil();
    $conn = $db->connect();
    $query = "SELECT * FROM taikhoan WHERE tenDanhNhap='$username'";
    // code moi
    $username = @mysqli_real_escape_string($conn, $_POST['text_username_login']);
    $password = @mysqli_real_escape_string($conn, $_POST['text_password_login']);
    $query_check_exist_user = mysqli_query($conn, "SELECT * FROM taikhoan WHERE tenDanhNhap = '$username'");
    if (mysqli_num_rows($query_check_exist_user)) {
        $query_check_login = mysqli_query($conn, "SELECT * FROM taikhoan WHERE tenDanhNhap = '$username' AND MatKhau = '$password'");
        if (mysqli_num_rows($query_check_login)) {
            // $_SESSION['username'] = $username;
            $ss::set('username', $username);
            // echo '<script>window.location.reload();</script>';
        }
    }
    // code moi
    $result = $db->executeQuery($query);
    $user = $result->fetch_assoc();
    if ($result->num_rows == 0) {
        echo json_encode(array("status" => 0,"message" => "do-not-exist_error"));
        // Tài khoản không tồn tại, trả về thông báo lỗi
        // header("Location: ../login.php?error=username_not_found");
        exit();
    }elseif ($password !== $user['MatKhau']) {
        echo json_encode(array("status" => 0,"message" => "password_error"));
        // Mật khẩu không đúng, trả về thông báo lỗi
        // header("Location: ../login.php?error=password_mismatch");
        exit();
    }elseif ($password === $user['MatKhau'] && $user['iqQuyen'] === $role_user){
        echo json_encode(array("status" => 1,"message" => "login_success", "role" => "user"));
        // header("Location: ../Main.php?login_success=true");
        exit();
    }elseif ($password === $user['MatKhau'] && $user['iqQuyen'] === $role_admin){
        echo json_encode(array("status" => 1,"message" => "login_success", "role" => "admin"));
    }
}

if (isset($_POST['text_remember'])) {
    setcookie('remembered_username', $_POST['text_username_login'], time() + (86400 * 30), "/");
    setcookie('remembered_username', $_POST['text_password_login'], time() + (86400 * 30), "/");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['text_username']) && isset($_POST['text_password']) && isset($_POST['text_password_confirm']) && isset($_POST['text_fullname']) && isset($_POST['text_email']) && isset($_POST['text_phone_number'])) {
        SignupUser($_POST['text_username'], $_POST['text_password'], $_POST['text_password_confirm'], $_POST['text_fullname'], $_POST['text_email'], $_POST['text_phone_number']);
    }    
    if(isset($_POST['text_username_login']) && isset($_POST['text_password_login'])) {
        LoginUser($_POST['text_username_login'], $_POST['text_password_login']);
    }
}
