<div class="container mt-5">
        <div class="row p-0">
            <div class="col-xl-2 col-md-6 col-sm-12">
                <div class="">
                    <a href="#!product" class="nav-link w-100 fs-6 fw-medium custom-pd mb-3">Tất Cả Sản Phẩm</a>

                    <a href="#!product?category_id={{ category._id }}"
                        class="nav-link w-100 fs-6 fw-medium custom-pd mb-3 ng-binding ng-scope"
                        ng-repeat="category in categories">
                        <!-- {{ category.title }} -->
                        <?php 
                            $categoryTitle = [
                                'Áo nam',
                                'Áo nữ',
                                'Phụ kiện'
                            ];
                            foreach($categoryTitle as $value){
                        ?>

                            <a href=""><?php echo $value . '<br>';?></a>
                        <?php
                            }                   
                        ?>
                    </a>
                </div>
            </div>

            <div class="col-xl-10 col-sm-12">
                <div class="custom-dash pb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="fs-4 fw-bold">
                            <!-- {{ categoryName }} -->
                            <?php echo 'Tất cả sản phẩm'?>
                        </h1>

                        <!-- {{ $routeParams.category_id }} -->
                        <a href=""><?php echo 'Xem tất cả >>'?></a>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-5 justify-content-start my-4">
                    <span class="d-block">Sắp Xếp Theo</span>
                    <select name="sort" id="sort" class="form-select" style="width: 300px;" ng-model="selectedSortType"
                        ng-change="applyFiltersAndSort()">

                        <option <?php if(isset($_POST['sortType']) && $_POST['sortType'] == 'idSanPham Asc') echo "selected = 'selected'"?> value="idSanPham Asc">Sản Phẩm Mới Nhất</option>

                        <option <?php if(isset($_POST['sortType']) && $_POST['sortType'] == 'tenSanPham Asc') echo "selected = 'selected'"?> value="tenSanPham Asc">Tên A - Z</option>

                        <option <?php if(isset($_POST['sortType']) && $_POST['sortType'] == 'tenSanPham Desc') echo "selected = 'selected'"?> value="tenSanPham Desc">Tên Z - A</option>

                        <option <?php if(isset($_POST['sortType']) && $_POST['sortType'] == 'giaSanPham Desc') echo "selected = 'selected'"?> value="giaSanPham Desc">Giá Cao - Thấp</option>

                        <option <?php if(isset($_POST['sortType']) && $_POST['sortType'] == 'giaSanPham Asc') echo "selected = 'selected'"?> value="giaSanPham Asc">Giá Thấp - Cao</option>
                    </select>
                </div>
            <div id="ketqua"></div>
                <div class="row mt-3 row-gap-4">
                    <?php
                        foreach($data as $value){
                    ?>
                    <div class="col-xl-2 col-md-4 col-6" ng-repeat="product in displayedProducts">

                    
                        <div class="card position-relative custom-card-hover">
                            <a data-idsanpham="<?php echo $value['idSanPham']?>" class="nav-link p-2 showChiTiet-js">
                                <img src="<?php echo BASE_ASSETS ?>/img copy/product/<?php echo $value['img']?>.webp" class="img-fluid card-img-top"
                                    style="height: 240px !important;object-fit: cover;">
                            </a>
                            <div class="card-body p-2">
                                <a data-idsanpham="<?php echo $value['idSanPham']?>" class="nav-link fs-7 showChiTiet-js">
                                    <?php echo $value['tenSanPham'] ?>
                                </a>

                                <div class="d-flex align-items-center justify-content-start gap-2">
                                    <p class="text-danger fw-bold mb-0">
                                    <?php echo $value['giaSanPham'] ?>đ
                                    </p>
                                    <p class="mb-0 fs-8 text-decoration-line-through">
                                    <?php echo '20000' ?>đ
                                    </p>
                                </div>
                            </div>


                            <button class="btn btn-danger w-50 mb-2 ms-1" data-bs-toggle="modal"
                                data-bs-target="#showDetail" ng-click="showDetail(product)">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
                            <span class="badge text-bg-danger position-absolute p-2" ng-if="product.sale > 0">
                                    <?php echo '20%' ?>
                            </span>
                        </div>

                    </div>
                    <?php           
                        }
                    ?>
                </div>

                <div class="text-center mt-5">
                    <button ng-if="displayedProducts.length < products.length" ng-click="loadMore()"
                        class="btn btn-danger">
                        Xem thêm
                        <i class="fas fa-chevron-down"></i>
                    </button>

                </div>

                <div class="row mt-3 row-gap-4" ng-show="loadingProduct">
                    
                    <div class="col-6 col-md-4 col-xl-2" ng-repeat="n in [].constructor(12) track by $index">
                        <div class="card" aria-hidden="true">
                            <img src="https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg"
                                class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <a class="btn btn-danger disabled placeholder col-6" aria-disabled="true"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://localhost/BEW/MVC/ajax/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(function(){
        $('#searchBtn').on('click', function(){
                search();   
            });

            $('#find').on('keypress', function(e){
                if (e.which === 13) { // Kiểm tra nếu phím được nhấn là phím "Enter"
                    search();
                }
            });

            $('#sort').on('change', function(){
                search();
            });

            function search() {
                let find = $('#find').val();
                let changeVal = $('#sort').val();

                $.post("http://localhost/BEW/Sanpham/timkiemSanpham", {
                    sortType: changeVal, 
                    findSanPham: find
                }, function(data){
                    $('.body').html(data); // Sử dụng đối số data để cập nhật nội dung của phần tử có id là "ketqua"
                });
            }
        });
        $('.showChiTiet-js').click(function() {
            let idsanpham = $(this).data('idsanpham');
            $.post("http://localhost/BEW/Sanpham/showChiTietSanPham", {
                id: idsanpham
            }, (data)=>{
                $('.body').html(data);
            })
        });
    </script>