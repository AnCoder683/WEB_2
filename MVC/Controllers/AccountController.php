<?php
    class AccountController extends BaseController{
        private $accountmodel;
        public function __construct()
        {
            $this->accountmodel = $this->model("AcountModel");
        }
        public function index()
        {
           $this->danhsach();
        }
        public function danhsach()
        {
            $data = $this->accountmodel->listAcount();
            $this->view("frontend.masteradmin", [
                "content"=> "account/lietke",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data
            ]);
        }
        public function them()
        {
            $data = $this->accountmodel->listAcount();
            $listquyen = $this->accountmodel->listquyen();
            $level = $_SESSION['account']['muc_uu_tien'];
            $this->view("frontend.masteradmin", [
                "content"=> "account/them",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data,
                "listquyen"=> $listquyen,
                "level" => $level
            ]);
        }
        public function handle()
        {
            $loaitaikhoan = isset($_POST['role'])?$_POST['role']:'';
            $data = [
                "email" => $_POST["email"],
                "SDT"=> $_POST["phone"],
            ];
            $account = [
                "tenDangNhap"=> $_POST["username"],
                "matKhau" => $_POST["password"],
                "tinhTrang" => 1,
                "idQuyen" => $_POST["quyen"]
            ];
                $themacc = $this->accountmodel->themAccount($account);
                if($themacc === true) {
                    $reponse = ["result" => true,"message"=> "Thêm tài khoản thành công"];
                    if($loaitaikhoan === "user") {
                        $data ["idKhachHang"] =  $account["tenDangNhap"];
                        $data ["ten"] = $_POST["name"];
                        $data ["gioiTinh"] = "";
                        $data ["ngaySinh"] = "";
                        $data ["diaChiGiaoHang"] = "";
                        $themkh = $this->accountmodel->themKhachHang($data);
                        if($themkh === true) {
                            $reponse = ["result" => false,"message"=> "Thêm khách hàng thành công"];
                        } else {
                            $reponse = ["result" => false,"message"=> "Thêm khách hàng thất bại"];
                        }
                    } elseif($loaitaikhoan === "admin") {
                        $data ["idNhanVien"] =  $account["tenDangNhap"];
                        $data ["tenNhanVien"] = $_POST["name"];
                        $themadmin = $this->accountmodel->themNhanVien($data);
                        if($themadmin === true) {
                            $reponse = ["result" => false,"message"=> "Thêm quản trị viên thành công"];
                        } else {
                            $reponse = ["result" => false,"message"=> "Thêm quản trị viên thất bại"];
                        }
                    } else {
                        $reponse = ["result" => false,"message"=> "Chưa nhận được loại tài khoản"];
                    }
                } else {
                    $reponse = ["result"=> false,"message"=> "Thêm tài khoản thất bại"];
                }
            echo json_encode($reponse);
        }
        public function sua($username)
        {
            $data = $this->accountmodel->thongtintaikhoan($username);
            $listquyen = $this->accountmodel->listquyen();
            $level = $_SESSION['account']['muc_uu_tien'];
            $this->view("frontend.masteradmin", [
                "content"=> "account/sua",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data,
                "listquyen"=> $listquyen,
                "level" => $level
            ]);
        }
        public function blockaccount($id)
        {
            $data = [
                "tinhTrang" => "0",
            ];
            $result = $this->accountmodel->updateAccount($data, $id);
            if($result == true) {
                $reponse = ["result" => true, "message" => "Khóa thành công"];
            } else {
                $reponse = ["result"=> false, "message" => "Khóa thất bại"];
            }
            echo json_encode($reponse);
        }

        public function unlockaccount($id)
        {
            $data = [
                "tinhTrang" => "1",
            ];
            $result = $this->accountmodel->updateAccount($data, $id);
            if($result == true) {
                $reponse = ["result" => true, "message" => "Mở khóa thành công"];
            } else {
                $reponse = ["result"=> false, "message" => "Mở khóa thất bại"];
            }
            echo json_encode($reponse);
        }

        public function checkUsername($username) {
            $result = $this->accountmodel->checkUsername($username);
            if(empty($result) == false) {
                $reponse = ['result'=> false,'message'=> 'Tên tài khoản đã tồn tại'];
            } else {
                $reponse = ['result'=> true];
            }
            echo json_encode($reponse);
        }
    }