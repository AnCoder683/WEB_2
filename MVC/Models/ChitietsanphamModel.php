<?php 
    class ChitietsanphamModel extends BaseModel 
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function index()
        {

        }
        public function getChitietsanpham($id)
        {
            $sql = "SELECT 
            sp.idSanPham,
            sp.tenSanPham,
            sp.giaSanPham,
            sp.moTa,
            sp.tt_xoa,
            mau.tenMau,
            loaisanpham.tenLoai,
            size.tenSize,
            chitiet.imgPath AS detailImgPath,
            chitiet.idchitietsanpham AS idchitiet
            FROM 
                sanpham sp
            JOIN 
                chitietsanpham chitiet ON sp.idSanPham = chitiet.idSanPham
            JOIN 
                mau ON chitiet.idMau = mau.idMau
            JOIN 
                size ON chitiet.idSize = size.idSize
            JOIN
                loaisanpham ON loaisanpham.idLoaiSanPham = sp.idLoaiSanPham
            WHERE sp.idSanPham = '$id'
            ORDER BY 
                sp.idSanPham DESC";
            return $this->select($sql);
        }
    }
?>