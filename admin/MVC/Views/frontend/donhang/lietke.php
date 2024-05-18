<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản lý Đơn hàng</h4>
    </div>
    <div class="px-5">
        
        <form id="timkiemdonnhapForm" action="" method="POST">
            <p>Tìm đơn hàng</p>
        </form>
        <table class="mt-5 table table-striped" width="50%" style="border-collapse: collapse;">
            <tr>    
                <th>STT</th>
                <th>Id</th>
                <th>Tổng tiền nhập</th>
                <th>Phí vận chuyển</th>
                <th>Thành tiền</th>
                <th>Tình trạng</th>
                <th>Thao tác</th>
            </tr>
            <?php
                $i = 0;
                $tongTienDonHang = 0;
                
                foreach ($data as $key => $value) {
                    if($value["trangThai"] === "Hoàn thành") {
                        $tongTienDonHang += $value["thanhTien"];
                    }
                    $id = $value["idDonHang"];
                    $i++;
            ?>
            <tr>
                <td><?= $i?></td>
                <td><?= $id?></td>
                <td><?= $value['tongTienHang']?></td>
                <td><?= $value['phiVanChuyen']?></td>
                <td><?= $value['thanhTien']?></td>
                <?php 
                    if($value['trangThai'] === "Chưa xác nhận") {
                        $color = "text-warning";
                    } else if ($value["trangThai"] === "Chờ nhận hàng") {
                        $color = "text-danger";
                    } else if ($value["trangThai"] === "Hoàn thành") {
                        $color = "text-primary";
                    }
                ?>
                <td class="fw-bolder <?= $color?>"><?= $value['trangThai']?></td>
                <td>
                    <a class="btn btn-info " href="<?= BASE_URL?>/phieunhap/xemchitiet/<?= $id?>">Xem chi tiết</a>
                    
                    <?php 
                        if($value['trangThai'] === "Chưa xác nhận") {
                           ?>
                           <a onclick="return textconfirm('Bạn có muốn xóa đơn hàng: <?= $id?>')" class="btn btn-danger" href="<?= BASE_URL?>/phieunhap/update_trangThai/<?= $id?>/'' ">Xóa</a>
                            <a onclick="return textconfirm('Bạn có muốn xác nhận đơn hàng: <?= $id?>')" class="btn btn-warning" href="<?= BASE_URL?>/donhang/update_xacnhan/<?= $id?> ">Xác nhận</a>
                            
                    <?php   
                        }
                    ?>
                    <?php 
                        if($value['trangThai'] === "Chờ nhận hàng") {
                            $status = "Hoàn thành";
                           ?>
                            <a onclick="return textconfirm('Bạn có muốn xác nhận kh đã nhận hàng <?= $id?>')" class="btn btn-primary" href="<?= BASE_URL?>/phieunhap/update_hoanthanh/<?= $id?>">Đã nhận</a>
                    <?php   
                        }
                    ?>
                </td>
            </tr>
            
            <?php
            }
            ?>
            
        </table>
                <p class="border-bottom border-success ">Tổng thu đơn hàng: <?= $tongTienDonHang?></p> 
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