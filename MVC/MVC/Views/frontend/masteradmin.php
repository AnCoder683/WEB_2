<!DOCTYPE html>
<html lang="en" ng-app="TokyoLife">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
    <link rel="stylesheet" href="<?php echo BASE_ASSETS ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS ?>/css/style.css">
    <link rel="shortcut icon" href="<?php echo BASE_ASSETS ?>/img/favicon.webp" type="image/x-icon">
</head>
<body>
    <?php
        if (isset($header)){
            require_once "./MVC/Views/frontend/". $header .".php";
        }
    ?>
    <div class="wrapper">
        <?php 
            
            if(isset($sidebar)){   
                require_once "./MVC/Views/frontend/". $sidebar.".php";
            }
        ?>
        <div class="main">
            <?php
                
                if(isset($pagethem))
                {   
                    require_once "./MVC/Views/frontend/". $pagethem .".php";
                }
                require_once "./MVC/Views/frontend/". $content .".php"; 
            ?>
        </div>
    </div>
        
        

    <script src="<?php echo BASE_ASSETS?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_ASSETS?>/js/script.js"></script>           

</body>

</html>