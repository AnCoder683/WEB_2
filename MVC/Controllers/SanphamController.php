<?php
    class SanphamController extends BaseController{
        private $sanphammodel;
        private $chitietsanphamModel;
        public function __construct()
        {
            $this->sanphammodel = $this->model("SanphamModel");
            $this->chitietsanphamModel = $this->model("ChitietsanphamModel");
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

        public function showSanpham(){
            $or = isset($_POST['sortType'])?$_POST['sortType']:'';
            $fi = isset($_POST['findSanPham'])?$_POST['findSanPham']:'';
            $data = $this->sanphammodel->getAllSanPham($or);
            $this->view('frontend.masteruser', [
                'data' => $data,
                'content' => 'sanpham/show',
                'detail' => 'sanpham/chitietsanpham',
                "header" => "user/header",
                "footer" => "user/footer",
            ]);
        }
        public function timkiemSanpham(){
            $or = isset($_POST['sortType'])?$_POST['sortType']:'';
            $fi = isset($_POST['findSanPham'])?$_POST['findSanPham']:'';
            $data = $this->sanphammodel->getAllSanPham($or, $fi);
            $this->view('frontend.sanpham.timkiemsanpham', [
                'data' => $data,
            ]);
        }
        public function showChiTietSanPham(){
            $id = isset($_POST['id'])?$_POST['id']:'';
            $this->view('frontend.sanpham.chitietsanpham', [
                'dataSanPham' => $this->sanphammodel->getSanPhamById($id),
                'dataChiTietSanPham' => $this->chitietsanphamModel->getChiTietSanPhamByIdSanPham($id)
            ]);
        }
    }