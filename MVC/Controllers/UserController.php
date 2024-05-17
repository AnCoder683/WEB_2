<?php
class UserController extends BaseController
{
    private $acountmodel;
    public function __construct()
    {
        $this->acountmodel = $this->model("AcountModel");
    }

    public function information()
    {
        $user = $_SESSION["user"];
        $this->view('frontend.masteruser', [
            "pagethem" => "loaisanpham/them",
            'content' => 'user/information',
            "header" => "user/header",
            "user" => $user,
        ]);
    }

    public function information_update()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['updateUsername']) && isset($_POST['updatePhone']) && isset($_POST['updateEmail']) && isset($_POST['updateGender']) && isset($_POST['updateDate']) && isset($_POST['updateAddress'])) {
                if (empty($_POST['updateUsername']) || empty($_POST['updatePhone']) || empty($_POST['updateEmail']) || empty($_POST['updateGender']) || empty($_POST['updateDate']) || empty($_POST['updateAddress'])) {
                    $reponse = ["status" => 0, "message" => "emty-error"];
                } else {
                    $fullname = $_POST['updateUsername'];
                    $phone = $_POST['updatePhone'];
                    $mail = $_POST['updateEmail'];
                    $gender = $_POST['updateGender'];
                    $birthday = $_POST['updateDate'];
                    $address = $_POST['updateAddress'];

                    $username = $_SESSION['user']['idKhachHang'];

                    if($_SESSION['user']['ten'] == $fullname && $_SESSION['user']['SDT'] == $phone && $_SESSION['user']['gioiTinh'] == $gender && $_SESSION['user']['ngaySinh'] == $birthday && $_SESSION['user']['diaChiGiaoHang'] == $address){
                        $reponse = ["status" => 0, "message" => "update-fail"];
                    }else{
                        $updateResult = $this->acountmodel->updateUserInformation($fullname, $phone, $mail, $gender, $birthday, $address, $username);    
                        if ($updateResult) {
                            unset($_SESSION['user']);
                            $user = $this->acountmodel->getDetailInfo($username);
                            $_SESSION["user"] = $user[0];
                            $reponse = ["status" => 1, "message" => "Thành công"];
                        } else {
                            $reponse = ["status" => 0, "message" => "update-error"];
                        }
                    }
                }
            }
        } else {
            $reponse = ["status" => 0, "message" => "Không nhận được yêu cầu"];
        }
        echo json_encode($reponse);
        
    }
}
