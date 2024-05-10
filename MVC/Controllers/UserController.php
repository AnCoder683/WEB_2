<?php
    class UserController extends BaseController{
        private $acountmodel;
        public function __construct()
        {
            $this->acountmodel = $this->model("AcountModel");
        }
        public function index()
        {
           $this->main();
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
        public function main()
        {
            $this->view("frontend.masteruser", [
                "header" => "user/header",
                "content" => "user/lietke",
                "footer" => "user/footer",
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