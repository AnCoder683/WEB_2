<?php
    class KhachhangModel extends BaseModel{
        public function getKhachHangById($id){
            $sql = "SELECT * FROM khachhang WHERE idKhachHang = '$id'";
            $query = $this->_query($sql);
            return $this->_getObjData($query);
        }
    }