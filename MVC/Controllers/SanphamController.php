<?php
    class SanphamController extends BaseController{
        private $sanphammodel;
        private $chitietsanphamModel;
        private $loaisanphammodel;
        private $chitietspmodel;
        private $phieunhapmodel;
        public function __construct()
        {
            $this->sanphammodel = $this->model("SanphamModel");
            $this->chitietsanphamModel = $this->model("ChitietsanphamModel");
            $this->sanphammodel = $this->model("SanphamModel");
            $this->loaisanphammodel = $this->model("LoaisanphamModel");
            $this->chitietspmodel = $this->model("ChitietsanphamModel");
            $this->phieunhapmodel = $this->model("PhieunhapModel");
        }
    

        public function index(){
            $this->listloaisanpham();
        }

        public function listloaisanpham()
        {
            $column = [
                'idLoaiSanPham',
                'tenLoai',
                'tt_xoa'
            ];
            $order = [
                'column' => 'idLoaiSanPham',
                'order' => 'ASC'
            ];
            $limit = 20;
            $data = $this->sanphammodel->getAll_loaisanpham($column, $order, $limit);
            $this->view('frontend.masteradmin', [
                "pagethem" => "loaisanpham/them",
                "content"=> "loaisanpham/lietke",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data,
            ]);
        }

        public function showSanpham(){
            $or = isset($_POST['sortType'])?$_POST['sortType']:'';
            $fi = isset($_POST['findSanPham'])?$_POST['findSanPham']:'';
            $data = $this->sanphammodel->getAllSanPham($or);
            $this->view('frontend.masteruser', [
                'data' => $data,
                'content' => 'sanpham/show',
                'detail' => 'sanpham/chitietsanpham',
                "header" => "user/header",
                "footer" => "user/footer",
            ]);
        }
        public function timkiemSanpham(){
            $or = isset($_POST['sortType'])?$_POST['sortType']:'';
            $fi = isset($_POST['findSanPham'])?$_POST['findSanPham']:'';
            $data = $this->sanphammodel->getAllSanPham($or, $fi);
            $this->view('frontend.sanpham.timkiemsanpham', [
                'data' => $data,
            ]);
        }
        public function showChiTietSanPham(){
            $id = isset($_POST['id'])?$_POST['id']:'';
            $this->view('frontend.sanpham.chitietsanpham', [
                'dataSanPham' => $this->sanphammodel->getSanPhamById($id),
                'dataChiTietSanPham' => $this->chitietsanphamModel->getChiTietSanPhamByIdSanPham($id)
            ]);
        }

        public function addhandle()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Collect form data
                $data = [
                    "tenSanPham" => $_POST["name"],
                    "giaSanPham" => $_POST["price"],
                    "moTa" => $_POST["description"],
                    "soLuongTrongKho" => 0,
                    "tt_xoa" => $_POST["tinhtrang"],
                    "idLoaiSanPham" => $_POST["category"]
                ];
                // list chi tiet san pham
                $variants = isset($_POST['variants']) ? $_POST['variants'] : [];
                //hinh anh
                $hinhanh = $_FILES['images']['name'];
                $hinhanh_temp = $_FILES['images']['tmp_name'];
                 // Handle file upload
                $targetDir = './MVC/assets/img/uploads/';
                $hinhanh = uniqid().'_'.$hinhanh;
                $targetFile = $targetDir . $hinhanh;
                $data["img"] = $hinhanh;
                $resultAddProduct = $this->sanphammodel->insert_sanpham($data);
                if($resultAddProduct === false) {
                    echo json_encode(['result'=> false, 'message' => 'Thêm sản phẩm thất bại']);
                } elseif(is_string($resultAddProduct)) {
                    move_uploaded_file($hinhanh_temp, $targetFile);
                    // Insert variants into database
                    $insertId = $this->sanphammodel->getLastId();
                    $lastId = $insertId[0]["idSanPham"];
                    foreach ($variants as $index => $variant) {
                        // Handle file upload for each variant image
                        $variantFileKey = "variants".$index."images";
                        $variantFileExtension = $_FILES[$variantFileKey]["name"];
                        $hinhanh_temp = $_FILES[$variantFileKey]["tmp_name"];
                        $variantUniqueFileName = uniqid() . '_' . $variantFileExtension;
                        $variantTargetFile = $targetDir . $variantUniqueFileName;
                        $data = [
                             "idSanPham" => $lastId,
                             "idMau" => $variant['mau'],
                             "idSize" => $variant['size'],
                             "soLuong"=> 0,
                             "imgPath" => $variantUniqueFileName,
                             "tt_xoa" => 0,
                        ];
                        $result = $this->chitietspmodel->themchitiet($data);
                        move_uploaded_file($hinhanh_temp, $variantTargetFile);
                    }
                    echo json_encode(['result'=> true, 'message' => 'Thêm sản phẩm thành công']);
                    exit();
                } else {
                    echo json_encode(['result'=> false, 'message' => 'Thêm sản phẩm thất bại']);
                }
            } else {
                echo json_encode(['result'=> false,'message'=> 'Không nhận được yêu cầu']);
            }
        }
        public function showFormSua($idSanPham)
        {
            $sanpham = $this->sanphammodel->get_sanpham($idSanPham);
            $dataLoaiSanPham = $this->loaisanphammodel->getAll_loaisanpham();
            $datasize = $this->chitietspmodel->getdatasize();
            $datamau = $this->chitietspmodel->getdatamau();
            $this->view("frontend.masteradmin", [
                "content"=> "sanpham/sua",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "datalsp"=> $dataLoaiSanPham,
                "datasize" => $datasize,
                "datamau" => $datamau,
                "data" =>  $sanpham 
            ]);

        }
        public function editHandle()
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST["idSanPham"];
                $data = [
                    "tenSanPham" => $_POST["name"],
                    "giaSanPham" => $_POST["price"],
                    "moTa" => $_POST["description"],
                    "tt_xoa" => $_POST["tinhtrang"],
                    "idLoaiSanPham" => $_POST["category"]
                ];
                 //hinh anh
                $hinhanh = $_FILES['images']['name'];
                $hinhanh_temp = $_FILES['images']['tmp_name'];
                // Handle file upload
                $targetDir = './MVC/assets/img/uploads/';
                $hinhanh = uniqid().'_'.$hinhanh;
                $targetFile = $targetDir . $hinhanh;
                if($hinhanh != "") {
                    $data["img"] = $hinhanh;
                    move_uploaded_file($hinhanh_temp, $targetFile);
                }
                $resultEditProduct = $this->sanphammodel->update_sanpham($data, $id);
                if ($resultEditProduct === true) { 
                    
                    echo json_encode(['result'=> true,'message'=> 'Sửa sản phẩm thành công']);
                } else {
                    echo json_encode(['result'=> true,'message'=> 'Sủa sản phẩm thất bại']);
                }
            } else {
                echo json_encode(['result'=> false,'message'=> 'Không nhận được yêu cầu']);
            }
        }

        public function xoasanpham($id)
        {
            $searchsanpham = $this->chitietspmodel->search_sanpham($id);
            if(empty($searchsanpham)) {
                echo json_encode(['result'=> false,'message'=> 'Không thể xóa sản phẩm có chi tiết']);
            } else {
                $result = $this->sanphammodel->delete_sanpham($id);
                if($result == true) {
                    echo json_encode(['result'=> true,'message'=> 'Xóa thành công']);
                } else {
                    echo json_encode(['result'=> false,'message'=> 'Xóa thất bại']);
                }
            }
        }

        public function xoachitietsanpham() {
            $id = $_POST['idChitiet'];
            $searchphieunhap = $this->phieunhapmodel->findby_idsanpham($id);
            $searchdonhang = $this->phieunhapmodel->finddonhangby_idsanpham($id);
            if(empty($searchdonhang) && empty($searchphieunhap)) {
                $result = $this->chitietspmodel->xoachitietsanpham($id);
                if($result == true) {
                    echo json_encode(['result'=> true,'message'=> 'Xóa chi tiết sản phẩm thành công']);
                } else {
                    echo json_encode(['result'=> false,'message'=> 'Xóa chi tiết sản phẩm thất bại']);
                }
            } else {
                echo json_encode(['result'=> false,'message'=> 'Khổng thể xóa Chi tiết tồn tại trong 1 hóa đơn nào đó!']);
            }
        }   
    }

   
