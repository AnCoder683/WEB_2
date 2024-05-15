<?php
require 'connect.php';
require 'session.php';
global $ss;
$ss = new Session();
$ss->start();
function SignupUser($username, $password, $password_confirm, $fullname, $email, $phone, $gender)
{
    if(empty($username) || empty($password) || empty($password_confirm) || empty($fullname) || empty($email) || empty($phone) || empty($gender)){
        echo json_encode(array("status" => 0, "message" => "empty_error"));
        exit();
    }
    $db = new DatabaseUtil();
    $conn = $db->connect();
    $query = "SELECT * FROM taikhoan WHERE tenDangNhap='$username'";
    $result = $db->executeQuery($query);
    $equivalent_gender = -1;
    $gender_from_form = $_POST['gender-selection'];
    if ($gender_from_form === 'Nam') {
        $equivalent_gender = 1;
    } else if ($gender_from_form === 'Nữ') {
        $equivalent_gender = 0;
    } else if ($gender_from_form === 'None') {
        echo json_encode(array("status" => 0, "message" => "gender-selection-error"));
        exit();
    }
    $query_count_accounts = "SELECT COUNT(*) AS total FROM taikhoan";
    $result_count = $db->executeQuery($query_count_accounts);
    $row = $result_count->fetch_assoc();
    $total_accounts = $row['total'] - 1;
    $next_id = str_pad($total_accounts + 1, 3, '0', STR_PAD_LEFT);
    $id = 'TK' . $next_id;
    $query_taikhoan = "INSERT INTO taikhoan (maTK, tenDangNhap, MatKhau, tinhTrang, iqQuyen) VALUES ('$id','$username', '$password', 1, 'Q004')";
    $query_khachhang = "INSERT INTO khachhang (idKhachHang, ten, SDT, email, gioiTinh, ngaySinh, diaChiGiaoHang) VALUES ('$username', '$fullname', '$phone', '$email', '$equivalent_gender', '', '')";
    if ($result->num_rows > 0) {
        echo json_encode(array("status" => 0, "message" => "exist-account_error"));
        exit();
    } else if ($db->executeQuery($query_taikhoan)) {
        $db->executeQuery($query_khachhang);
        echo json_encode(array("status" => 1, "message" => "signup_success"));
        exit();
    }
}

function LoginUser($username, $password)
{
    if(empty($username) || empty($password)){
        echo json_encode(array("status" => 0, "message" => "empty_error"));
        exit();
    }
    $db = new DatabaseUtil();
    $conn = $db->connect();
    global $ss;
    $query = "SELECT * FROM taikhoan WHERE tenDangNhap='$username'";
    $result = $db->executeQuery($query);
    $user = $result->fetch_assoc();
    if ($result->num_rows == 0) {
        echo json_encode(array("status" => 0, "message" => "do-not-exist_error"));
        exit();
    } elseif ($password !== $user['MatKhau']) {
        echo json_encode(array("status" => 0, "message" => "password_error"));
        exit();
    } elseif($user['tinhTrang'] == 0){
        echo json_encode(array("status" => 0, "message" => "active_error"));
        exit();
    }
    // code moi
    $active_user = 1;
    $username = @mysqli_real_escape_string($conn, $_POST['text_username_login']);
    $password = @mysqli_real_escape_string($conn, $_POST['text_password_login']);
    $query_check_exist_user = mysqli_query($conn, "SELECT * FROM taikhoan WHERE tenDangNhap = '$username'");
    if (mysqli_num_rows($query_check_exist_user)) {
        $query_check_login = mysqli_query($conn, "SELECT * FROM taikhoan WHERE tenDangNhap = '$username' AND MatKhau = '$password' AND tinhTrang = '$active_user'");
        if (mysqli_num_rows($query_check_login)) {
            $ss->set('username', $username);
            echo json_encode(array("status" => 1, "message" => "login_success"));
            exit();
        }
    }
    // code moi
}

function Update($fullname, $phone, $email, $gender, $birthday, $address){
    if(empty($fullname) || empty($phone) || empty($gender) || empty($birthday) || empty($address) || empty($email)){
        echo json_encode(array("status" => 0, "message" => "empty_error"));
        header("Location: ../Main.php?page=Information");
        exit();
    }
    $db = new DatabaseUtil();
    $conn = $db->connect();
    global $ss;
    $username = mysqli_real_escape_string($conn, $ss->get('username'));
    $fullname = mysqli_real_escape_string($conn, $fullname);
    $phone = mysqli_real_escape_string($conn, $phone);
    $email = mysqli_real_escape_string($conn, $email);
    $gender = ($gender === 'Nam') ? 1 : 0; // Convert gender to database format
    $birthday = mysqli_real_escape_string($conn, $birthday);
    $address = mysqli_real_escape_string($conn, $address);

    // Update user information in the database
    $query = "UPDATE khachhang SET ten = '$fullname', SDT = '$phone', email = '$email', gioiTinh = '$gender', ngaySinh = '$birthday', diaChiGiaoHang = '$address' WHERE idKhachHang = '$username'";
    $db->executeQuery($query);
    if ($db->executeQuery($query)) {
        echo json_encode(array("status" => 1, "message" => "update_success"));
        exit();
    } else {
        echo json_encode(array("status" => 0, "message" => "update_error"));
        exit();
    }
}

if (isset($_POST['text_remember'])) {
    setcookie('remembered_username', $_POST['text_username_login'], time() + (86400 * 30), "/");
    setcookie('remembered_username', $_POST['text_password_login'], time() + (86400 * 30), "/");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['text_username']) && isset($_POST['text_password']) && isset($_POST['text_password_confirm']) && isset($_POST['text_fullname']) && isset($_POST['text_email']) && isset($_POST['text_phone_number']) && isset($_POST['gender-selection'])) {
        SignupUser($_POST['text_username'], $_POST['text_password'], $_POST['text_password_confirm'], $_POST['text_fullname'], $_POST['text_email'], $_POST['text_phone_number'], $_POST['gender-selection']);
    }
    if (isset($_POST['text_username_login']) && isset($_POST['text_password_login'])) {
        LoginUser($_POST['text_username_login'], $_POST['text_password_login']);
    }
    if (isset($_POST['updateUsername']) && isset($_POST['updatePhone']) && isset($_POST['updateEmail']) && isset($_POST['updateGender']) && isset($_POST['updateDate']) && isset($_POST['updateAddress'])){
        Update($_POST['updateUsername'], $_POST['updatePhone'], $_POST['updateEmail'], $_POST['updateGender'], $_POST['updateDate'], $_POST['updateAddress']);
    }
}


if ($ss->exist('username')) { // Sử dụng session thông qua session manager
    $username = $ss->get('username');
    echo json_encode(array("status_log" => 1, "message" => "logged_in", "username" => $username));
} else {
    echo json_encode(array("status_log" => 0, "message" => "not_logged_in", "username" => ""));
}
