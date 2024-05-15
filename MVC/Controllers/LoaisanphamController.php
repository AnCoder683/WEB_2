<?php
    class LoaisanphamController extends BaseController{
        private $loaisanphammodel;

        public function __construct()
        {
            $this->loaisanphammodel = $this->model("LoaisanphamModel");
        }
        public function index(){
            $this->listloaisanpham();
        }
        public function listloaisanpham()
        {
            $column = ['*'];
            $order = [
                'column' => 'idLoaiSanPham',
                'order' => 'ASC'
            ];
            $limit = 20;
            $data = $this->loaisanphammodel->getAll_loaisanpham($column, $order, $limit);
            $this->view('frontend.masteradmin', [
                "pagethem" => "loaisanpham/them",
                "content"=> "loaisanpham/lietke",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data,
            ]);
        }

        public function themloaisanpham()
        {
            $this->view('frontend.masteradmin', [
                "content"=> "loaisanpham/them",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
            ]);
        }

        public function sualoaisanpham($id)
        {
            $data = $this->loaisanphammodel->find_loaisanpham($id);
            $this->view('frontend.masteradmin', [
                "content"=> "loaisanpham/sua",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data,
                "id" => $id
            ]);
        }
        //thêm 
        public function them()
        {
            $loaisanpham = $_POST['tenLoai'];
            $tinhtrang = $_POST['tinhtrang'];
            $data = [
                'tenLoai'=> $loaisanpham,
                'tt_xoa' => $tinhtrang
            ];
            if(isset($_POST['action']) && $_POST['action'] === 'themloaisanpham'){
                $result = $this->loaisanphammodel->add_loaisanpham($data);
                if($result === true){
                    $reponse = ["result" => true, "message" => "Thêm loại sản phẩm thành công"];
                }else {
                    $reponse = ["result" => false, "message" => "Thêm loại sản phẩm thất bại"];
                }
            } else {
                $reponse = ["result"=> false,"message"=> "Không nhận được thêm"];
            }
            echo json_encode($reponse);
        }
// sửa và xóa
        public function sua()
        {
            $loaisanpham = $_POST['tenLoai'];
            $tinhtrang = $_POST['tinhtrang'];
            $data = [
                'tenLoai'=> $loaisanpham,
                'tt_xoa' => $tinhtrang
            ];
            $id = $_POST['idLoaiSanPham'];
            if(isset($_POST['action']) && $_POST['action'] === 'sualoaisanpham'){
                $result = $this->loaisanphammodel->update_loaisanpham($data, $id);
                if($result === true){
                    $reponse = ["result" => true, "message" => "Sửa loại sản phẩm thành công"];
                }else {
                    $reponse = ["result" => false, "message" => "Sửa loại sản phẩm thất bại"];
                }
            } else {
                $reponse = ["result"=> false,"message"=> "Không nhận được Sửa"];
            }
            echo json_encode($reponse);
        }

        public function xoa($id)
        {
            $check = $this->loaisanphammodel->exist_insanpham($id);
            if(!empty($check)){
                $reponse = ["result"=> false,"message"=> "Tồn tại sản phẩm có danh mục này"];
            } else{
                $result = $this->loaisanphammodel->delete_loaisanpham($id);
                if($result === true){
                    $reponse = ["result"=> true,"message"=> "Xóa loại sản phẩm thành công"];
                } else{
                    $reponse = ["result"=> false,"message"=> "Xóa thất bại"];
                }
            }
            echo json_encode($reponse);
        }
    }