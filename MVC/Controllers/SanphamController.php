<?php
    class SanphamController extends BaseController{
        private $sanphammodel;

        public function __construct()
        {
            $this->sanphammodel = $this->model("SanphamModel");
        
        }

        public function index(){
            $this->listloaisanpham();
        }

        public function listloaisanpham()
        {
            $column = [
                'idLoaiSanPham',
                'tenLoai',
                'tt_xoa'
            ];
            $order = [
                'column' => 'idLoaiSanPham',
                'order' => 'ASC'
            ];
            $limit = 20;
            $data = $this->sanphammodel->getAll_loaisanpham($column, $order, $limit);
            $this->view('frontend.masteradmin', [
                "pagethem" => "loaisanpham/them",
                "content"=> "loaisanpham/lietke",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data,
            ]);
        }
    }