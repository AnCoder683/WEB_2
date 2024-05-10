<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản lý Phiếu Nhập</h4>
    </div>
    <div class="px-5">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="<?php echo BASE_URL?>/loaisanpham/themloaisanpham" class="btn btn-danger">Thêm loại sản phẩm
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <table class="table table-striped" width="50%" style="border-collapse: collapse;">
            <tr>    
                <th>STT</th>
                <th>Id</th>
                <th>Tổng tiền nhập</th>
                <th>Phí vận chuyển</th>
                <th>Thành tiền</th>
                <th>Nhà cung cấp</th>
                <th>Người nhập</th>
            </tr>
            <?php
                $i = 0;
                foreach ($data as $key => $value) {
                    $i++;
            ?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $value['idDonNhap']?></td>
                <td><?php echo $value['tongTienNhap']?></td>
                <td><?php echo $value['phiVanChuyen']?></td>
                <td><?php echo $value['thanhTien']?></td>
                <td><?php echo $value['tenNhaCungCap']?></td>
                <td><?php echo $value['tenNhanVien']?></td>
                <td>
                    <a href="/<?php echo $value['idLoaiSanPham']?>">
                    <img src="<?php echo BASE_URL ?>/MVC/assets/img/edit.png" alt="Sửa"></a> |
                    <a href="/<?php echo $value['idLoaiSanPham']?>">
                        <img name="xoaloaisanpham" src="<?php echo BASE_URL ?>/MVC/assets/img/delete.png" alt="Xóa">
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