<?php
    class CartController extends BaseController{
        private $cartModel;
        private $sanPhamModel;
        private $chitietsanphamModel;
        private $chitietcartModel;
        public function __construct()
        {
            $this->sanPhamModel = $this->model("SanPhamModel");
            $this->chitietsanphamModel = $this->model("ChitietsanphamModel");
            $this->cartModel = $this->model("CartModel");
            $this->chitietcartModel = $this->model("ChitietcartModel");
        }

        public function addToCart(){
            $idSanPham = isset($_POST['idSanPham'])?$_POST['idSanPham']:'Nothing';
            $sanPhamQuantity = isset($_POST['sanPhamQuantity']) && !$_POST['sanPhamQuantity'] == ''?$_POST['sanPhamQuantity']:1;
            $idChiTietSanPham = isset($_POST['idChiTietSanPham'])?$_POST['idChiTietSanPham']:'Nothing';
            $this->chitietcartModel->themChiTietGioHang($sanPhamQuantity, $idChiTietSanPham, $idGioHang = 1);
        }

        public function showCart(){
            
            $idKhachHang =  $_POST['idKhachHang'];
            $idGioHang = $this->cartModel->getIdCartByIdUser($idKhachHang)[0];
            $listChiTietSanPham = $this->chitietcartModel->getListChiTietSanPham($idGioHang);

            // echo '<pre>';
            // print_r($listChiTietSanPham);
            // die;
            $this->view('frontend.cart.cart', [
                'dataGioHang' => $listChiTietSanPham
            ]);
        }
    }