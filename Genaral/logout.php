<?php
session_start(); // Bắt đầu session

include 'session.php';
$ss = new Session();

$ss->delete('username'); // Xóa session 'username'

$ss->destroy(); // Hủy toàn bộ session

header("Location: ../Login.php"); // Chuyển hướng người dùng đến trang đăng nhập
exit();
?>