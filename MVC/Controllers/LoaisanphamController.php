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
            $data = [
                'tenLoai'=> $loaisanpham,
                'tt_xoa' => '1'
            ];
            if(isset($_POST['themloaisanpham'])){
                $success = '';
                $result = $this->loaisanphammodel->add_loaisanpham($data);
                if($result == null){
                    $success = 'true';
                }else {
                    $success = 'false';
                }
                $_SESSION['success'] = $success;
                header("Location: ".BASE_URL."/loaisanpham/themloaisanpham");
            }
        }
// sửa và xóa
        public function xuly($id)
        {
            $loaisanpham = $_POST['tenLoai'];
            $tinhtrang = $_POST['tinhtrang'];
            $data = [
                'tenLoai'=> $loaisanpham,
                'tt_xoa' => $tinhtrang
            ];
            if(isset($_POST['sualoaisanpham'])){
                $success = '';
                $result = $this->loaisanphammodel->update_loaisanpham($data, $id);
                if($result == null){
                    $success = 'true';
                }else {
                    $success = 'false';
                }
                $_SESSION['success'] = $success;
                header("Location: ".BASE_URL."/loaisanpham/sualoaisanpham/".$id);
            }
            else{
                // $id = $_GET['id'];
                // $sql_xoa = "DELETE FROM loaisanpham WHERE idLoaiSanPham = '$id'";
                // $conn->query($sql_xoa);
                // header('Location:../../../index.php?action=quanlydanhmucsanpham&query=them');
            }
        }
    }