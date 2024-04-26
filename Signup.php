<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="./CSS/MainCSS/font&sizing.css">
   <link rel="stylesheet" href="./CSS/Login-SignupCSS/Signup.css">
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
   <form class="signup-form" id="signup-form" action="./Signup.php" method="POST">
      <h1>Đăng ký</h1>
      <div class="auth__form">
         <div class="auth__form-group1">
            <div class="form-input">
               <label for="">Tài Khoản:</label>
               <input placeholder="Username" type="text" name="text_username" oninput="checking_Username()">
               <div id="empty-username-error-massage" style="display: none; color: red;" ">Tài khoản không được để trống</div>
               <div id=" at_least_8_chars-involing_char_num-username-error-massage" style="display: none; color: red;" ">Tài khoản phải dài hơn 8 ký tự, chứa cả chữ và số </div>
            </div>
            <div class=" form-input">
               <label for="">Mật khẩu:</label>
               <input placeholder="Password" type="password" name="text_password" oninput="checking_Password()">
               <div id="empty-password-error-massage" style="display: none; color: red;">Mật khẩu không được để trống</div>
               <div id="at_least_8_chars-involing_char_num-password-error-massage" style="display: none; color: red;">Mật khẩu phải dài hơn 8 ký tự, chứa cả chữ và số</div>
            </div>
            <div class="form-input">
               <label for="">Nhập lại Mật khẩu:</label>
               <input placeholder="Password" type="password" name="text_password_confirm" onchange="checking_Confirmed_Password()">
               <div id="empty-confirmed_password-error-massage" style="display: none; color: red;">Xác nhận mật khẩu không được để trống</div>
               <div id="dismatch-password-error-massage" style="display: none; color: red;">Xác nhận mật khẩu không khớp</div>
            </div>
         </div>
         <div class="auth__form-group2">
            <div class="form-input">
               <label for="">Nhập họ tên:</label>
               <input placeholder="Fullname" type="text" name="text_fullname" oninput="checking_Fullname()">
               <div id="empty-fullname-error-massage" style="display: none; color: red;">Họ tên không được để trống</div>
            </div>

            <div class="form-input">
               <label for="">Nhập địa chỉ email:</label>
               <input placeholder="Email Address" type="text" name="text_email" oninput="checking_Email_Address()">
               <div id="empty-email-error-massage" style="display: none; color: red;">Địa chỉ Email không được để trống</div>
               <div id="dismatch-email-error-massage" style="display: none; color: red;">Địa chỉ Email phải có đuôi @gmail.com</div>
            </div>

            <div class="form-input">
               <label for="">Nhập số điện thoại:</label>
               <input placeholder="Phone Number" type="text" name="text_phone_number" oninput="checking_Phone_Number()">
               <div id="empty-phone_number-error-massage" style="display: none; color: red;">Số điện thoại không được để trống</div>
               <div id="starting_with_09-at_least_12_chars-phone_number-error-message" style="display: none; color: red;">Số điện thoại phải bắt đầu bằng 09 và ít nhất 10 số</div>
            </div>
         </div>
      </div>
      
      <div class="reNameThis">
            <input class="abc" type="checkbox" name="policy_acception">
            <label>Chấp nhận <a href="">điều khoản.</a></label>
       </div>
         <div id="error-message-checkbox" style="display: none; color: red;">Chưa đồng ý với các điều khoản</div>
         <button type="submit" class="signup-button" name="signup-button">ĐĂNG KÝ</button>
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

<script>
   $("#signup-form").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
         type: "POST",
         url: './Genaral/xuly_login_signup.php',
         data: $(this).serializeArray(),
         success: function(response) {
            console.log("response: ", response);
            // Kiểm tra phản hồi từ máy chủ
            var responseObject = JSON.parse(response);
            // Kiểm tra phản hồi từ máy chủ
            if (responseObject.status === 1 && responseObject.message === 'signup_success') {
               alert("Đăng nhập thành công");
               window.location.href = "./Login.php";
            } else if (responseObject.status === 0 && responseObject.message === 'exist-account_error') {
               alert("Tài khoản đã tồn tại");
               document.getElementsByName('text_username')[0].focus();
            }
         }
      });
   });
</script>

<script>
   let username = document.getElementsByName('text_username')[0];
   let password = document.getElementsByName('text_password')[0];
   let confirmed_password = document.getElementsByName('text_password_confirm')[0];
   let fullname = document.getElementsByName('text_fullname')[0];
   let email_address = document.getElementsByName('text_email')[0];
   let phone_number = document.getElementsByName('text_phone_number')[0];

   function checking_Username() {
      if (username.value === "") {
         document.getElementById('empty-username-error-massage').style.display = "block";
         document.getElementById('at_least_8_chars-involving_char_num-username-error-massage').style.display = "none";
      } else if (username.value.length < 8) {
         document.getElementById('empty-username-error-massage').style.display = "none";
         document.getElementById('at_least_8_chars-involving_char_num-username-error-massage').style.display = "block";
      } else {
         document.getElementById('empty-username-error-massage').style.display = "none";
         document.getElementById('at_least_8_chars-involving_char_num-username-error-massage').style.display = "none";
      }
   }

   function checking_Password() {
      if (password.value === "") {
         document.getElementById('empty-password-error-massage').style.display = "block";
         document.getElementById('at_least_8_chars-involving_char_num-password-error-massage').style.display = "none";
      } else if (password.value.length < 8) {
         document.getElementById('empty-password-error-massage').style.display = "none";
         document.getElementById('at_least_8_chars-involving_char_num-password-error-massage').style.display = "block";
      } else {
         document.getElementById('empty-password-error-massage').style.display = "none";
         document.getElementById('at_least_8_chars-involving_char_num-password-error-massage').style.display = "none";
      }
   }

   function checking_Confirmed_Password() {
      if (confirmed_password.value === "") {
         document.getElementById('empty-confirmed_password-error-massage').style.display = "block";
         document.getElementById('dismatch-password-error-massage').style.display = "none";
      } else if (confirmed_password.value != password.value) {
         document.getElementById('empty-confirmed_password-error-massage').style.display = "none";
         document.getElementById('dismatch-password-error-massage').style.display = "block";
      } else if (confirmed_password.value == password.value) {
         document.getElementById('empty-confirmed_password-error-massage').style.display = "none";
         document.getElementById('dismatch-password-error-massage').style.display = "none";
      }
   }

   function checking_Fullname() {
      if (fullname.value === "") {
         document.getElementById('empty-fullname-error-massage').style.display = "block";
      } else {
         document.getElementById('empty-fullname-error-massage').style.display = "none";
      }
   }

   function checking_Email_Address() {
      var regexEmail_Address = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

      if (email_address.value === "") {
         document.getElementById('empty-email-error-massage').style.display = "block";
         document.getElementById('dismatch-email-error-massage').style.display = "none";
      } else if (!regexEmail_Address.test(email_address.value)) {
         document.getElementById('empty-email-error-massage').style.display = "none";
         document.getElementById('dismatch-email-error-massage').style.display = "block";
      } else {
         document.getElementById('empty-email-error-massage').style.display = "none";
         document.getElementById('dismatch-email-error-massage').style.display = "none";
      }
   }

   function checking_Phone_Number() {
      var regexPhone_Number = /^09\d{8}$/;

      if (phone_number.value === "") {
         document.getElementById('empty-phone_number-error-massage').style.display = "block";
         document.getElementById('starting_with_09-at_least_12_chars-phone_number-error-message').style.display = "none";
      } else if (!regexPhone_Number.test(phone_number.value)) {
         document.getElementById('empty-phone_number-error-massage').style.display = "none";
         document.getElementById('starting_with_09-at_least_12_chars-phone_number-error-message').style.display = "block";
      } else {
         document.getElementById('empty-phone_number-error-massage').style.display = "none";
         document.getElementById('starting_with_09-at_least_12_chars-phone_number-error-message').style.display = "none";
      }
   }
</script>

</html>