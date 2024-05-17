<?php
    class CustomerModel extends BaseModel{
        const U_TABLE = 'khachhang';
        const A_TABLE = 'taikhoan';

        public function findUsername($username)
        {
            $sql = "SELECT * FROM taikhoan WHERE tenDangNhap = '$username'";
            return $this->select($sql);
        }

        public function addUsername()
    }