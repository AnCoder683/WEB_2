<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Chi tiết sản phẩm</h5>
    </div>

    <div class="px-5">

        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="#!user/add" class="btn btn-danger">Thêm Chi Tiết Mới
                <i class="fas fa-plus"></i>
            </a>
        </div>

        <table class="table" width="50%" style="border-collapse: collapse;">
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
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $value['idSanPham']?></td>
                <td><?php echo $value['tenSanPham']?></td>
                <td><?php echo $value['moTa']?></td>
                <td><?php echo $value['giaSanPham']?></td>
                <td><?php echo $value['tenLoai']?></td>
                <td><?php echo $value['tenMau']?></td>
                <td><?php echo $value['tenSize']?></td>
                <td><img src="<?php echo BASE_ASSETS?>/img/uploads/<?php echo $value['detailImgPath']?>" 
                alt="Ảnh sản phẩm" width="100" height="100"> </td>
                <td><?php echo $value['tt_xoa']?></td>
                <td>
                    <a href="?action=chitietsanpham&query=sua&id=<?php echo $value['idchitiet']?>">
                    Sửa</a> |
                    <a href="FE/modules/chitietsanpham/xuly.php?id=<?php echo $value['idSanPham']?>">
                    Xóa
                    </a>
                </td>
            </tr>
            <?php
                }
            ?>
</table>

        <div class="w-100 d-flex align-items-center justify-content-center mt-3">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-danger">

                    <li ng-repeat="page in pages" class="page-item" ng-class="{active: page === currentPage}">
                        <a href="" class="page-link" ng-click="setCurrentPage(page)">{{ page }}</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>