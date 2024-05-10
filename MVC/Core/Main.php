<?php
//router cơ bản
    class Main
    {
        public $url;
        public $controllerName = "HomeController";
        public $methodName = "index";
        public $controllerPath = "./MVC/Controllers/";
        public $controller = '';
        public function __construct()
        {
            $this->getUrl();
            $this->getController();
            $this->setMethod();
        }
        public function getUrl()
        {
            // $main = new Main();
            // lấy và gán url
            
            $this->url = isset( $_GET['url'] ) ? $_GET['url'] : NULL;
            if($this->url != NULL)
            {
                // lấy url từ mảng url được phân tách bởi dấu
                $this->url = rtrim($this->url, '/');
                // [0] tương ứng controller, [1] tương ứng với action (method)
                $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
            } else {
                unset($this->url);
            }
        }
        public function getController()
        {
            // controller khong ton co
            // [0] la controller [1] la method

            // neu controller khong ton tai
            if(!isset($this->url[0])){
                include $this->controllerPath.$this->controllerName.'.php';
                $this->controller = new $this->controllerName();
            }else{
                $this->controllerName = $this->url[0];
                $filename = $this->controllerPath.$this->controllerName.'.php';
                if(file_exists($filename)){
                    include $filename;
                    if(class_exists($this->controllerName)){
                        $this->controller = new $this->controllerName(); 
                    }else{
                        
                    }

                }else{

                }

            }
        }
        public function setMethod()
        {
            //eg categorycontroller [0] / updatecategory [1] / id=2 [2]
            if(isset($this->url[2])){
                // lay phuong thuc
                $this->methodName = $this->url[1];
                if(method_exists($this->controller, $this->methodName)){
                    $this->controller->{$this->methodName}($this->url[2]);
                }else{
                    //neu khong ton tai tro ve trang home chin
                    header("Location: ".BASE_URL."/index/notfound");
                }
            }else{
                if(isset($this->url[1])){
                    // lay phuong thuc
                    $this->methodName = $this->url[1];
                    if(method_exists($this->controller, $this->methodName)){
                        $this->controller->{$this->methodName}();
                    }else{
                        //neu khong ton tai tro ve trang home chin
                        header("Location: ".BASE_URL."/index/notfound");
                    }
                }else{
                    if(method_exists($this->controller, $this->methodName)){
                        $this->controller->{$this->methodName}();
                    }else{
                        //neu khong ton tai tro ve trang home chinh
                        header("Location: ".BASE_URL."/index/notfound");
                    }
                }
            }
        }
    }
?>