<?php
    class SanphamController extends BaseController{
        private $sanphammodel;
        private $chitietsanphamModel;
        private $mauModel;
        private $sizeModel;
        public function __construct()
        {
            $this->sanphammodel = $this->model("SanphamModel");
            $this->chitietsanphamModel = $this->model("ChitietsanphamModel");
            $this->mauModel = $this->model("MauModel");
            $this->sizeModel = $this->model("SizeModel");
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
            $idMau = '';
            $idSize = '';
            $readyToCart = [];
            $quantity = 0;
            if(isset($_POST['idMau']) && isset($_POST['idSize'])){
                $idMau = $_POST['idMau'];
                $idSize = $_POST['idSize'];
                if($this->chitietsanphamModel->checkChiTietSanPham($id, $idMau, $idSize) != []){
                    $readyToCart = $this->chitietsanphamModel->checkChiTietSanPham($id, $idMau, $idSize);
                    $quantity = $readyToCart['soLuong'];
                }else{
                    $quantity = 'Không còn sản phẩm';
                }
            }

            $dataSanPham = $this->sanphammodel->getSanPhamById($id); 
            $dataChiTietSanPham = $this->chitietsanphamModel->getChiTietSanPhamByIdSanPham($id);
            $dataMau = [];
            $dataSize = [];
            foreach($dataChiTietSanPham as $value){
                $mau = $this->mauModel->getMauByIdMau($value['idMau']);
                $size = $this->sizeModel->getSizeByIdSize($value['idSize']);
                array_push($dataMau, $mau);
                array_push($dataSize, $size);
            }
           
            $this->view('frontend.sanpham.chitietsanpham', [
                'dataSanPham' => $dataSanPham,
                'dataChiTietSanPham' => $dataChiTietSanPham,
                'dataMau' => $dataMau,
                'dataSize' => $dataSize,
                'readyToCart' => $readyToCart,
                'idMau' => $idMau,
                'idSize' => $idSize,
                'quantity' => $quantity
            ]);
        }
    }