<?php
    class SanphamController extends BaseController{
        private $sanphammodel;

        public function __construct()
        {
            $this->sanphammodel = $this->model("SanphamModel");
        }
        public function index(){
            $this->danhsach();
        }
        public function danhsach()
        {
            $data = $this->sanphammodel->listsanpham();
            $this->view("frontend.masteradmin", [
                "content"=> "sanpham/chitiet",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data
            ]);
        }
    }