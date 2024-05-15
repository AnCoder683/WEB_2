<?php   
    class ChitietsanphamModel extends BaseModel{
        const TABLE = 'chitietsanpham';
        public function getChiTietSanPhamByIdSanPham($id){
            $sql = "SELECT * FROM chitietsanpham WHERE idSanPham = '$id'";
            $query = $this->_query($sql);
            return $this->_getArrayData($query);
        }
        
        public function checkChiTietSanPham($idSanPham, $idMau, $idSize){
            $sql = "SELECT * FROM chitietsanpham WHERE idSanPham = '$idSanPham' AND idMau = '$idMau' AND idSize = '$idSize' AND tt_xoa = 0";
            // die($sql);
            $query = $this->_query($sql);
            return $this->_getObjData($query);
        }
    }