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
            $query_taikhoan = "INSERT INTO taikhoan (tenDangNhap, MatKhau, tinhTrang, idQuyen) VALUES ('$username', '$password', '$tinhtrang', '$quyen')";
            $query_khachhang = "INSERT INTO khachhang (idKhachHang, ten, SDT, email, gioiTinh, ngaySinh, diaChiGiaoHang) VALUES ('$username', '$fullname', '$phone', '$email', '$gender', '', '')";
            if($this->_query($query_taikhoan)){
                return $this->_query($query_khachhang);
            }
        }

        public function updateUserInformation($fullname, $phone, $email, $gender, $birthday, $address, $username){
            $gender = ($gender === 'Nam') ? 1 : 0;
            $sql = "UPDATE khachhang SET ten = '$fullname', SDT = '$phone', email = '$email', gioiTinh = '$gender', ngaySinh = '$birthday', diaChiGiaoHang = '$address' WHERE idKhachHang = '$username'";
            return $this->_query($sql);
        }
    }
?>