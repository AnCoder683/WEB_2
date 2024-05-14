<?php
    class SignupController extends BaseController{
        private $acountmodel;
        public function __construct()
        {
            $this->acountmodel = $this->model("AcountModel");
        }
        public function showsignup() {
            $this->view('frontend.masteruser', [
                'header' => 'user/header',
                'content' => 'signup',
                'footer' => 'user/footer'
            ]);
        }
        public function handleSignup() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                // if(empty($username) || empty($password) || empty($password_confirm) || empty($fullname) || empty($email) || empty($phone) || empty($gender)){
                //     echo json_encode(array("status" => 0, "message" => "empty_error"));
                //     exit();
                // }
                if(!isset($_POST['text_username_login']) || !isset($_POST['text_password_login'])) {
                    $reponse = ["status" => 0, "message" => "Vui lòng điền đầy đủ thông tin"];
                } else {
                    $username = $_POST['text_username_login'];
                    $password = $_POST['text_password_login'];
                    $result = $this->acountmodel->findUsername($username);
                    if(empty($result)){
                        $reponse = ["status" => 0, "message" => "Tài khoản không tồn tại"];
                    } else if ($password !== $result[0]['MatKhau']) {
                        $reponse = ["status" => 0, "message" => "Sai mật khẩu"];
                    } else if($result[0]['tinhTrang'] == 0){
                        $reponse = ["status" => 0, "message" => "Tài khoản đã bị khoá"];
                    } else {
                        $user = $this->acountmodel->getDetailInfo($username);
                        $_SESSION["user"] = $user[0];
                        $reponse = ["status" => 1, "message" => "Thành công"];
                    }
                }
            } else {
                $reponse = ["status" => 0, "message" => "Không nhận được yêu cầu"];
            }
            echo json_encode($reponse);
        }
    }