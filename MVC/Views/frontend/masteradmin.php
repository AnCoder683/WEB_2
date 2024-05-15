<?php
    include("./MVC/middlewares/check_adminlogin.php");
    adminpermission();
?>
<!DOCTYPE html>
<html lang="en" ng-app="TokyoLife">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
    <!-- css library-->
    <link rel="stylesheet" href="<?= BASE_ASSETS ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_ASSETS ?>/fontawesome-free-6.5.2-web/css/all.min.css">
    <!-- my css -->
    <link rel="stylesheet" href="<?= BASE_ASSETS ?>/css/style.css">
    <link rel="shortcut icon" href="<?= BASE_ASSETS ?>/img/favicon.webp" type="image/x-icon">
    <!-- js library-->
    <script src="<?= BASE_ASSETS?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_ASSETS?>/js/jquery-3.7.1.js"></script>
    <!-- my js -->
    <script src="<?= BASE_ASSETS?>/js/script.js"></script>
    <script src="<?= BASE_ASSETS?>/js/PaginationAdmin.js"></script>
</head>
<body>
    <div class="wrapper">
        <?php 
            if(isset($sidebar)){   
                require_once "./MVC/Views/frontend/". $sidebar.".php";
            }
        ?>
        <div class="main">
            <?php
                if (isset($header)){
                    require_once "./MVC/Views/frontend/". $header .".php";
                }
            ?>
            <?php
                require_once "./MVC/Views/frontend/". $content .".php"; 
            ?>
        </div>
    </div>
</body>
    <script src="<?= BASE_ASSETS?>/js/loadpermission.js"></script>
    <script src="<?= BASE_ASSETS?>/js/Account.js"></script>
    <script src="<?= BASE_ASSETS?>/js/danhmucsanpham.js"></script>
</html>

