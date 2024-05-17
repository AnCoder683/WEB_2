<?php
    class PhieunhapController extends BaseController{
        private $phieunhapmodel;

        private $chitietsanphammodel;

        public function __construct()
        {
            $this->phieunhapmodel = $this->model("PhieunhapModel");
            $this->chitietsanphammodel = $this->model("ChitietsanphamModel");
        }
        public function index(){
            $this->danhsach();
        }
        public function danhsach()
        {
            $column = ['*'];
            $order = [
                'column' => 'idDonNhap',
                'order' => 'ASC'
            ];
            $limit = 50;
            $data = $this->phieunhapmodel->getAll_phieunhap($column, $order, $limit);
            $this->view('frontend.masteradmin', [
                "content"=> "phieunhap/lietke",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data,
            ]);
        }
        public function add()
        {
            $danhsachsanpham = $this->chitietsanphammodel->getall_chitietsanpham();
            $datancc = $this->phieunhapmodel->getAllNhaCungCap();
            $this->view('frontend.masteradmin', [
                "pagethem" => "loaisanpham/them",
                "content"=> "phieunhap/them",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $danhsachsanpham,
                "datancc" => $datancc
            ]);
        }
        public function update_xacnhan($id) {
            $data = [
                "tinhTrang" => "Chờ nhận hàng",
            ];
            $update = $this->phieunhapmodel->update_phieunhap($data, $id);
            if ($update == true) { 
                $message = "Đã xác nhận đơn hàng";
            } else {
                $message = "Có lỗi trong quá trình xác nhận.";
            }
            $data = $this->phieunhapmodel->getAll_phieunhap();
            $this->view('frontend.masteradmin', [
                "content"=> "phieunhap/lietke",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data,
                "message"=> $message,
            ]);
        }
        public function update_hoanthanh($id) {
            $data = [
                "tinhTrang" => "Hoàn thành",
            ];
            $update = $this->phieunhapmodel->update_phieunhap($data, $id);
            if ($update == true) { 
                $message = "Đơn hàng đã hoàn thành";
            } else {
                $message = "Lỗi hoàn thành đơn hàng";
            }
            $data = $this->phieunhapmodel->getAll_phieunhap();
            $this->view('frontend.masteradmin', [
                "content"=> "phieunhap/lietke",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data,
                "message"=> $message,
            ]);
        }

        public function themphieunhap() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Receive form data from AJAX request
                $chitiet = isset( $_POST['chitiet'] ) ? $_POST['chitiet'] : [];
                echo json_encode(['result' => true, 'message' => json_encode( $chitiet ) ]);
            } else {
                echo json_encode(['result'=> false, 'message'=> 'Không nhận được yêu cầu']);
            }
        }
        // public themphieunhapForm() {
        //     $listchitietsp = $this->;
        // }
    }