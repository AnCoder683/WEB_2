<link rel="stylesheet" href="./CSS/MainCSS/information.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
   document.getElementById('wrapper').style.display = 'none';
</script>

<div class="body-wrapper">
   <p class="title">Thông tin người dùng</p>
   <div class="wrapper-user-information">
      <form action="./Main.php?page=Information" method="POST" class="update" id="update">
         <?php
         $db = new DatabaseUtil();
         $ss = new Session();
         $current_user = $ss->get('username');
         $sql = "SELECT * FROM khachhang WHERE idKhachHang = '$current_user'";

         $gotresult = mysqli_query($db->connect(), $sql);

         if ($gotresult) {
            if (mysqli_num_rows($gotresult) > 0) {
               while ($row = mysqli_fetch_array($gotresult)) {
         ?>
                  <div class="form-group">
                     <label for="">Họ tên:</label>
                     <input type="text" name="updateUsername" class="form-control" value="<?php echo $row['ten']?>" onchange="checking_Fullname()">
                     <div id="empty-name-error" style="display: none; color: red;" ">Tài khoản không được để trống</div>
                  </div>
                  <div class="form-group">
                     <label for="">Số điện thoại:</label>
                     <input type="text" name="updatePhone" class="form-control" value="<?php echo $row['SDT']?>" onchange="checking_Phone_Number()">
                     <div id="empty-phone-error" style="display: none; color: red;" ">Số điện thoại không được để trống</div>
                     <div id="dismatch-phone-error" style="display: none; color: red;" ">Số điện thoại phải bắt đầu bằng 09 và gồm 10 chữ số</div>
                  </div>
                  <div class="form-group">
                     <label for="">Email:</label>
                     <input type="text" name="updateEmail" class="form-control" value="<?php echo $row['email']?>" onchange="checking_Email_Address()">
                     <div id="empty-email-error" style="display: none; color: red;" ">Địa chỉ Email không được để trống</div>
                     <div id="dismatch-email-error" style="display: none; color: red;" ">Địa chỉ Email sai định dạng</div>
                  </div>
                  <div class="form-group">
                     <label for="">Giới tính:</label>
                     <input type="text" name="updateGender" class="form-control" value="<?php
                      if($row['gioiTinh'] == 1){
                        echo "Nam";
                      }else{
                        echo "Nữ";
                      }
                     ?>" onchange="checking_Gender()">
                     <div id="empty-gender-error" style="display: none; color: red;" ">Giới tính không được để trống</div>
                  </div>
                  <div class="form-group">
                     <label for="">Ngày sinh:</label>
                     <input type="date" name="updateDate" class="form-control" value="<?php echo ($row['ngaySinh'] != '0000-00-00') ? $row['ngaySinh'] : ''; ?>" onchange="checking_Birthday()">
                     <div id="empty-date-error" style="display: none; color: red;" ">Ngày sinh không được để trống</div>
                  </div>
                  <div class="form-group">
                     <label for="">Địa chỉ:</label>
                     <input type="text" name="updateAddress" class="form-control" value="<?php echo $row['diaChiGiaoHang']?>" onchange="checking_Address()">
                     <div id="empty-address-error" style="display: none; color: red;" ">Địa chỉ giao hàng không được để trống</div>
                  </div>
                  <div class="form-group">
                     <input type="submit" name="update" class="update" value="Lưu và thay đổi">
                  </div>
         <?php
               }
            }
         }
         ?>
      </form>
   </div>
</div>

<script>
   $("#update").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
         type: "POST",
         url: './Genaral/xuly_login_signup.php',
         data: $(this).serializeArray(),
         success: function(response) {
            console.log(response);
            console.log("response: ", response);
            // Kiểm tra phản hồi từ máy chủ
            var responseObject = JSON.parse(response);
            // Kiểm tra phản hồi từ máy chủ
            if (responseObject.status === 1 && responseObject.message === 'update_success') {
               alert("Cập nhật thành công");
               window.location.href = "./Main.php?page=Information&&update=success";
            } else if (responseObject.status === 0 && responseObject.message === 'empty_error') {
               alert("Vui lòng điền đầy đủ thông tin");
            } else if (responseObject.status === 0 && responseObject.message === 'update_error'){
               alert("Cập nhật thất bại");
            }
         }
      });
   });
</script>


<script>
   let fullname = document.getElementsByName('updateUsername')[0];
   let phone = document.getElementsByName('updatePhone')[0];
   let email = document.getElementsByName('updateEmail')[0];
   let gender = document.getElementsByName('updateGender')[0];
   let birthday = document.getElementsByName('updateDate')[0];
   let address = document.getElementsByName('updateAddress')[0];

   function checking_Fullname() {
      if (fullname.value === "") {
         document.getElementById('empty-name-error').style.display = "block";
      } else {
         document.getElementById('empty-name-error').style.display = "none";
      }
   }

   function checking_Phone_Number() {
      var regexPhone_Number = /^09\d{8}$/;

      if (phone.value === "") {
         document.getElementById('empty-phone-error').style.display = "block";
         document.getElementById('dismatch-phone-error').style.display = "none";
      } else if (!regexPhone_Number.test(phone.value)) {
         document.getElementById('empty-phone-error').style.display = "none";
         document.getElementById('dismatch-phone-error').style.display = "block";
      } else {
         document.getElementById('empty-phone-error').style.display = "none";
         document.getElementById('dismatch-phone-error').style.display = "none";
      }
   }

   function checking_Email_Address() {
      var regexEmail_Address = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

      if (email.value === "") {
         document.getElementById('empty-email-error').style.display = "block";
         document.getElementById('dismatch-email-error').style.display = "none";
      } else if (!regexEmail_Address.test(email.value)) {
         document.getElementById('empty-email-error').style.display = "none";
         document.getElementById('dismatch-email-error').style.display = "block";
      } else {
         document.getElementById('empty-email-error').style.display = "none";
         document.getElementById('dismatch-email-error').style.display = "none";
      }
   }

   function checking_Gender(){
      if(gender.value === ""){
         document.getElementById('empty-gender-error').style.display = "block";
      }else{
         document.getElementById('empty-gender-error').style.display = "none";
      }
   }

   function checking_Birthday(){
      if(birthday.value === ""){
         document.getElementById('empty-date-error').style.display = "block";
      }else{
         document.getElementById('empty-date-error').style.display = "none";
      }
   }

   function checking_Address(){
      if(address.value === ""){
         document.getElementById('empty-address-error').style.display = "block";
      }else{
         document.getElementById('empty-address-error').style.display = "none";
      }
   }
</script>