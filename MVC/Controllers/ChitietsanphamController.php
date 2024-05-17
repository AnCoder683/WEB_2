<?php
    class ChitietsanphamController extends BaseController{
        private $sanphamModel;
        private $chitietsanphammodel;
        public function __construct()
        {
            $this->sanphamModel = $this->model('SanphamModel');
            $this->chitietsanphammodel = $this->model("ChitietsanphamModel");
        }
        public function showChitietSanPham(){
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

        public function xoachitiet($id)
        {
            
        }
    }