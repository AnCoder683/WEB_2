<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Thêm Loại Sản Phẩm</h4>
    </div>
    
    <div class="px-5">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="<?php echo BASE_URL?>/loaisanpham/" class="btn btn-danger">DS loại sản phẩm
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <form class="mt-5" method="post" action="<?php echo BASE_URL?>/loaisanpham/them">
            <div class="mb-3">
                <label for="name" class="form-label">Tên Loại Sản Phẩm</label>
                <input type="text" class="form-control" id="name" name="tenLoai">
            </div>
            <button type="submit mt-3" class="btn btn-danger" name="themloaisanpham">Thêm</button>
        </form>
    </div>
    <?php 
        if(isset($_SESSION['success'])){
            // Lấy giá trị của success từ session
            $success = $_SESSION['success'];
            // Sau khi sử dụng giá trị success, bạn có thể xóa nó khỏi session nếu cần
            unset($_SESSION['success']);
            // Sử dụng giá trị của success theo nhu cầu của bạn
            if($success === 'true'){
                echo '<script>showAlert("Thành công!", "success");</script>';
            } else {
                echo '<script>showAlert("Thất bại!", "danger");</script>';
            }
        } 
    ?>
</div>