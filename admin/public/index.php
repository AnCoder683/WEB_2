    <?php
        require_once __DIR__.'../../vendor/autoload.php';

        use app\controllers\AuthController;
        use app\core\Application;
        use app\controllers\SiteController;
        // root dir to easy use for late
        // dirname(__DIR__) is D:\xampp\htdocs\FashionStore
        $app = new Application(dirname(__DIR__));
        // all route give to controller
        $app->router->get('/', [SiteController::class, 'home']);
        $app->router->get('/contact', [SiteController::class, 'contact']);
        $app->router->post('/contact', [SiteController::class, 'handleContact']);
        
        $app->router->get('/login', [AuthController::class, 'login']);
        $app->router->post('/login', [AuthController::class, 'login']);
        $app->router->get('/register', [AuthController::class, 'register']);
        $app->router->post('/register', [AuthController::class, 'register']);
        $app->run();
        // // Xử lý yêu cầu từ người dùng
        // $action = isset($_GET['action']) ? $_GET['action'] : 'home';
        // // Phân tích URL để xác định controller và action
        // $routes = include_once('routes/route.php');
        
        // $controller_action = isset($routes[$action]) ? explode('@', $routes[$action]) : null;
        // // Gọi controller và action tương ứng
        
        // if ($controller_action) {
        //     $controller = $controller_action[0];
        //     $action = $controller_action[1];
        //     $controllerInstance = new $controller();
        //     $controllerInstance->$action();
        // }
        
    ?>