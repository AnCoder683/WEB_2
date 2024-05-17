<?php
    class AdminController extends BaseController{
        private $acountmodel;
        private $currentaccount;
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

        public function logout()
        {
            unset($_SESSION['account']);
        }

        public function getpermission()
        {
            if(isset($_SESSION['account'])){
                $currentaccount = $_SESSION['account'];
                $user = $currentaccount['tenDangNhap'];
                $datapermisson = $this->acountmodel->getpermission($user);
            }
            echo json_encode($datapermisson);
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
            if(isset($_SESSION["account"])){
                $this->view("frontend.masteradmin", [
                    "content"=> "_404",
                    "header"=> "admin/header",
                    "sidebar"=> "admin/sidebar",
                ]);
            } else {
                $this->view("frontend.masteradmin", [
                    "content"=> "_404",
                ]);
            }
        }
    }