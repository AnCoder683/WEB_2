<?php
    class ThongKeController extends BaseController{
        private $acountmodel;
        public function __construct()
        {
            $this->acountmodel = $this->model("AcountModel");
        }
        public function index()
        {
          
        }

        public function xemthongke()
        {
            $this->view("frontend.masteruser", [
                "header" => "user/header",
                "content" => "user/lietke",
                "footer" => "user/footer",
            ]);
        }
        public function main()
        {
            
        }
    }