<?php
    class ChitietsanphamController extends BaseController{
        private $chitietsanphammodel;

        public function __construct()
        {
            $this->chitietsanphammodel = $this->model("ChitietsanphamModel");
        }
        public function index(){
            
        }
        public function chitiet($id)
        {
            $data = $this->chitietsanphammodel->getChitietsanpham($id);
            $this->view("frontend.masteradmin", [
                "content"=> "chitietsanpham/lietke",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data
            ]);
        }
    }