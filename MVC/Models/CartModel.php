<?php
    class CartModel extends BaseModel{
        const TABLE = '';
        public function checkCart($idKhachHang) {
            // Kiểm tra xem idKhachHang đã có idCart chưa
            $idCart = $this->getIdCartByIdUser($idKhachHang);
        
            if (!$idCart) {
                // Nếu idCart chưa tồn tại, thêm một idCart mới cho idKhachHang
                $this->createCartForUser($idKhachHang);
            }
        }

        public function getIdCartByIdUser($idKhachHang){
            
            $sql = "SELECT idGioHang
            FROM giohang
            WHERE idKhachHang = '$idKhachHang'
            ";
            // die($sql);
            $query = $this->_query($sql);
            return mysqli_fetch_row($query);
        }

        public function createCartForUser($idKhachHang) {
            // Thêm một idCart mới cho idKhachHang
            $sql = "INSERT INTO giohang (idKhachHang) VALUES ('$idKhachHang')";
            // die($sql);
            $this->_query($sql);
        }
        
        public function done($tongTienHang, $phiVanChuyen, $giamGia, $ngayDat, $thanhTien, $trangThai, $idKhachHang){
            $sql = "INSERT INTO donhang (tongTienHang, phiVanChuyen, giamGia, ngayDat, thanhTien, trangThai, idKhachHang) VALUES('$tongTienHang', '$phiVanChuyen', '$giamGia', '$ngayDat', '$thanhTien', '$trangThai', '$idKhachHang')";
            // die($sql);
            $this->_query($sql);

        }
    }