<?php
    class PhieunhapController extends BaseController{
        private $phieunhapmodel;

        public function __construct()
        {
            $this->phieunhapmodel = $this->model("PhieunhapModel");
        }
        public function index(){
            $this->danhsach();
        }
        public function danhsach()
        {
            $column = ['*'];
            $order = [
                'column' => 'idDonNhap',
                'order' => 'ASC'
            ];
            $limit = 50;
            $data = $this->phieunhapmodel->getAll_phieunhap($column, $order, $limit);
            $this->view('frontend.masteradmin', [
                "content"=> "phieunhap/lietke",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data,
            ]);
        }

        public function add()
        {
            $this->view('frontend.masteradmin', [
                "pagethem" => "loaisanpham/them",
                "content"=> "phieunhap/them",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
            ]);
        }
    }