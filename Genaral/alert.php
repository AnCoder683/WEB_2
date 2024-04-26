<?php
if (isset($_GET['login_success']) && $_GET['login_success'] == true) {
   echo "<script>alert('Đăng nhập thành công.');</script>";
}
?>