<?php
    class AdminController extends BaseController{
        private $acountmodel;
        public function __construct()
        {
            $this->acountmodel = $this->model("AcountModel");
        }
        public function index()
        {
           $this->login();
        }

        public function login()
        {
            $this->view("frontend.adminlogin", []);
        }
        public function loginhandle()
        {
            if(isset($_POST["username"]) && isset($_POST["password"])){
                $username = $_POST["username"];
                $password = $_POST["password"];
                $finduser = $this->acountmodel->findUsername($username);
                die($finduser);
                if($finduser != false){
                    echo "đăng nhập thành công";
                } else{
                    echo "thất bại";
                }

            }
        }
        public function dashboard()
        {
            $this->view("frontend.masteradmin", [
                "content"=> "admin/dashboard",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
            ]);
        }

        public function eror404()
        {
            $this->view("frontend.masteradmin", [
                "content"=> "_404",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
            ]);
        }
       
    }