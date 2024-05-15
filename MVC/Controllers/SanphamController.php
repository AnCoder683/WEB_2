<?php
    class SanphamController extends BaseController{
        private $sanphammodel;
        private $loaisanphammodel;

        private $chitietspmodel;

        public function __construct()
        {
            $this->sanphammodel = $this->model("SanphamModel");
            $this->loaisanphammodel = $this->model("LoaisanphamModel");
            $this->chitietspmodel = $this->model("ChitietsanphamModel");
        }
        public function index(){
            $this->danhsach();
        }
        public function danhsach()
        {
            $data = $this->sanphammodel->listsanpham();
            $this->view("frontend.masteradmin", [
                "content"=> "sanpham/chitiet",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "data" => $data
            ]);
        }

        public function pagination()
        {
            // Số lượng sản phẩm trên mỗi trang
            $per_page = product_per_page; //3
            // Xác định trang hiện tại
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1; //2
            // Tính vị trí bắt đầu của sản phẩm trên trang hiện tại
            $start = ($current_page - 1) * $per_page; //3 
            // Truy vấn lấy dữ liệu sản phẩm cho trang hiện tại
            $result = $this->sanphammodel->paginationData($start, $per_page);
            // Lặp qua kết quả và đưa dữ liệu vào mảng
            $data = $result;
            echo json_encode($data);
        }

        public function totalPage()
        {
            $total= $this->sanphammodel->count_sanpham();
            // Tổng số sản phẩm
            $totalProducts = $total;
            // Số lượng sản phẩm trên mỗi trang
            $per_page = product_per_page;
            // Tính toán số trang
            $totalPages = ceil($totalProducts / $per_page);
            echo json_encode(array('totalPages' => $totalPages));
        }

        public function them()
        {
            $dataLoaiSanPham = $this->loaisanphammodel->getAll_loaisanpham();
            $datasize = $this->chitietspmodel->getdatasize();
            $datamau = $this->chitietspmodel->getdatamau();
            $this->view("frontend.masteradmin", [
                "content"=> "sanpham/them",
                "header"=> "admin/header",
                "sidebar"=> "admin/sidebar",
                "datalsp"=> $dataLoaiSanPham,
                "datasize" => $datasize,
                "datamau" => $datamau,
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
                    $insertId = $resultAddProduct;
                    echo json_encode(['result' => true, 'message' => json_encode($variants)]);
                    die();
                    foreach ($variants as $index => $variant) {
                        // Handle file upload for each variant image
                        $variantFileKey = "variants" . $index . "images";
                        $variantFileExtension = $_FILES[$variantFileKey]["name"];
                        $variantUniqueFileName = uniqid() . '.' . $variantFileExtension;
                        $variantTargetFile = $targetDir . $variantUniqueFileName;
                        
                        if (move_uploaded_file($_FILES[$variantFileKey]["tmp_name"], $variantTargetFile)) {
                            $variantImagePath = $variantTargetFile;
                        } else {
                            echo json_encode(['result' => false, 'message' => 'Failed to upload variant image.']);
                            exit;
                        }
                        $data = [
                             "idSanPham" => $insertId,
                             "idMau" => $variant[$index]['mau'],
                             "idSize" => $variant[$index]['size'],
                             "soLuong"=> 0,
                             "imgPath" => $variantUniqueFileName,
                             "tt_xoa" => 0,
                        ];
                        $result = $this->chitietspmodel->themchitiet($data);
                        if ($result == true) { 
                            echo json_encode(['result' => true, 'message' => 'Thêm chi tiết sản phẩm thành công']);
                        } else {
                            echo json_encode(['result' => true, 'message' => 'Thêm chi tiết sản phẩm thất bại']);
                        }
                    }
                    echo json_encode(['result'=> true, 'message' => 'Thêm sản phẩm thành công']);
                } else {
                    echo json_encode(['result'=> false, 'message' => 'Thêm sản phẩm thất bại']);
                }
            } else {
                echo json_encode(['result'=> false,'message'=> 'Không nhận được yêu cầu']);
            }
        }
        protected function handle_insertVariants($variants, $idSanPham) 
        {
            // Insert variants into database
            $targetDir = "./MVC/assets/img/uploads/";

            
        }
    }

   