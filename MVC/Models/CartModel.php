<?php
    class CartModel extends BaseModel{
        const TABLE = '';
        public function getIdCartByIdUser($idKhachHang){
            $sql = "SELECT idGioHang
            FROM giohang
            WHERE idKhachHang = '$idKhachHang'
            
            ";
            // die($sql);
            $query = $this->_query($sql);
            return mysqli_fetch_row($query);
        }
    }