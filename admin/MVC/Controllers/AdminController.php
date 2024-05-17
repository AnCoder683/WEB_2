<?php
    class AdminController extends BaseController{
        private $acountmodel;
        private $donhangmodel;
        public function __construct()
        {
            $this->acountmodel = $this->model("AcountModel");
            $this->donhangmodel = $this->model("DonhangModel");
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
            $donhang = $this->donhangmodel->count_donhang();
            $tongdh = $donhang[0]['tongdonhang'];
            $this->view("frontend.masteradmin", [
                "content"=> "admin/dashboard",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "tongdh"=> $tongdh
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