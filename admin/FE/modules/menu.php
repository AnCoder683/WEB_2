<div class="menu">
    <ul class="list_menu">
        <!-- <li><img src="FE/img/side-menu.jpg" alt="ảnh"></li> -->
        <li><a href="index.php"">Trang chủ</a></li>
        <li><a href="index.php?action=quanlysanpham&query=them">Quản lý Sản phẩm</a></li>
        <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
        <li><a href="index.php?action=quanlydonhang">Quản lý đơn hàng</a></li>
        <li><a href="index.php?action=quanlydonhang">Quản lý nhập hàng</a></li>
        <li><a href="index.php?action=quanlydonhang">Quản lý kho</a></li>
        <li><a href="index.php?action=quanlybaiviet">Quản lý danh mục bài viết</a></li>
        <li><a href="index.php?action=quanlykhachhang">Quản lý Khách hàng</a></li>
        <li><a href="#">Đăng xuất</a></li>
    </ul>
    
</div>
<script>
        // Lấy menu và vị trí hiện tại của cuộn trang
    var menu = document.querySelector('.menu');
    var scrollPosition = window.scrollY;

    // Kiểm tra khi nào người dùng cuộn trang
    window.addEventListener('scroll', function() {
        // Lấy vị trí mới của cuộn trang
        scrollPosition = window.scrollY;

        // Kiểm tra xem người dùng đã cuộn xuống đủ xa để menu dính cứng hay chưa
        if (scrollPosition > 50) {
            // Nếu đã đủ xa, thêm lớp 'fixed-menu' cho menu
            menu.classList.add('fixed-menu');
        } else {
            // Nếu chưa đủ xa, loại bỏ lớp 'fixed-menu'
            menu.classList.remove('fixed-menu');
        }
    });
</script>