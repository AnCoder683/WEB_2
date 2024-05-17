<!DOCTYPE html>
<html lang="en" ng-app="TokyoLife">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi User</title>

    <link rel="stylesheet" href="<?php echo BASE_ASSETS ?>/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="shortcut icon" href="<?php echo BASE_ASSETS ?>/img copy/icon/favicon.webp" type="image/x-icon">


    <link rel="stylesheet" href="<?php echo BASE_ASSETS ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS ?>/css/style.css">
    <link rel="shortcut icon" href="<?php echo BASE_ASSETS ?>/img/favicon.webp" type="image/x-icon">
</head>
<body>
    

            <div class="wrapper">
                <div class="main">
            <?php
                if (isset($header)){
                    require_once "./MVC/Views/frontend/". $header .".php";
                }
            ?>
                    <?php
                        require_once "./MVC/Views/frontend/". $content .".php";
                        // require_once "./MVC/Views/frontend/". $detail .".php";
                    ?>
            <?php
                if (isset($header)){
                    require_once "./MVC/Views/frontend/". $footer .".php";
                }
            ?>
                </div>
            </div>

        
        
   

    <script src="<?php echo BASE_ASSETS?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_ASSETS?>/js/script.js"></script>           


</body>

</html>