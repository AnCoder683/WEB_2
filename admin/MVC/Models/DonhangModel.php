<?php 
    class DonhangModel extends BaseModel
    {
        const TABLE = "donhang";

        public function getall_donhang() {
            $sql = "SELECT * FROM donhang dh 
            JOIN nhanvien nv ON nv.idNhanVien = dh.idNhanVien
            JOIN khachhang kh ON kh.idKhachHang = dh.idKhachHang";
            return $this->select($sql);
        }
        
         public function count_donhang(){
            $sql = "SELECT COUNT(*) AS tongdonhang
            FROM donhang";
            return $this->select($sql);
         }
    }
?>