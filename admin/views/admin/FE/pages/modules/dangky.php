<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Đăng ký</title>
</head>
<style>
.register-container{
    background-color: white;
    padding: 10px;
}
body{
    background-color: #07214a ;
}
</style>
<body>
    <div class="container register-form d-flex justify-content-center align-items-center">
        <div class="register-container">
            <div class="register-title ">Form đăng ký</div>
            <div id="note"></div>
            <form class="was-validated" onSubmit="return check_register()" method="post">
                <div class="mb-3 mt-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="fullname" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="fullname" placeholder="Nhập họ và tên" name="fullname" required>
                        </div>
                        <div class="col-md-6">
                            <label for="user" class="form-label">Tên người dùng</label>
                            <input type="text" class="form-control" id="user" placeholder="Nhập tên người dùng" name="user" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address">
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password">
                        </div>
                    </div>
                    <div class="row mt-3">
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email">
                        </div>
                        <div class="col-md-6">
                            <label for="repassword" class="form-label">Nhập lại mật khẩu</label>
                            <input type="tel" class="form-control" id="repassword" placeholder="Xác nhận lại mật khẩu" name="repassword">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="phonenum" class="form-label">SDT</label>
                            <input type="tel" class="form-control" id="phonenum" placeholder="Nhập số điện thoại" name="phonenum">
                        </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mt-3" value="Đăng ký">
                    <?php
                        if(isset($_GET['success'])) {
                            echo "<p style='color: green;'>Đăng ký thành công!</p>";
                        } elseif(isset($_GET['error'])) {
                            echo "<p style='color: red;'>Đăng ký thất bại. Vui lòng thử lại!</p>";
                        }
                    ?>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    var fullname, address, email, phonenum, user, pwd, repwd
    function check_register() {
        fullname = document.getElementById('fullname').value;
        address = document.getElementById('address').value;
        email = document.getElementById('email');
        phonenum = document.getElementById('phonenum');
        user = document.getElementById('user');
        pwd = document.getElementById('password');
        repwd = document.getElementById('repassword');
        if (fullname == "") {
            document.getElementById('note').innerText = "Vui lòng nhập đầy đủ họ và tên";
            document.getElementById('note').style.color = "red";
            document.getElementById('reg-fullname').focus();
            return false;
        }
    }
</script>
</html>