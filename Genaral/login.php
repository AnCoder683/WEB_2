<?php
// session_start();
if (isset($_SESSION['username'])) {
   $username = $_SESSION['username'];
   echo "<script>
            document.querySelector('.user').addEventListener('click', () => {
               const userSelection = document.querySelector('.user-selection');
               const logElement = document.querySelector('.log');
               const unlogElement = document.querySelector('.unlog');
               if (userSelection.style.display === 'block') {
                  userSelection.style.display = 'none';
               } else {
                  unlogElement.style.display = 'none';
                  userSelection.style.display = 'block';
                  logElement.style.display = 'block';
                  logElement.innerHTML = '<a href=\"#\">Hi,$username  </a><a href=\"#\">Thông tin</a><br><a href=\"#\">Đơn hàng</a><br><a href=\"./Genaral/logout.php\">Đăng xuất</a>';
               }
            });
         </script>";
} else {
   echo "<script>
            document.querySelector('.user').addEventListener('click', () => {
               const userSelection = document.querySelector('.user-selection');
               const unlogElement = document.querySelector('.unlog');
               if (userSelection.style.display === 'block') {
                  userSelection.style.display = 'none';
               } else {
                  userSelection.style.display = 'block';
                  unlogElement.style.display = 'block';
               }
            });
         </script>";
}
?>
