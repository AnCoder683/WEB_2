<?php
    class BaseController{
        const MODEL_FOLDER_NAME = "./MVC/Models";
        const VIEW_FOLDER_NAME = "./MVC/Views";
        public function model($model){
            require_once (self::MODEL_FOLDER_NAME . "/" . $model . ".php");
            return new $model;
        }
        public function view($viewPath, $data =  []){

            foreach($data as $key => $value){
                $$key = $value;
                // ["a" => "b"]
            }
            require_once (self::VIEW_FOLDER_NAME . "/" . str_replace('.', '/', $viewPath) . ".php");
        }

        public function pagination() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (isset($_POST["args"])) {
                    $args = json_decode($_POST["args"], true);
                }
                $pagination = new Pagination($args["model"]);
                $pagination->getData($args);
                unset($pagination);
            }
        }
    
        public function getTotalPages() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (isset($_POST["args"])) {
                    $args = json_decode($_POST["args"], true);
                }
                $pagination = new Pagination($args["model"]);
                $pagination->getTotal($args);
                unset($pagination);
            }
        }

        public function error()
        {
            $this->view('frontend._404', []);
        }
    }