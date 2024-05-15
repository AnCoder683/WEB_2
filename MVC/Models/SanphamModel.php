<?php 
    class SanphamModel extends BaseModel
    {
        const TABLE = "sanpham";

        public function getAll_loaisanpham($column = ['*'], $order = [], $limit = 15)
        {
            return $this->getOrderBy(self::TABLE, $column, $order, $limit);
        }

        public function getAllSanPham($or, $fi = ''){
            if($or != ''){
                $sql = "SELECT *
                FROM sanpham
                WHERE tenSanPham  LIKE '$fi%'AND tt_xoa = 0
                ORDER BY $or ";
            }else{
                $sql = "SELECT *
                FROM sanpham
                WHERE tenSanPham LIKE '$fi%' AND tt_xoa = 0
                ";
            }
            // die($sql);
            $query = $this->_query($sql);
            return $this->_getArrayData($query);
        }
        

        public function getSanPhamById($id){
            return $this->findById(self::TABLE, $id);
        }
    }
?>