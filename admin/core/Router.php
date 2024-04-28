<?php
    namespace app\core;
    class Router
    {
        public Request $request;
        public Response $response;
        protected array $routes = [];
        public function __construct(Request $request,  Response $response)
        {
            $this->request = $request;
            $this->response = $response;
        }
        public function get($path, $callback)  {
            $this->routes['get'][$path] = $callback;
        }
        public function post($path, $callback)  {
            $this->routes['post'][$path] = $callback;
        }
        public function resolve()
        {
            // echo '<pre>';
            // var_dump($_SERVER);
            // echo '</pre>';
            $path = $this->request->getPath();
            $method = $this->request->method();
            $callback = $this->routes[$method][$path] ?? false;
            if($callback === false) {
                $this->response->setStatusCode(404);
                return $this->renderView("_404");
            }
            // handle just a string to view eg: /login --> $this->renderView("_404");
            if(is_string($callback)) {
                return $this->renderView($callback);
            }
            // this handle a controller
            //[0] is controller, [1] is a method
            if(is_array($callback)) {
                // init a application for app
                Application::$app->controller = new $callback[0]();
                // but give it to [0] bc it is a real controller 
                $callback[0] = Application::$app->controller;

            }
            return call_user_func($callback, $this->request); 
        }
        public function renderView($view, $params = []) 
        {
            $layoutContent = $this->layoutContent();
            $viewContent = $this->renderOnlyView($view, $params);
            return str_replace('{{content}}', $viewContent, $layoutContent);
            // include_once Application::$ROOT_DIR."/views/$view.php";
        }
        protected function layoutContent() 
        {
            // find a current layout
            $layout = Application::$app->controller->layout;
            ob_start();
            // set a parameter layout 
            include_once Application::$ROOT_DIR."/views/layout/$layout.php";
            return ob_get_clean();
        }
        protected function renderOnlyView($view, $params)
        {
            foreach($params as $key => $value) {
                $$key = $value;
            }
            ob_start();
            include_once Application::$ROOT_DIR."/views/$view.php";
            return ob_get_clean();
        }
        protected function renderContent($viewContent)
        {
            $layoutContent = $this->layoutContent();
            return str_replace('{{content}}', $viewContent, $layoutContent);
        }
    }
?>