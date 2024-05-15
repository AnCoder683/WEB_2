<!DOCTYPE html>
<html lang="en" ng-app="TokyoLife">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
    <link rel="stylesheet" href="<?php echo BASE_ASSETS ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS ?>/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="shortcut icon" href="<?php echo BASE_ASSETS ?>/img/favicon.webp" type="image/x-icon">
</head>
<body>
    <?php
        if (isset($header)){
            require_once "./MVC/Views/frontend/". $header .".php";
        }
    ?>
    <div class="wrapper">
        <div class="main">
            <!-- <?php
                require_once "./MVC/Views/frontend/". $content .".php"; 
            ?> -->
        </div>
    </div>
    <?php
        if (isset($footer)){
            require_once "./MVC/Views/frontend/".$footer.".php";
            
        }
    ?> 
        

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>        
</body>
</html>