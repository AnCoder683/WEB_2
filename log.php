<link rel="stylesheet" href="./CSS/MainCSS/Navigation.css">
<div class="log">
    <p>Hi,<?php
        $ss = new Session();
        if($ss ->exist('username')){
            echo $ss->get('username');
        }
        ?>
    </p>
    <a href="Main.php?page=Information">Thông tin</a>
    <a href="Main.php?page=Bill">Đơn hàng</a>
    <a href="./Genaral/logout.php">Đăng xuất</a>
</div>