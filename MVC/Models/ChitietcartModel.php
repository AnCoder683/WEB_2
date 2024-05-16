<?php
    class ChitietcartModel extends BaseModel{
        const TABLE = 'chitietgiohang';

        public function kiemTraTonTai($idChiTietSanPham, $idGioHang) {
            $sql = "SELECT COUNT(*) as count FROM chitietgiohang WHERE idChiTietSanPham = '$idChiTietSanPham' AND idGioHang = '$idGioHang'";
            $result = $this->_query($sql);
            $row = mysqli_fetch_assoc($result);
            $count = $row['count'];
            return $count > 0;
        }
        

        public function themChiTietGioHang($soLuong, $idChiTietSanPham, $idGioHang){
            if($this->kiemTraTonTai($idChiTietSanPham, $idGioHang)){
                $sql = "UPDATE chitietgiohang SET soLuong = soLuong + $soLuong WHERE idChiTietSanPham = '$idChiTietSanPham' AND idGioHang = '$idGioHang'";
            }else{
                $sql = "INSERT INTO chitietgiohang (soLuong, idChiTietSanPham, idGioHang) 
                VALUES ($soLuong, '$idChiTietSanPham', $idGioHang)";
            }
            // die($sql);

            $this->_query($sql);
        }

        public function getListChiTietSanPham($idGioHang){
            $sql = "SELECT *
            FROM chitietgiohang
            WHERE idGioHang = $idGioHang
            ";
            // die($sql);
            $query = $this->_query($sql);
            $data = [];
            while($row = mysqli_fetch_assoc($query)){
                array_push($data, $row);
            }
            return $data;
        }

        public function delChiTiet($idChiTiet, $idGioHang){
            $sql = "DELETE FROM chitietgiohang WHERE idChiTietSanPham = '$idChiTiet' AND idGioHang = '$idGioHang'";
            $this->_query($sql);
        }

        public function delAllChiTiet($a){
            $sql = "DELETE FROM chitietgiohang WHERE idGioHang = '$a'";
            // die($sql);
            $this->_query($sql);

        }
    }