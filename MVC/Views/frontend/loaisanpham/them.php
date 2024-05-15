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
        <form class="mt-5" id="formThemLoaiSanPham">
            <div class="mb-3">
                <label for="name" class="form-label">Tên Loại Sản Phẩm</label>
                <input type="text" class="form-control" id="name" name="tenLoai">
            </div>
            <div class="mb-3">
            <label for="tinhtrang" class="form-label">Tình trạng</label>
                <select class="m-3" name="tinhtrang">
                    <option value="1" selected>Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
            <input type="hidden" name="action" value="themloaisanpham">
            <button type="submit mt-3" class="btn btn-danger" name="themloaisanpham">Thêm</button>
        </form>
    </div>
</div>