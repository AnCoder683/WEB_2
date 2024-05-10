<?php 
    function adminpermission()
    {
        $check = true;
        if(!isset($_SESSION["account"])){
            $check = false;
        } else {
            $account = $_SESSION["account"];
            if(isset($account["quyen"]) === "Q004")
            {
                $check = false;
                $_SESSION['message'] = 'Vui lòng sử dụng tài khoản hợp lệ';
            } else {
                
            }
                
        }
        if(!$check){
            header("Location: ".BASE_URL."/admin/login");
            exit();
        }
    }
    
    function isLogin() {
        if(isset($_SESSION["account"])){
            header("Location: ".BASE_URL."/admin/dashboard");
            exit();
        } 
    }
