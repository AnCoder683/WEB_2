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

        public function error()
        {
            $this->view('frontend._404', []);
        }
    }