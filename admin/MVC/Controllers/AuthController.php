<?php
    class AuthController extends BaseController{
        private $acountmodel;
        public function __construct()
        {
            $this->acountmodel = $this->model("AcountModel");
        }
        public function loginhandle()
        {
            if(isset($_POST["username"]) && isset($_POST["password"])){
                $username = $_POST["username"];
                $quyen = $this->acountmodel->quyenAcount($username);
                $password = $_POST["password"];
                if($quyen[0]["role"] === "user") {
                    $response = ['error' => 'Tài khoản của bạn không đủ thẩm quyền'];
                } else {
                    $finduser = $this->acountmodel->findAccount($username, $password);
                    if(!empty($finduser)){
                        if($finduser[0]['tinhTrang'] === '1'){
                            $response = ['success' => true, 'redirect' => BASE_URL.'/admin/dashboard'];
                            $_SESSION['account'] = $finduser[0];
                        } else {
                            $response = ['error' => 'Tài khoản của bạn đã bị khóa'];
                        }
                    } else{
                        $response = ['error' => 'Tên đăng nhập hoặc mật khẩu không đúng'];
                    }
                }
                
            } else {
                $response = ['error' => 'Vui lòng nhập đầy đủ thông tin'];
            }
            echo json_encode($response);
        }
        public function logout()
        {
            unset($_SESSION['account']);
            header('Location: '.BASE_URL.'/admin/login');
        }
    }