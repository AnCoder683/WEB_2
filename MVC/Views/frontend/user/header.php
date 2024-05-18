<section class="header shadow-sm header-pc">
    <div class="top_bar py-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-8 d-flex align-items-center">
                    <ul class="navbar-nav d-flex flex-row gap-5">
                        <li class="nav-item text-white ">
                            <i class="fa-solid fa-envelope"></i>
                            <a class="nav-link d-inline" href="mailto:admin@tokyolife.vn">admin@tokyolife.vn</a>
                        </li>
                    </ul>
                </div>

                <div class="col-xl-6 col-md-4 d-none d-md-flex justify-content-end align-items-center">
                    <ul class="navbar-nav  d-flex flex-row flex-wrap fs-5 gap-3 text-white">
                        <li><i class="fab fa-facebook"></i></li>
                        <li><i class="fab fa-youtube"></i></li>
                        <li><i class="fab fa-instagram"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div id="header-sticky" class="w-100" sticky-scroll>
        <div class="header_middle py-3 bg-menu-custom">
            <div class="container">
                <div class="row align-items-center">
                    <a href="<?= BASE_URL?>/sanpham/showsanpham" class="col-3">
                        <img src="<?php echo BASE_ASSETS ?>/img copy/icon/logo.svg" class="img-fluid" />
                    </a>
                    <div ng-controller="SearchController" class="col-6 position-relative">
                        <div class="form-search container-fluid position-relative">
                            <input id="find" name="findSanPham" value="<?php if(isset($_POST['findSanPham'])){echo $_POST['findSanPham'];}?>" type="text" class="form-control search-box" ng-model="searchText"
                                placeholder="Tìm Kiếm Sản Phẩm . . ." ng-change="search()">

                            <button id="searchBtn" type="submit" class="btn btn-danger position-absolute top-0 end-0">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>

                        <!-- <div class="search-result position-absolute bottom--1 z-2 rounded-3 border shadow-sm bg-white w-100"
                            ng-show="searchText && searchResults.length > 0"> -->
                            <!-- Hiển thị kết quả tìm kiếm -->
                            <!-- <table class="table table-striped mb-0">
                                <tbody>
                                    <tr ng-repeat="product in searchResults">
                                        <td>
                                            <img src="{{ product.images[0] }}" class="img-fluid" width="30px" />
                                        </td>
                                        <td>
                                            {{ product.title }}
                                        </td>
                                        <td>
                                            <a href="#!detail/{{ product._id }}" class="nav-link">Xem Chi Tiết</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> -->

                        <!-- <div class="search-result position-absolute bottom--1 z-2 rounded-3 border shadow-sm bg-white w-100"
                            ng-show="searchText && searchResults.length == 0">
                            <div class="text-center p-3">
                                Không tìm thấy sản phẩm
                            </div>
                        </div> -->
                    </div>
                    


                    <div class="group-icon col-3 d-flex align-items-center justify-content-end gap-4">
                        <div class="position-relative">
                            <!-- sửa lại -->
                            <div class="cart-js" data-idkhachhang="<?php echo isset($_SESSION['user']['idKhachHang'])?$_SESSION['user']['idKhachHang']:'';?>" href="">
                                <img src="<?php echo BASE_ASSETS ?>/img copy/icon/icon-cart.svg" class="img-fluid icon-size-custom" />
                            </div>
                        </div>

                        <div class="icon-tracking">
                            <div href="#!lookup">
                                <img src="<?php echo BASE_ASSETS ?>/img copy/icon/icon-tracking.svg" class="img-fluid icon-size-custom" />
                            </div>
                        </div>
                        <?php if(!isset($_SESSION['user'])) {?>
                        <div class="dropdown" ng-show="!isLogin">
                            <div class="cursor-pointer dropdown-toggle d-flex align-items-center gap-1" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo BASE_ASSETS ?>/img copy/icon/icon-user.svg" class="img-fluid icon-size-custom" />
                                <span>Tài Khoản</span>
                            </div>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= BASE_URL?>/signup/showsignup">Đăng Ký</a></li>
                                <li><a class="dropdown-item" href="<?= BASE_URL?>/login/showlogin">Đăng Nhập</a></li>
                                <li><a class="dropdown-item" href="<?= BASE_URL?>/admin/">Trang Quản Trị</a></li>
                            </ul>
                        </div>
                        <?php }else {?>
                        <div class="dropdown" ng-show="isLogin">
                            <div class="cursor-pointer dropdown-toggle d-flex align-items-center gap-1" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo BASE_ASSETS ?>/img copy/icon/icon-user.svg" class="img-fluid icon-size-custom" />
                                <span ><?= $_SESSION["user"]["ten"]?></span>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= BASE_URL?>/user/information">Thông Tin Cá Nhân</a></li>
                                <li><a class="dropdown-item" href="#!profile/order">Đơn Hàng Của Tôi</a></li>
                                <li><a href="#!/profile/wishlist" class="dropdown-item">Sản Phẩm Yêu Thích</a></li>
                                <li><a class="dropdown-item" href="<?= BASE_URL?>/login/logout">Đăng Xuất</a></li>
                            </ul>
                        </div>
                        <?php }?>
                    </div>

                </div>
            </div>
        </div>

        <div class="menu fs-6 fw-medium py-1">
            <ul class="navbar-nav d-flex flex-row align-items-center justify-content-center gap-5">
                <li class="nav-item">
                    <a href="#!" class="nav-link">Trang Chủ</a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">Giới Thiệu</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Sản Phẩm
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#!product">Tất Cả Sản Phẩm</a></li>
                        <li ng-repeat="category in categories">
                            <a class="dropdown-item" href="#!product?category_id={{ category._id }}">{{
                                category.title
                                }}</a>
                        </li>
                    </ul>

                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">Cửa Hàng</a>
                </li>

                <li class="nav-item">
                    <a href="contact.html" class="nav-link">Liên Hệ</a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">Tuyển Dụng</a>
                </li>

                <li class="nav-item">
                    <a href="news.html" class="nav-link">Tin Tức</a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="header-mobile bg-menu-custom">
    <div class="p-3">
        <div class="row align-items-center justify-content-between">
            <div class="col-6">
                <img src="./src/assets/img/icon/logo.svg" class="img-fluid">
            </div>

            <div class="col-6 text-end">
                <span class="" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="fa-solid fa-bars fs-3"></i>
                </span>
            </div>
            <div class="collapse" id="collapseExample">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giới Thiệu</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Sản Phẩm
                        </a>
                        <ul class="dropdown-menu">
                            <li ng-repeat="category in categories">
                                <a class="dropdown-item" href="#">{{ category.name }}</a>
                            </li>
                            <li><a class="dropdown-item" href="products.html">Tất Cả Sản Phẩm</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Cửa Hàng</a>
                    </li>

                    <li class="nav-item">
                        <a href="contact.html" class="nav-link">Liên hệ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link">Tuyển Dụng</a>
                    </li>

                    <li class="nav-item">
                        <a href="news.html" class="nav-link">Tin Tức</a>
                    </li>
                </ul>
                <form class="position-relative" role="search">
                    <input class="form-control me-2" type="search" placeholder="Tìm Kiếm . . ." aria-label="Search">
                    <button class="btn btn-danger position-absolute end-0 top-0" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                <div class="mt-3">
                    <a href="login.html" class="btn btn-outline-danger">Đăng Nhập</a>
                    <a href="register.html" class="btn btn-danger">Đăng Ký</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="http://localhost/WEB_2/MVC/ajax/jquery-3.7.1.min.js"></script>

<script>
     $(document).ready(function(){
        $('.cart-js').on('click', function(){
                if(document.querySelector('.cart-js').dataset.idkhachhang !== ''){

                    showCart();   
                }
            });
            function showCart() {
                let getIdKhachHang = document.querySelector('.cart-js').dataset.idkhachhang;
               
                $.post("http://localhost/WEB_2/cart/showCart", {
                    idKhachHang: getIdKhachHang,
                }, function(data){
                    $('.body').html(data);
                });
            }
        });
</script>

<script>
</script>