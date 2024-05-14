<?php
    class ChitietsanphamController extends BaseController{
        private $sanphamModel;
        public function __construct()
        {
            $this->sanphamModel = $this->model('SanphamModel');
        }
        public function showChitietSanPham(){
            
        }
    }