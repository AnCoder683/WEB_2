<?php
    class App{
        // Product/getProduct/1000002
        // $controller = Product
        // $action = getProduct
        // $param = 1000002
        protected $controller = 'SanPhamController';
        protected $action = 'showSanPham';
        protected $params = [];

        public function __construct()
        {
            //admincontroller/
            $arr = $this->urlProcess();
            // xu ly controller
            if(isset($arr)) {
                if(file_exists("./MVC/Controllers/". $arr[0] ."Controller.php")){
                    $this->controller = $arr[0] . "Controller";
                }
                unset($arr[0]);
                include "./MVC/Controllers/". $this->controller .".php";
                // xu ly action
                if(isset($arr[1])){
                    // kt ham co ton tai k
                    if(method_exists($this->controller, $arr[1])){
                        $this->action = $arr[1];
                    }
                    unset($arr[1]);
                }
                $this->params = $arr?array_values($arr):[];
            } else {
                // xu ly param
                include "./MVC/Controllers/". $this->controller .".php";
            }
            
            $controllerObj = new $this->controller;
    
            call_user_func_array([$controllerObj, $this->action], $this->params);
        }
        // xu ly cai URL
        public function urlProcess(){
            if(isset($_GET['url'])){
                return explode('/', filter_var(trim($_GET['url'], '/')));
            }
        }
        public function show404()
        {
            header("Location: ".BASE_URL."/admin/eror404");
            // Thêm code HTML hoặc include file để hiển thị trang lỗi 404 ở đây
            // Ví dụ: include "./MVC/Views/error_404.php";
            exit;
        }
    }