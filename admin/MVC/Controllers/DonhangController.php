<?php
    class DonhangController extends BaseController{
        private $donhangmodel;

        public function __construct()
        {
            $this->donhangmodel = $this->model("DonhangModel");
        }

        public function xemtatcadonhang()
        {
            $data = $this->donhangmodel->getall_donhang();
            $this->view('frontend.masteradmin', [
                "content"=> "donhang/lietke",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data,
            ]); 
        }

        public function update_xacnhan($id)
        {
            $data = [
                "trangThai" => "Chờ nhận hàng",
                "idNhanVien" => $_SESSION['accoutn']['tenDangNhap']
            ];
            $update = $this->donhangmodel->update_xacnhan($data, $id);
            if ($update == true) { 
                $message = "Xác nhận thành công";
            } else {
                $message = "Xác nhận thất bại";
            }
            $this->view('frontend.masteradmin', [
                "content"=> "donhang/lietke",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data,
                "message"=> $message,
            ]);

        }
    }