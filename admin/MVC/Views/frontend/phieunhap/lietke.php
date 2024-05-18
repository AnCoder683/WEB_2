<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản lý Phiếu Nhập</h4>
    </div>
    <div class="px-5">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="<?= BASE_URL?>/phieunhap/add" class="btn btn-danger">Thêm phiếu nhập
                <i class="fas fa-plus"></i>
            </a>
        </div>
        
        <form id="timkiemdonnhapForm" action="" method="POST">
            <p>Tìm phiếu nhập theo</p>
        </form>
        <table class="mt-5 table table-striped" width="50%" style="border-collapse: collapse;">
            <tr>    
                <th>STT</th>
                <th>Id</th>
                <th>Tổng tiền nhập</th>
                <th>Phí vận chuyển</th>
                <th>Thành tiền</th>
                <th>Nhà cung cấp</th>
                <th>Người nhập</th>
                <th>Tình trạng</th>
                <th>Thao tác</th>
            </tr>
            <?php
                $i = 0;
                $tongTienNhap = 0;
                
                foreach ($data as $key => $value) {
                    if($value["tinhTrang"] === "Hoàn thành") {
                        $tongTienNhap += $value["thanhTien"];
                    }
                    $id = $value["idDonNhap"];
                    $i++;
            ?>
            <tr>
                <td><?= $i?></td>
                <td><?= $id?></td>
                <td><?= $value['tongTienNhap']?></td>
                <td><?= $value['phiVanChuyen']?></td>
                <td><?= $value['thanhTien']?></td>
                <td><?= $value['tenNhaCungCap']?></td>
                <td><?= $value['tenNhanVien']?></td>
                <?php 
                    if($value['tinhTrang'] === "Chờ nhận hàng") {
                        $color = "text-warning";
                    } else if ($value["tinhTrang"] === "Chưa xác nhận") {
                        $color = "text-danger";
                    } else if ($value["tinhTrang"] === "Hoàn thành") {
                        $color = "text-primary";
                    }
                ?>
                <td class="fw-bolder <?= $color?>"><?= $value['tinhTrang']?></td>
                <td>
                    <a class="btn btn-info " href="<?= BASE_URL?>/phieunhap/xemchitiet/<?= $id?>">Xem chi tiết</a>
                    
                    <?php 
                        if($value['tinhTrang'] === "Chưa xác nhận") {
                           ?>
                           <a onclick="return textconfirm('Bạn có muốn xóa đơn nhập: <?= $id?>')" class="btn btn-danger" href="<?= BASE_URL?>/phieunhap/update_tinhtrang/<?= $id?>/'' ">Xóa</a>
                            <a onclick="return textconfirm('Bạn có muốn xác nhận đơn nhập: <?= $id?>')" class="btn btn-warning" href="<?= BASE_URL?>/phieunhap/update_xacnhan/<?= $id?> ">Xác nhận</a>
                            
                    <?php   
                        }
                    ?>
                    <?php 
                        if($value['tinhTrang'] === "Chờ nhận hàng") {
                            $status = "Hoàn thành";
                           ?>
                            <a onclick="return textconfirm('Bạn có muốn xác nhận đã nhận hàng: <?= $id?>')" class="btn btn-primary" href="<?= BASE_URL?>/phieunhap/update_hoanthanh/<?= $id?>">Đã nhận</a>
                    <?php   
                        }
                    ?>
                </td>
            </tr>
            
            <?php
            }
            ?>
            
        </table>
                <p class="border-bottom border-success ">Tổng tiền nhập hàng: <?= $tongTienNhap?></p> 
                

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
<script>
    function findSanPham()
    {
        $.ajax(function(e){
            e.preventDefault();

        })
    }
</script>