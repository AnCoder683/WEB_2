<?php 
    class PhieunhapModel extends BaseModel
    {
        const TABLE = "donnhap";
        public function getAll_phieunhap($column = ['*'], $order = [], $limit = 15)
        {
            $sql = "SELECT * FROM donnhap dn
            JOIN nhanvien nv ON nv.idNhanVien = dn.idNhanVien
            JOIN nhacungcap ncc ON ncc.idNhaCungCap = dn.idNhaCungCap";
            return $this->select($sql);
        }
        // public function insert($table, $data){
        //     $cols = implode(', ', array_keys($data));
        //     $arrayVal = [];
        //     foreach($data as $key => $value){
        //         array_push($arrayVal, "'$value'");
        //     }
        //     $vals = implode(', ', $arrayVal);
        //     $sql = "INSERT INTO $table($cols) VALUES($vals)";
        //     $this->_query($sql);
        // }

        public function add_loaisanpham($data)
        {
            return $this->insert(self::TABLE ,$data);
        }
        public function add_phieunhap($data)
        {
            return $this->insert(self::TABLE ,$data);
        }
        public function update_phieunhap($data, $id)
        {
            return $this->update(self::TABLE ,$data, $id);
        }

        public function findby_idsanpham($id){
            $sql = "SELECT * FROM chitietdonnhap WHERE idChiTietSanPham = '$id'";
            return $this->select($sql);
        }

        public function finddonhangby_idsanpham($id){
            $sql = "SELECT * FROM chitietdonhang WHERE idChiTietSanPham = '$id'";
            return $this->select($sql);
        }

        public function getAllNhaCungCap()
        {
            $sql = "SELECT * FROM nhacungcap";
            return $this->select($sql);
        }
    }