<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>

    <link rel="stylesheet" href="<?php echo BASE_ASSETS?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS?>/css/style.css">
</head>

<body>

    <div class="container my-5 w-25 m-auto">
        <div class="w-100 d-flex align-items-center">
            <img src="<?php echo BASE_ASSETS?>/img/logo.svg" class="d-block w-100 m-auto">
        </div>
        <p class="my-3 fw-medium text-center fs-1">Quản Trị Viên</p>

        <form action="<?php echo BASE_URL?>/admin/loginhandle" method="POST">
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

    <script src="<?php echo BASE_ASSETS?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_ASSETS?>/js/script.js"></script>
</body>

</html>