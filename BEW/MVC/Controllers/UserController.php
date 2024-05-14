<?php
    class UserController extends BaseController {

        public function information() {
            $user = $_SESSION["user"];
            $this->view('frontend.masteruser', [
                "pagethem" => "loaisanpham/them",
                'content' => 'user/information',
                "header"=> "user/header",
                "user"=> $user,
            ]);
        }

        public function information() {
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