<?php 
    class AcountModel extends BaseModel
    {
        const TABLE = "taikhoan";

        public function findUsername($username)
        {
            $sql = "SELECT * FROM taikhoan WHERE tenDangNhap = '$username'";
            return $this->select($sql);
        }
        // public function findById($table, $id){
        //     $pk = $this->_getPK($table);
        //     $sql = "SELECT * FROM $table WHERE $pk = $id";
        //     $query = $this->_query($sql);
        //     return mysqli_fetch_assoc($query);
        //  }

        public function getDetailInfo($username){
            $sql = "SELECT * FROM taikhoan tk JOIN khachhang kh ON kh.idKhachHang = tk.tenDangNhap where tenDangNhap = '$username'";
            return $this->select($sql);
        }

        public function insertUsername($username, $password, $tinhtrang, $quyen, $fullname, $phone, $email, $gender){
            // if()
        }
    }
?>