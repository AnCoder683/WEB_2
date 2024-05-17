<?php
    class DonhangController extends BaseController{
        private $donhangmodel;

        public function __construct()
        {
            $this->donhangmodel = $this->model("DonhangModel");
        }

        public function xemtatcadonhang()
        {
            $data = $this->donhangmodel->getall_donhang();
            $this->view('frontend.masteradmin', [
                "content"=> "donhang/lietke",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data,
            ]); 
        }
    }