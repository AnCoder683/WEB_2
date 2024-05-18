<?php 
    class DonhangModel extends BaseModel
    {
        const TABLE = "donhang";

        public function getall_donhang() {
            $sql = "SELECT * FROM donhang dh 
            JOIN khachhang kh ON kh.idKhachHang = dh.idKhachHang";
            return $this->select($sql);
        }
        public function update_xacnhan($data, $id)
        {
            return $this->update(self::TABLE, $data, $id);
        }
         public function count_donhang(){
            $sql = "SELECT COUNT(*) AS tongdonhang
            FROM donhang";
            return $this->select($sql);
         }
    }
?>