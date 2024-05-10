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
    }
?>