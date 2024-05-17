<?php 
    class SanphamModel extends BaseModel
    {
        const TABLE = "sanpham";
        public function listsanpham()
        {
            $sql = 'SELECT *
            FROM 
                sanpham sp
            JOIN
                loaisanpham ON loaisanpham.idLoaiSanPham = sp.idLoaiSanPham
            ORDER BY 
                sp.idSanPham DESC';
            return $this->select($sql);
        }
        public function insert_sanpham($data)
        {
            return $this->insert_getlastId(self::TABLE, $data);
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

        public function count_sanpham()
        {
            $sql = "SELECT COUNT(*) as total FROM sanpham";
            $result = $this->select($sql);
            return $result ? $result[0]['total'] : 0;
        }

        public function delete_sanpham($id){
            return $this->delete(self::TABLE, $id);
        }
    }