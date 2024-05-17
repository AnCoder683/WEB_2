      <form class="login-form" action="#" id="login-form" method="POST">
         <h1>Đăng nhập</h1>
         <div class="form-input">
            <label for="">Tài Khoản:</label>
            <input placeholder="Username" type="text" id="text_username_login" name="text_username_login" oninput="checking_Username()">
            <div id="empty-username-error-massage" style="display: none; color: red;" ">Tài khoản không được để trống</div>
         </div>
         <div class=" form-input">
               <label for="">Mật khẩu:</label>
               <input placeholder="Password" type="password" id="text_password_login" name="text_password_login" oninput="checking_Password()">
               <div id="empty-password-error-massage" style="display: none; color: red;" ">Mật khẩu không được để trống</div>
         </div>
         <div class=" remember-fogot">
                  <label for="">
                     <input class="rememberme" type="checkbox" name="text_remember">
                     Lưu mật khẩu
                  </label>
                  <a class="fogot-password" href="">Quên mật khẩu</a>
               </div>
               <button class="login-button" type="submit" name="login-button">ĐĂNG NHẬP</button>
               <label class="registor" for="">Chưa có tài khoản? <a href="Signup.php">đăng ký</a></label>

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
<script>
   var BASE_URL = "http://localhost/BEW";  
   $("#login-form").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
         type: "POST",
         url: BASE_URL+'/login/validation',
         data: $(this).serializeArray(),
         success: function(response) {
            console.log("response: ", response);
            // Kiểm tra phản hồi từ máy chủn
            var responseObject = JSON.parse(response);
            // Kiểm tra phản hồi từ máy chủ
            if (responseObject.status === 1) {
               // alert("Đăng nhập thành công");
               window.location.href = BASE_URL + "/sanpham/showsanpham";
            } else {
               alert(responseObject.message);
            }
         }
      });
   });
</script>
<script>
   let username = document.getElementsByName('text_username_login')[0];
   let password = document.getElementsByName('text_password_login')[0];

   function checking_Username() {
      if (username.value === "") {
         document.getElementById('empty-username-error-massage').style.display = "block";
      } else {
         document.getElementById('empty-username-error-massage').style.display = "none";
      }
   }

   function checking_Password() {
      if (password.value === "") {
         document.getElementById('empty-password-error-massage').style.display = "block";
      } else {
         document.getElementById('empty-password-error-massage').style.display = "none";
      }
   }
</script>