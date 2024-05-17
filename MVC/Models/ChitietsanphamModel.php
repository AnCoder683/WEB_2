<?php   
    class ChitietsanphamModel extends BaseModel{
        const TABLE = 'chitietsanpham';
        public function getChiTietSanPhamByIdSanPham($id){
            $sql = "SELECT * FROM chitietsanpham WHERE idSanPham = '$id'";
            $query = $this->_query($sql);
            return $this->_getObjData($query);
        }
    }