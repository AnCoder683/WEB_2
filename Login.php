<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="./CSS/MainCSS/font&sizing.css">
   <link rel="stylesheet" href="./CSS/Login-SignupCSS/Login.css">
</head>
<body>
   <div>
      <form class="login-form" action="<?php echo $_SERVER["PHP_SELF"]; ?>", method="POST">
         <h1>Đăng nhập</h1>
         <div class="form-input">
            <label for="">Tài Khoản:</label>
            <input placeholder="Username" type="text" name="text_username">
         </div>
         <div class="form-input">
            <label for="">Mật khẩu:</label>
            <input placeholder="Password" type="password" name="text_password">
         </div>
         <div class="remember-fogot">
            <label for="">
               <input class="rememberme" type="checkbox" name="text_remember">
               Lưu mật khẩu
            </label>
            <a class="fogot-password" href="">Quên mật khẩu</a>
         </div>
         <button class="login-button">Đăng nhập</button>
         <div id="error-message" style="display: none; color: red;">Tài khoản không tồn tại!</div> 
         <label class="registor" for="">Chưa có tài khoản? <a href="">đăng ký</a></label>
   
         <div class="just-a-line"><span>Hoặc</span></div>
         
         <div class="login-with-wrapper"> 
            <a href="" class="login-with Google">
               <img src="logo/google.svg" alt="">
               Google
            </a>
            <a href="" class="login-with Facebook">
               <img src="logo/facebook.svg" alt="">
               Facebook
            </a>
         </div>
      </form>
   </div>
   
   <script src="https://kit.fontawesome.com/dc0a01535c.js" crossorigin="anonymous"></script>
</body>
</html>

<?php 
   function checkLogin($username, $password) {
      // Kết nối đến cơ sở dữ liệu. Đây là giả định, bạn cần điều chỉnh lại thông tin kết nối của mình.
      $servername = "localhost";
      $dbusername = "root";
      $dbpassword = "";
      $dbname = "fashionstore";
  
      $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
  
      // Kiểm tra kết nối
      if ($conn->connect_error) {
          die("Kết nối không thành công: " . $conn->connect_error);
      }
  
      // Truy vấn kiểm tra tài khoản trong cơ sở dữ liệu
      $sql = "SELECT * FROM taikhoan WHERE taikhoan='$username' AND matkhau='$password'";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
          // Nếu tài khoản tồn tại, đóng kết nối và trả về true
          $conn->close();
          return true;
      } else {
          // Nếu tài khoản không tồn tại, đóng kết nối và trả về false
          $conn->close();
          return false;
      }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST['text_username'] ?? "";
   $password = $_POST['text_password'] ?? "";

   if (isset($_POST['text_remember'])) {
      // Nếu checkbox "Lưu mật khẩu" được chọn, lưu thông tin tài khoản vào cookie
      setcookie('remember_username', $username, time() + (86400 * 30), "/"); // Lưu trong 30 ngày
      setcookie('remember_password', $password, time() + (86400 * 30), "/"); // Lưu trong 30 ngày
   }

   if (checkLogin($username, $password)) {
       // Nếu đăng nhập thành công, chuyển hướng đến trang main.php
       header("Location: Main.php");
       exit();
   } else {
       // Nếu đăng nhập không thành công, hiển thị thông báo lỗi
       echo "<script>document.getElementById('error-message').style.display = 'block';</script>";
   }
   }
?>