<?php 
    class LoaisanphamModel extends BaseModel
    {
        const TABLE = "loaisanpham";
        public function getAll_loaisanpham()
        {
            $sql = "SELECT lsp.idLoaiSanPham, lsp.tenLoai, lsp.tt_xoa, COUNT(sp.idSanPham) AS soLuongSanPham
            FROM loaisanpham lsp 
            LEFT JOIN sanpham sp ON sp.idLoaiSanPham = lsp.idLoaiSanPham 
            GROUP BY lsp.idLoaiSanPham;";
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

        public function update_loaisanpham($data, $id)
        {
            return $this->update(self::TABLE, $data, $id);
        }
        public function delete_loaisanpham($id)
        {
            return $this->delete(self::TABLE, $id);
        }

        public function find_loaisanpham($id)
        {
            return $this->findById(self::TABLE, $id);
        }
        public function exist_insanpham($id)
        {
            $sql = "SELECT * FROM sanpham WHERE idLoaiSanPham = '$id'";
            return $this->select($sql);
        }
        // public function pagination()
        // {
        //     // Số mục trên mỗi trang
        //     $items_per_page = 10;

        //     // Tổng số loại sản phẩm
        //     $total_items = count($data);

        //     // Tính toán số trang
        //     $total_pages = ceil($total_items / $items_per_page);

        //     // Lấy trang hiện tại từ yêu cầu AJAX
        //     $current_page = isset($_POST['page']) ? $_POST['page'] : 1;

        //     // Tính toán phạm vi của mục trên trang hiện tại
        //     $start_index = ($current_page - 1) * $items_per_page;
        //     $end_index = min($start_index + $items_per_page - 1, $total_items - 1);

        //     // Hiển thị dữ liệu cho trang hiện tại
        //     for ($i = $start_index; $i <= $end_index; $i++) {
        //         // Hiển thị dữ liệu tương ứng với $i
        //         // Lưu ý: Dữ liệu phải được lấy từ $data theo chỉ số $i
        //     }
        // }
    }
?>