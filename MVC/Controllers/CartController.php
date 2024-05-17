<?php
    class CartController extends BaseController{
        private $cartModel;
        private $sanPhamModel;
        private $chitietsanphamModel;
        private $chitietcartModel;
        private $khachhangModel;
        public function __construct()
        {
            $this->sanPhamModel = $this->model("SanPhamModel");
            $this->chitietsanphamModel = $this->model("ChitietsanphamModel");
            $this->cartModel = $this->model("CartModel");
            $this->chitietcartModel = $this->model("ChitietcartModel");
            $this->khachhangModel = $this->model("KhachhangModel");
        }



        public function addToCart(){
            $idToCart = $_POST['idToCart'];
            $sanPhamQuantity = $_POST['sanPhamQuantity'];
            $idKH = $_POST['idKH'];
            $this->cartModel->checkcart($idKH);
            $idGioHang = $this->cartModel->getIdCartByIdUser($idKH)[0];
            $this->chitietcartModel->themChiTietGioHang($sanPhamQuantity, $idToCart, $idGioHang);
        }

        public function showCart(){
            if(isset($_POST['removeIdChiTietSanPhamFromCart']) && isset($_POST['idGioHang'])){
                $this->chitietcartModel->delChiTiet($_POST['removeIdChiTietSanPhamFromCart'], $_POST['idGioHang']);
            }
            if(isset($_POST['removeAll'])){
                // die($_POST['idGioHang']);
                $this->chitietcartModel->delAllChiTiet($_POST['removeAll']);
            }
            $idKhachHang =  $_POST['idKhachHang'];
            $this->cartModel->checkCart($idKhachHang);
            $idGioHang = $this->cartModel->getIdCartByIdUser($idKhachHang)[0];
            // die($idGioHang);
            $listChiTietSanPham = $this->chitietcartModel->getListChiTietSanPham($idGioHang);
            $getAllChiTietSanPham = [];
            foreach($listChiTietSanPham as $value){
                $obj = $this->chitietsanphamModel->getChiTietSanPhamObj($value['idChiTietSanPham'], $value['idGioHang']);
                array_push($getAllChiTietSanPham, $obj);
            }
            // echo '<pre>';
            // print_r($getAllChiTietSanPham);
            // die;
            $this->view('frontend.cart.cart', [
                'dataGioHang' => $listChiTietSanPham,
                'dataChiTietSanPham' => $getAllChiTietSanPham,
            ]);
        }

        public function checkout(){
            $idKhachHang = $_POST['idKhachHang'];
            $khachHang = $this->khachhangModel->getKhachHangById($idKhachHang);
            $idGioHang = $this->cartModel->getIdCartByIdUser($idKhachHang)[0];
            $listChiTietSanPham = $this->chitietcartModel->getListChiTietSanPham($idGioHang);
            $getAllChiTietSanPham = [];
            foreach($listChiTietSanPham as $value){
                $obj = $this->chitietsanphamModel->getChiTietSanPhamObj($value['idChiTietSanPham'], $value['idGioHang']);
                array_push($getAllChiTietSanPham, $obj);
            }
            // echo '<pre>';
            // print_r($getAllChiTietSanPham);
            // die;
            $this->view('frontend.cart.checkout', [
               'khachHang' => $khachHang,
               'dataAllChiTietSanPham' => $getAllChiTietSanPham
            ]);
        }

        public function done(){
            $idKhachHang = $_POST['idKhachHang'];
            $tongTien = $_POST['tongTien'];
            $tongTienNum = str_replace(',', '', $tongTien);
            $tongTienInt = (int)$tongTienNum;
            $trangThai = "Chưa xác nhận";
            $toDay = $_POST['toDay'];
            $phiVanChuyen = 0;
            $thanhTien = $tongTienInt + $phiVanChuyen;
            $giamGia = 0;
            $this->cartModel->done($tongTienInt, $phiVanChuyen, $giamGia, $toDay, $thanhTien, $trangThai, $idKhachHang);

            $idGioHang = $this->cartModel->getIdCartByIdUser($idKhachHang)[0];
            $this->chitietcartModel->delAllChiTiet($idGioHang);
        }
        
    }