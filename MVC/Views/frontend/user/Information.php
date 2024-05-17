<div class="container">
<p class="title">Thông tin người dùng</p>
   <div class="wrapper-user-information">
      <form action="#" method="POST" class="update form" id="update">
                  <div class="form-group">
                     <label for="">Họ tên:</label>
                     <input type="text" name="updateUsername" class="form-control" value="<?= $user['ten']?>" oninput="checking_Fullname()">
                     <div id="empty-name-error" style="display: none; color: red;" ">Tài khoản không được để trống</div>
                  </div>
                  <div class="form-group">
                     <label for="">Số điện thoại:</label>
                     <input type="text" name="updatePhone" class="form-control" value="<?= $user['SDT']?>" oninput="checking_Phone_Number()">
                     <div id="empty-phone-error" style="display: none; color: red;" ">Số điện thoại không được để trống</div>
                     <div id="dismatch-phone-error" style="display: none; color: red;" ">Số điện thoại phải bắt đầu bằng 09 và gồm 10 chữ số</div>
                  </div>
                  <div class="form-group">
                     <label for="">Email:</label>
                     <input type="text" name="updateEmail" class="form-control" value="<?= $user['email']?>" oninput="checking_Email_Address()">
                     <div id="empty-email-error" style="display: none; color: red;" ">Địa chỉ Email không được để trống</div>
                     <div id="dismatch-email-error" style="display: none; color: red;" ">Địa chỉ Email sai định dạng</div>
                  </div>
                  <div class="form-group">
                     <label for="">Giới tính:</label>
                     <input type="text" name="updateGender" class="form-control" value="<?php
                      if($user['gioiTinh'] == 1){
                        echo "Nam";
                      }else{
                        echo "Nữ";
                      }
                     ?>" oninput="checking_Gender()">
                     <div id="empty-gender-error" style="display: none; color: red;" ">Giới tính không được để trống</div>
                     <div id="gender-error" style="display: none; color: red;" ">Giới tính là nam hoặc nữ</div>
                  </div>
                  <div class="form-group">
                     <label for="">Ngày sinh:</label>
                     <input type="date" name="updateDate" class="form-control" value="<?= ($user['ngaySinh'] != '0000-00-00') ? $user['ngaySinh'] : ''; ?>" onchange="checking_Birthday()">
                     <div id="empty-date-error" style="display: none; color: red;" ">Ngày sinh không được để trống</div>
                  </div>
                  <div class="form-group">
                     <label for="">Địa chỉ:</label>
                     <input type="text" name="updateAddress" class="form-control" value="<?= $user['diaChiGiaoHang']?>" oninput="checking_Address()">
                     <div id="empty-address-error" style="display: none; color: red;" ">Địa chỉ giao hàng không được để trống</div>
                  </div>
                  <div class="form-group">
                     <input type="submit" name="update" class="update" value="Lưu và thay đổi">
                  </div>
      </form>
</div>
<script>
   var BASE_URL = "http://localhost/BEW";  
   $("#update").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
         type: "POST",
         url: BASE_URL+'/user/information_update',
         data: $(this).serializeArray(),
         success: function(response) {
            console.log(response);
            console.log("response: ", response);
            // Kiểm tra phản hồi từ máy chủ
            var responseObject = JSON.parse(response);
            // Kiểm tra phản hồi từ máy chủ
            if (responseObject.status === 1 ) {
               alert("Cập nhật thành công");
               window.location.href =BASE_URL+ "/user/information?update=success";
            } else if (responseObject.status === 0 && responseObject.message === 'empty_error') {
               alert("Vui lòng điền đầy đủ thông tin");
            } else if (responseObject.status === 0 && responseObject.message === 'update-error'){
               alert("Cập nhật thất bại");
            }else if (responseObject.status === 0 && responseObject.message === 'update-fail'){
               alert("Thông tin này đã được lưu");
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
      var nam = "Nam";
      var nu = "Nữ";
      if(gender.value === ""){
         document.getElementById('empty-gender-error').style.display = "block";
         document.getElementById('gender-error').style.display = "none";
      }else if(gender.value != nam && gender.value != nu){
         document.getElementById('empty-gender-error').style.display = "none";
         document.getElementById('gender-error').style.display = "block";
      }else{
         document.getElementById('empty-gender-error').style.display = "none";
         document.getElementById('gender-error').style.display = "none";
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