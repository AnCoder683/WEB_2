<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản Lý Sản Phẩm</h5>
    </div>

    <div class="px-5">

        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="#!user/add" class="btn btn-danger">Thêm Sản Phẩm Mới
                <i class="fas fa-plus"></i>
            </a>
        </div>

        <table class="table h-50" width="50%" style="border-collapse: collapse;">
            <tr>
                <th>STT</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng trong kho</th>
                <th>Loại sản phẩm</th>
                <th>Tình trạng</th>
                <th>Quản lý</th>
            </tr>
            <?php
                $i = 0;
                foreach ($data as $key => $value) {
                    $i++;
            ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $value['idSanPham']?></td>
                    <td><?php echo $value['tenSanPham']?></td>
                    <td><?php echo $value['moTa']?></td>
                    <td><?php echo $value['giaSanPham']?></td>
                    <td><?php echo $value['soLuongTrongKho']?></td>
                    <td><?php echo $value['tenLoai']?></td>
                    <td><?php echo $value['tt_xoa']?></td>
                    <td>
                        <a href="?action=quanlysanpham&query=sua?id=<?php echo $value['idSanPham']?>">
                        Sửa</a> |
                        <a href="FE/modules/quanlysanpham/xuly.php?query=xoa?id=<?php echo $value['idSanPham']?>">
                        Xóa
                        </a> |
                        <a href="<?php echo BASE_URL?>/chitietsanpham/chitiet/<?php echo $value['idSanPham']?>">
                        Chi tiết
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