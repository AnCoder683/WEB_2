<?php 
    class AcountModel extends BaseModel
    {
        const TABLE = "taikhoan";
        public function findAccount($username, $password)
        {
            $sql = "SELECT * FROM taikhoan 
            JOIN quyen ON quyen.idQuyen = taikhoan.idQuyen
            WHERE tenDangNhap = '$username' AND matKhau = '$password'";
            return $this->select($sql);
        }
        public function quyenAcount($username)
        {
            $sql = "SELECT * FROM taikhoan tk
            JOIN quyen ON quyen.idQuyen = tk.idQuyen
            WHERE tenDangNhap = '$username' 
            ";
            return $this->select($sql);
        }
        public function listAcount()
        {
            $sql = "SELECT * FROM taikhoan tk INNER JOIN quyen ON tk.idQuyen = quyen.idQuyen;";
            return $this->select($sql);
        }
        public function listquyen()
        {
            $sql = "SELECT * FROM quyen";
            return $this->select($sql);
        }
        public function getPermission($username)
        {
            $sql = "SELECT tenchucnang, tinhtrang FROM taikhoan tk
            JOIN quyen ON quyen.idQuyen = tk.idQuyen
            JOIN ctq_cn ON ctq_cn.idQuyen = quyen.idQuyen
            JOIN chucnang ON chucnang.idChucNang = ctq_cn.idChucNang
            WHERE tenDangNhap = '$username'";
            return $this->select($sql);
        }
        public function checkloaitaikhoan($username)
        {
            $sql = "SELECT 
            CASE 
                WHEN EXISTS (SELECT * FROM nhanvien WHERE idNhanVien = '$username') THEN 'nhanvien'
                WHEN EXISTS (SELECT * FROM khachhang WHERE idKhachHang = '$username') THEN 'khachhang'
                ELSE 'none'
            END AS loaitaikhoan";
            $loaitaikhoan = $this->select($sql);
            return $loaitaikhoan;
        }
        public function checkUsername($username){
            $sql = "SELECT * FROM taikhoan WHERE tenDangNhap = '$username'";
            return $this->select($sql);
        }
        public function thongtintaikhoan($username)
        {
            $loaitaikhoan = $this->checkloaitaikhoan($username);
            if($loaitaikhoan[0]['loaitaikhoan'] == "nhanvien"){
                $sql = "SELECT * FROM nhanvien nv 
                JOIN taikhoan ON taikhoan.tendangnhap = nv.idNhanVien
                WHERE nv.idNhanVien = '$username'";
                return $this->select($sql);
            }
            return $this->findById("khachhang", $username);
        }
        public function updateAccount($data, $id)
        {
            return $this->update(self::TABLE, $data, $id);
        }

        public function themAccount($data) {
            return $this->insert(self::TABLE, $data);
        }

        public function themKhachHang($data) {
            return $this->insert("khachhang", $data);
        }

        public function themNhanVien($data) {
            return $this->insert("nhanvien", $data);
        }
    }