<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="./CSS/MainCSS/font&sizing.css">
   <link rel="stylesheet" href="./CSS/Login-SignupCSS/Signup.css">
</head>
<body>
   <form class="signup-form" action="signup.php" method="POST">
      <h1>Đăng ký</h1>
      <div class="form-input">
         <label for="">Tài Khoản:</label>
         <input placeholder="User" type="text" name="text_username">
         <div id="error-message-username" style="display: none; color: red;">Tài khoản đã tồn tại!</div> 
      </div>
      <div class="form-input">
         <label for="">Mật khẩu:</label>
         <input placeholder="Password" type="password" name="text_password">
         <div id="error-message-password" style="display: none; color: red;">Mật khẩu và xác nhận mật khẩu không đúng</div> 
      </div>
      <div class="form-input">
         <label for="">Nhập lại Mật khẩu:</label>
         <input placeholder="Password" type="password" name="text_password_confirm">
         <div id="error-message-password" style="display: none; color: red;">Mật khẩu và xác nhận mật khẩu không đúng</div> 
      </div>
      <div class="reNameThis">
         <input class="abc" type="checkbox" name="policy_acception">
         <label>Chấp nhận <a href="">điều khoản.</a></label> <br>
         <div id="error-message-checkbox" style="display: none; color: red;">Chưa đồng ý với các điều khoản</div> 
      </div>
      <button class="signup-button">Đăng ký</button>
      <div class="just-a-line">
         <span>Hoặc</span>
      </div>

      <div class="signup-with-wrapper"> 
         <a href="" class="signup-with Google">
            <img src="logo/google.svg" alt="">
            Google
         </a>
         <a href="" class="signup-with Facebook">
            <img src="logo/facebook.svg" alt="">
            Facebook
         </a>
      </div>
   </form>
</body>
</html>


<?php 
function RegisterUser($username, $password, $password_confirm){
   $servername = "localhost";
   $dbusername = "root";
   $dbpassword = "";
   $dbname = "fashionstore";

   $checkbox = $_POST["policy_acception"];

   $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
   // Kiểm tra kết nối
   if ($conn->connect_error) {
       die("Kết nối không thành công: " . $conn->connect_error);
   }

   $check_sql = "SELECT * FROM taikhoan WHERE taikhoan='$username'";
   $check_result = $conn->query($check_sql);
   if ($check_result->num_rows > 0) {
       echo "<script>document.getElementById('error-message-username').style.display = 'block';</script>";
       return;
   }

   if($password != $password_confirm){
      echo "<script>document.getElementById('error-message-password').style.display = 'block';</script>";
      return;
   }

   if(empty($checkbox)){
      echo "<script>document.getElementById('error-message-checkbox').style.display = 'block';</script>";
      return;
   }

   $sql = "INSERT INTO taikhoan (taikhoan, matkhau) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Đăng ký thành công.";
        header("Location: Login.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST["text_username"];
   $password = $_POST["text_password"];
   $password_confirm = $_POST["text_password_confirm"];
   RegisterUser($username, $password, $password_confirm);
}

?>