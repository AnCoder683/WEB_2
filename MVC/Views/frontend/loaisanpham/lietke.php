<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản lý loại Sản Phẩm</h4>
    </div>

    <div class="px-5">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="<?= BASE_URL?>/loaisanpham/themloaisanpham" class="btn btn-danger">Thêm loại sản phẩm
                <i class="fas fa-plus"></i>
            </a>
        </div>

        <table class="table table-striped" width="50%" style="border-collapse: collapse;">
            <tr>    
                <th>STT</th>
                <th>Id</th>
                <th>Tên loại sản phẩm</th>
                <th>Số lượng sản phẩm</th>
                <th>Tình trạng</th>
                <th>Quản lý</th>
            </tr>
            <?php
                $i = 0;
                foreach ($data as $key => $value) {
                    $i++;
            ?>
            <tr>
                <td><?= $i?></td>
                <td><?= $value['idLoaiSanPham']?></td>
                <td><?= $value['tenLoai']?></td>
                <td><?= $value['soLuongSanPham']?></td>
                <td><?= $value['tt_xoa']?></td>
                <td>
                    <a href="<?= BASE_URL?>/loaisanpham/sualoaisanpham/<?= $value['idLoaiSanPham']?>">
                    <img src="<?= BASE_URL ?>/MVC/assets/img/edit.png" alt="Sửa"></a> |
                    <button onclick="xoaLoaiSanPham( '<?= $value['idLoaiSanPham']?>' )" id="xoaLoaiSanPham">
                        <img name="xoaloaisanpham" src="<?= BASE_URL ?>/MVC/assets/img/delete.png" alt="Xóa">
                    </button>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>

        <div class="w-100 d-flex align-items-center justify-content-center mt-3">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-danger">
                    <li class="page-item">
                        <a href="" class="page-link" ng-click="setCurrentPage(page)">{{ page }}</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>