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

                    $updateResult = $this->acountmodel->updateUserInformation($fullname, $phone, $mail, $gender, $birthday, $address, $username);

                    if ($updateResult) {
                        $reponse = ["status" => 1, "message" => "Thành công"];
                    } else {
                        $reponse = ["status" => 0, "message" => "update-error"];
                    }
                }
            }
        } else {
            $reponse = ["status" => 0, "message" => "Không nhận được yêu cầu"];
        }
        echo json_encode($reponse);
        // controller
        // if(empty($fullname) || empty($phone) || empty($gender) || empty($birthday) || empty($address) || empty($email)){
        //     echo json_encode(array("status" => 0, "message" => "empty_error"));
        //     header("Location: ../Main.php?page=Information");
        //     exit();
        // }

        //accountmodel
        // $db = new DatabaseUtil();
        // $conn = $db->connect();
        // global $ss;
        // $username = mysqli_real_escape_string($conn, $ss->get('username'));
        // $fullname = mysqli_real_escape_string($conn, $fullname);
        // $phone = mysqli_real_escape_string($conn, $phone);
        // $email = mysqli_real_escape_string($conn, $email);
        // $gender = ($gender === 'Nam') ? 1 : 0; // Convert gender to database format
        // $birthday = mysqli_real_escape_string($conn, $birthday);
        // $address = mysqli_real_escape_string($conn, $address);

        // // Update user information in the database
        // account model
        // $query = "UPDATE khachhang SET ten = '$fullname', SDT = '$phone', email = '$email', gioiTinh = '$gender', ngaySinh = '$birthday', diaChiGiaoHang = '$address' WHERE idKhachHang = '$username'";
        // $db->executeQuery($query);
        // if ($db->executeQuery($query)) {
        //     echo json_encode(array("status" => 1, "message" => "update_success"));
        //     exit();
        // } else {
        //     echo json_encode(array("status" => 0, "message" => "update_error"));
        //     exit();
        // }
    }
}
