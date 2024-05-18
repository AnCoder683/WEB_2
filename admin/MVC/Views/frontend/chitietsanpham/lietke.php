<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Chi tiết sản phẩm</h5>
    </div>

    <div class="px-5">

        <!-- <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="#!user/add" class="btn btn-danger">Thêm Chi Tiết Mới
                <i class="fas fa-plus"></i>
            </a>
        </div> -->

        <table class="mt-5 table table-striped" width="50%" style="border-collapse: collapse;">
            <tr>
                <th>STT</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Màu</th>
                <th>Size</th>
                <th>Hình ảnh</th>
                <th>Tình trạng</th>
                <th>Quản lý</th>
            </tr>
            <?php
                $i = 0;
                foreach($data as $key => $value) {
                    $i++;
            ?>
            <tr data-url="<?= BASE_URL?>/sanpham/xoachitietsanpham">
                <td><?= $i?></td>
                <td><?= $value['idSanPham']?></td>
                <td><?= $value['tenSanPham']?></td>
                <td><?= $value['moTa']?></td>
                <td><?= $value['giaSanPham']?></td>
                <td><?= $value['tenLoai']?></td>
                <td><?= $value['tenMau']?></td>
                <td><?= $value['tenSize']?></td>
                <td><img src="<?= BASE_ASSETS?>/img/uploads/<?= $value['detailImgPath']?>" 
                alt="Ảnh sản phẩm" width="100" height="100"></td>
                <td><?= $value['tt_xoa']?></td>
                <td>
                    <!-- <a href="?action=chitietsanpham&query=sua&id=<?= $value['idchitiet']?>">
                    Sửa</a> | -->
                    <a class="btnDeleteChitiet" href="#" data-id="<?= $value['idchitiet']?>">
                    Xóa
                    </a>
                </td>
            </tr>
            <?php
                }
            ?>
</table>
<!-- 
        <div class="w-100 d-flex align-items-center justify-content-center mt-3">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-danger">

                    <li ng-repeat="page in pages" class="page-item" ng-class="{active: page === currentPage}">
                        <a href="" class="page-link" ng-click="setCurrentPage(page)">{{ page }}</a>
                    </li>
                </ul>
            </nav>
        </div> -->
    </div>
</div>
<script>
   $('.btnDeleteChitiet').click(function(e) {
        e.preventDefault(); // Ngăn chuyển trang khi nhấn nút "Xóa"
        // Lấy thẻ <tr> cha của nút "Xóa" đang được nhấn
        var row = $(this).closest('tr');
        // Lấy id của chi tiết sản phẩm cần xóa từ thuộc tính data-id
        var idChitiet = $(this).data('id');
        // Gửi yêu cầu AJAX để xóa chi tiết sản phẩm
        $.ajax({
            url: $(this).closest('tr').data('url'),
            type: 'POST',
            data: {idChitiet: idChitiet},
            success: function(response) {
                // Xử lý kết quả trả về (nếu cần)
                response = JSON.parse(response);
                if(response['result'] == true) {
                    showAlert(response['message'], "success");
                    // Sau khi xóa thành công, loại bỏ dòng khỏi bảng
                    row.remove();
                } else{
                    showAlert(response['message'], "danger");
                }
                console.log(response);
                
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>