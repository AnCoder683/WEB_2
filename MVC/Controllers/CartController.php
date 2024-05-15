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
            $idToCart = $_POST['idToCart'];
            $sanPhamQuantity = $_POST['sanPhamQuantity'];
            $idKH = $_POST['idKH'];
            $idGioHang = $this->cartModel->getIdCartByIdUser($idKH)[0];
            $this->chitietcartModel->themChiTietGioHang($sanPhamQuantity, $idToCart, $idGioHang);
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