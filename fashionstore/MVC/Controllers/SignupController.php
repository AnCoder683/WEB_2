<?php
class SignupController extends BaseController
{
    private $acountmodel;
    public function __construct()
    {
        $this->acountmodel = $this->model("AcountModel");
    }
    public function showsignup()
    {
        $this->view('frontend.masteruser', [
            'header' => 'user/header',
            'content' => 'signup',
            'footer' => 'user/footer'
        ]);
    }
    public function handleSignup()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['text_username']) && isset($_POST['text_password']) && isset($_POST['text_password_confirm']) && isset($_POST['text_fullname']) && isset($_POST['text_email']) && isset($_POST['text_phone_number']) && isset($_POST['gender-selection'])) {
                if (empty($_POST['text_username']) || empty($_POST['text_password']) || empty($_POST['text_fullname']) || empty($_POST['text_email']) || empty($_POST['text_phone_number'])) {
                    $reponse = ["status" => 0, "message" => "emty-error"];
                } else {
                    $username = $_POST['text_username'];
                    $password = $_POST['text_password'];
                    $fullname = $_POST['text_fullname'];
                    $phone = $_POST['text_phone_number'];
                    $email = $_POST['text_email'];
                    $gender = $_POST['gender-selection'];
                    $quyen = 'Q004';
                    $tinhtrang = 1;
                    if (empty($username)) {
                        $reponse = ["status" => 0, "message" => "emty-error"];
                    }
                    $result = $this->acountmodel->findUsername($username);
                    if (!empty($result)) {
                        $reponse = ["status" => 0, "message" => "exist-error"];
                    } else {
                        $this->acountmodel->insertUsername($username, $password, $tinhtrang, $quyen, $fullname, $phone, $email, $gender);
                        $reponse = ["status" => 1, "message" => "Thành công"];
                    }
                }
            }
        } else {
            $reponse = ["status" => 0, "message" => "Không nhận được yêu cầu"];
        }
        echo json_encode($reponse);
    }
}
