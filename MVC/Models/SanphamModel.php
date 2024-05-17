<?php 
    class SanphamModel extends BaseModel
    {
        const TABLE = "sanpham";

        public function getAll_loaisanpham($column = ['*'], $order = [], $limit = 15)
        {
            return $this->getOrderBy(self::TABLE, $column, $order, $limit);
        }

        public function getLastId(){
            $sql = "SELECT idSanPham FROM sanpham ORDER BY idSanPham DESC LIMIT 1";
            return $this->select($sql);
        }

        public function update_sanpham($data, $id){
            return $this->update(self::TABLE, $data, $id);
        }

        public function get_sanpham($id){
            return $this->findById(self::TABLE, $id);
        }
        public function paginationData($start, $per_page)
        {
            $sql = "SELECT *
            FROM 
                sanpham sp
            JOIN
                loaisanpham ON loaisanpham.idLoaiSanPham = sp.idLoaiSanPham 
            ORDER BY 
                sp.idSanPham ASC
            LIMIT $start, $per_page";
            return $this->select($sql);
        }
        

        public function getSanPhamById($id){
            return $this->findById(self::TABLE, $id);
        }

        public function delete_sanpham($id){
            return $this->delete(self::TABLE, $id);
        }
    }
