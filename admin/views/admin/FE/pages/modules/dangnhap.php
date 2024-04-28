<!doctype html>
<html lang="en">
    <head>
        <title>Đăng nhập</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .alert {
            position: fixed;
            top: 10px;
            right: 10px;
        }
        .container-fluid{
            border: yellow solid 1px;
            padding: 10px;
            height: 100vh;
        }
        .btn-dangnhap {
            border-radius: 5px;
        }
        .login-title{
            font-weight: bold;
            font-size: 500;
        }
        .login-container {
            height: 400px;
            padding: 20px 30px;
            border-radius: 10px;
        }

    </style>
    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div class="container-fluid d-flex justify-content-center align-items-center bg-danger">
                <div class="login-container bg-info">
                    <div class="login-title">ĐĂNG NHẬP</div>
                    <form class="was-validated" action="xuly.php" method="post">
                        <div class="mt-3 mb-3">
                            <label for="email" class="form-label">Tài khoản:</label>
                            <input type="text" class="form-control" id="user" name="user" placeholder="Nhập nhập tài khoản" required>
                            <div class="valid-feedback">Ok</div>
                            <div class="invalid-feedback">Vui lòng nhập tài khoản.</div>
                        </div>
                        <div class="mt-3">
                            <label for="email" class="form-label">Mật khẩu:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                            <div class="valid-feedback">Ok</div>
                            <div class="invalid-feedback">Vui lòng nhập mật khẩu</div>   
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Đăng nhập">
                    </form>
                </div>
                <?php
                        if(isset($_GET['success'])) {
                            $permission = $_GET['permission'];
                            echo "<div id=\"alert\" class=\"alert alert-success\">
                                <strong>Success!</strong> Đăng nhập thành công với tư cách là " . $permission . 
                            "</div>" ;
                                
                        } elseif(isset($_GET['error'])) {
                            echo "<div id=\"alert\" class=\"alert alert-danger\">
                                    <strong>Failed!</strong> Đăng nhập thất bại
                                </div>";
                        }
                    ?>
                    <script>
                        var notification = document.getElementById('alert');
                        setTimeout(function() {
                            notification.style.display = 'none';
                        }, 3000);
                    </script>
            </div>
            <div class="box">
                <div></div>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
            
        ></script>
    </body>
</html>
