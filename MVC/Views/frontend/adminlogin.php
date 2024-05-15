<?php
    include("./MVC/middlewares/check_adminlogin.php");
    isLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>

    <link rel="stylesheet" href="<?= BASE_ASSETS?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_ASSETS?>/css/style.css">
        <!-- js library for ajax-->
    <script src="<?= BASE_ASSETS?>/js/jquery-3.7.1.js"></script>
    <script src="<?= BASE_ASSETS?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_ASSETS?>/js/script.js"></script>
    
    
</head>

<body>
    <div class="container my-5 w-25 m-auto">
        <div class="w-100 d-flex align-items-center">
            <img src="<?= BASE_ASSETS?>/img/logo.svg" class="d-block w-100 m-auto">
        </div>
        <p class="my-3 fw-medium text-center fs-1">Quản Trị Viên</p>
        <form action="#" id="loginform" method="POST">
            <div class="form-group mb-3">
                <label for="username" class="form-label">Tài khoản</label>
                <input type="text" name="username" id="username" ng-model="username" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="password" class="form-label">Mật Khẩu</label>
                <input type="password" name="password" id="password" ng-model="password" class="form-control">
            </div>

            <div class="form-group my-3">
                <button type="submit" class="btn btn-danger w-100">Đăng Nhập</button>
            </div>
        </form>
    </div>
    <?php 
        if(isset($_SESSION['message'])){
            // Lấy giá trị của message từ session
            $message = $_SESSION['message'];
            // Sau khi sử dụng giá trị message, bạn có thể xóa nó khỏi session nếu cần
            unset($_SESSION['message']);
            // Sử dụng giá trị của message theo nhu cầu của bạn
            echo '<script>showAlert("'.$message.'", "danger");</script>';
        } 
    ?>
    <script src="<?= BASE_ASSETS?>/js/adminlogin.js"></script>
</body>

</html>