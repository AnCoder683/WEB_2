<?php
    class ChitietcartModel extends BaseModel{
        const TABLE = 'chitietgiohang';

        public function kiemTraTonTai($idChiTietSanPham) {
            $sql = "SELECT COUNT(*) as count FROM chitietgiohang WHERE idChiTietSanPham = '$idChiTietSanPham'";
            $result = $this->_query($sql);
            $row = mysqli_fetch_assoc($result);
            $count = $row['count'];
            return $count > 0;
        }
        

        public function themChiTietGioHang($soLuong, $idChiTietSanPham, $idGioHang){
            if($this->kiemTraTonTai($idChiTietSanPham)){
                $sql = "UPDATE chitietgiohang SET soLuong = soLuong + $soLuong WHERE idChiTietSanPham = '$idChiTietSanPham'";
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
    }