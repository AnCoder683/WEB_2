
<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản Lý Sản Phẩm</h5>
    </div>

    <div class="px-5">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="<?= BASE_URL?>/sanpham/them" class="btn btn-danger">Thêm Sản Phẩm Mới
                <i class="fas fa-plus"></i>
            </a>
        </div>

        <table id="productTable" class="table h-50" width="50%" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Giá sản phẩm</th>
                    <th>Số lượng trong kho</th>
                    <th>Loại sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Tình trạng</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <!-- <?php
                    $i = 0;
                    foreach ($data as $key => $value) {
                        $i++;
                ?>
                    <tr>
                        <td><?= $i?></td>
                        <td><?= $value['idSanPham']?></td>
                        <td><?= $value['tenSanPham']?></td>
                        <td><?= $value['moTa']?></td>
                        <td><?= $value['giaSanPham']?></td>
                        <td><?= $value['soLuongTrongKho']?></td>
                        <td><?= $value['tenLoai']?></td>
                        <td><img src="<?= BASE_ASSETS?>/img/uploads/<?= $value['img']?>" alt="Hình ảnh sản phẩm" width="80" height="120"></td>
                        <td><?= $value['tt_xoa']?></td>
                        <td>
                            <a href="?action=quanlysanpham&query=sua?id=<?= $value['idSanPham']?>">
                            Sửa</a> |
                            <a href="FE/modules/quanlysanpham/xuly.php?query=xoa?id=<?= $value['idSanPham']?>">
                            Xóa
                            </a> |
                            <a href="<?= BASE_URL?>/chitietsanpham/chitiet/<?= $value['idSanPham']?>">
                            Chi tiết
                            </a> 
                        </td>
                    </tr>
                <?php
                    }
                ?>   -->
            </tbody>
        </table>

        <div class=" w-100 d-flex align-items-center justify-content-center mt-3">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-danger">
                    <li class="page-item">
                        <a href="" class="page-link">{{ page }}</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<script>
    $('body').on('click', '.btnDelete', function(e){
        e.preventDefault();
        const productRow = $(this).closest('tr');
        $.ajax({
        url: BASE_URL + '/sanpham/xoasanpham/' + product.idSanPham,
        success: function(response) {
            response = JSON.parse(response);
            if(response['result'] == true) {
                productRow.remove();
                showAlert(response['message'], 'success');
            } else {
                showAlert(response['message'], 'danger')
            }
            // Remove the product row from the table
            
        },
        error: function(xhr, status, error) {
            // Display error message
            alert('Error deleting product: ' + error);
        }
    });
    });
</script>
