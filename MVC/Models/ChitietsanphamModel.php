<?php   
    class ChitietsanphamModel extends BaseModel{
        const TABLE = 'chitietsanpham';
        public function getChiTietSanPhamByIdSanPham($id){
            $sql = "SELECT * FROM chitietsanpham WHERE idSanPham = '$id'";
            $query = $this->_query($sql);
            return $this->_getArrayData($query);
        }
        
        public function checkChiTietSanPham($idSanPham, $idMau, $idSize){
            $sql = "SELECT * FROM chitietsanpham WHERE idSanPham = '$idSanPham' AND idMau = '$idMau' AND idSize = '$idSize' AND tt_xoa = 0";
            // die($sql);
            $query = $this->_query($sql);
            return $this->_getObjData($query);
        }

        public function getChiTietSanPhamObj($id, $idGioHang){
            $sql = "SELECT 
            c.idChiTietSanPham, 
            c.idSanPham, 
            c.idMau, 
            c.idSize, 
            c.soLuong, 
            c.imgPath, 
            c.tt_xoa AS tt_xoaChiTiet, 
            s.tenSanPham, 
            s.giaSanPham, 
            s.moTa, 
            s.soLuongTrongKho, 
            s.img, 
            s.tt_xoa AS tt_xoaSanPham, 
            s.idLoaiSanPham,
            m.tenMau,
            si.tenSize,
            ctgh.soLuong AS soLuongHangMua,
            ctgh.idGioHang
        FROM 
            chitietsanpham c
        JOIN 
            sanpham s ON c.idSanPham = s.idSanPham
        JOIN 
            mau m ON c.idMau = m.idMau
        JOIN 
            size si ON c.idSize = si.idSize
        JOIN
            chitietgiohang ctgh ON c.idChiTietSanPham = ctgh.idChiTietSanPham
        WHERE 
            c.idChiTietSanPham = '$id' AND ctgh.idGioHang = '$idGioHang';
        ";
            // echo ( $sql . '<br><br><br>');
            $query = $this->_query($sql);
            return $this->_getObjData($query);
        }

        public function getAll($value){
            echo $value['idSanPham'];
        }
    }