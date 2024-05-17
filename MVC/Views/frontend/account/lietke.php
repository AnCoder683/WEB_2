<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản Lý Người Dùng</h5>
    </div>

    <div class="px-5">

        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="#!user/add" class="btn btn-danger">Thêm Người Dùng Mới
                <i class="fas fa-plus"></i>
            </a>
        </div>

        <table class="table table-striped mt-5">
            <thead>
                <th>STT</th>
                <th>Tên Đăng Nhập</th>
                <th>Uỷ Quyền</th>
                <th>Khóa tài khoản</th>
                <th>Thao Tác</th>
            </thead>
            <tbody>
            <?php
                $i = 0;
                foreach ($data as $key => $value) {
                    $i++;
            ?>
                <tr>
                    <td><?php echo $i ?> </td>
                    <td><?php echo $value['tenDangNhap']?></td>
                    <td><?php echo $value['quyen']?></td></td>
                    <td>
                        <?php if ($value['tinhTrang'] === '1'): ?>
                            <label class="switch">
                                <input id="lockaccount" type="checkbox" onclick="blockAccount('<?= $value['tenDangNhap']?>')">
                                <span class="slider round"></span>
                            </label>
                        <?php elseif ($value['tinhTrang'] === '0'): ?>
                            <label class="switch">
                                <input id="lockaccount" type="checkbox" onclick="unlockAccount('<?= $value['tenDangNhap']?>')" checked>
                                <span class="slider round"></span>
                            </label>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="<?= BASE_URL?>/account/sua/<?= $value['tenDangNhap']?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-danger" ng-click="deleteUser(user)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php 
                }
            ?>
            </tbody>
        </table>

        <!-- <div class="w-100 d-flex align-items-center justify-content-center mt-3">
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