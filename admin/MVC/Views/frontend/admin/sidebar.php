<aside id="sidebar" class="expand shadow-sm border-end">
    <div class="d-flex align-items-center justify-content-between pe-4">
        <button class="toggle-btn" type="button">
            <i class="fa-solid fa-bars"></i>
        </button>
        
        <div class="sidebar-logo">
            <a href="<?php echo BASE_URL?>/admin/dashboard">
                <img src="<?php echo BASE_ASSETS?>/img/logo.svg" class="img-fluid">
            </a>
        </div>
    </div>
    <ul class="sidebar-nav d-flex flex-column gap-3">
        <li id="dashboard" class="sidebar-item">
            <a href="<?php echo BASE_URL?>/admin/dashboard" class="sidebar-link">
                <i class="fa-solid fa-home"></i>
                <span>Trang Chủ</span>
            </a>
        </li>
        <li id="quanlytaikhoan" class="sidebar-item permission">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth"
                aria-expanded="false" aria-controls="auth">
                <i class="fa-solid fa-user-group"></i>
                <span>Người Dùng</span>
            </a>
            <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo BASE_URL?>/Account/danhsach" class="sidebar-link">Quản Lý Người Dùng</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?= BASE_URL?>/account/them" class="sidebar-link">Thêm Người Dùng Mới</a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Quản Trị Viên</a>
                </li>
            </ul>
        </li>

        <li id="quanlydanhmucsanpham" class="sidebar-item permission">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#sidebarcategory"
                aria-expanded="false" aria-controls="sidebarcategory">
                <i class="fa-solid fa-layer-group"></i>
                <span>Danh Mục</span>
            </a>
            <ul id="sidebarcategory" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo BASE_URL?>/loaisanpham" class="sidebar-link">Quản Lý Danh Mục</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_URL?>/loaisanpham/themloaisanpham" class="sidebar-link">Thêm Danh Mục Mới</a>
                </li>
            </ul>
        </li>

        <li id="quanlysanpham" class="sidebar-item permission">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#product"
                aria-expanded="false" aria-controls="product">
                <i class="fa-brands fa-slack"></i>
                <span>Sản Phẩm</span>
            </a>
            <ul id="product" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a onclick="setcurrentpage(sanpham)" href="<?php echo BASE_URL?>/sanpham/danhsach  " class="sidebar-link">Quản Lý Sản Phẩm</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?= BASE_URL?>/sanpham/them" class="sidebar-link">Thêm Sản Phẩm</a>
                </li>
            </ul>
        </li>

        <li id="quanlynhaphang" class="sidebar-item permission">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#nhaphang"
                aria-expanded="false" aria-controls="nhaphang">
                <i class="fa-solid fa-tags"></i>
                <span>Nhập hàng</span>
            </a>
            <ul id="nhaphang" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo BASE_URL?>/phieunhap/danhsach" class="sidebar-link">Danh sách đơn nhập</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_URL?>/phieunhap/add" class="sidebar-link">Thêm đơn nhập</a>
                </li>
            </ul>
        </li>

        <li id="quanlydonhang" class="sidebar-item permission">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#order"
                aria-expanded="false" aria-controls="order">
                <i class="fa-solid fa-money-bills"></i>
                <span>Đơn Hàng</span>
            </a>
            <ul id="order" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?= BASE_URL?>/donhang/xemtatcadonhang" class="sidebar-link">Quản Lý Đơn Hàng</a>
                </li>

            </ul>
        </li>

        <!-- <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#feedback"
                aria-expanded="false" aria-controls="feedback">
                <i class="fa-solid fa-message"></i>
                <span>Phản Hồi</span>
            </a>
            <ul id="feedback" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="#!feedback" class="sidebar-link">Phản Hồi Khách Hàng</a>
                </li>
            </ul>
        </li> -->

        <li id="quanlythongke" class="sidebar-item permission">
            <a href="<?= URL?>/statistics/ThongKe.php" class="sidebar-link">
                <i class="fa-solid fa-chart-simple"></i>
                <span>Thống Kê</span>
            </a>
        </li>

        <li id="phasan" class="sidebar-item permission">
            <a href="<?= URL?>/statistics/phasan.php" class="sidebar-link">
                <i class="fa-solid fa-chart-simple"></i>
                <span>Phá sản</span>
            </a>
        </li>
        <!-- <li class="sidebar-item">
            <a href="" class="sidebar-link">
                <i class="fa-solid fa-envelope"></i>
                <span>Hộp Thư</span>
            </a>
        </li> -->
    </ul>

    <div class="sidebar-footer">
        <a href="<?= BASE_URL?>/auth/logout" class="sidebar-link" onclick="return confirmLogout()">
            <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i>
            <span>Đăng Xuất</span>
        </a>
    </div>
</aside>