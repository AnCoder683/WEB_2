<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Sửa loại Sản Phẩm</h4>
    </div>
    <div class="px-5">
        <form class="mt-5" action="<?= BASE_URL?>/loaisanpham/xuly/<?= $id?>" method="post">
            <table class="table" width="50%" style="border-collapse: collapse;">
                <tr>    
                    <th>Thông tin</th>
                </tr>
                <?php
                    foreach ($data as $key => $value) {
                ?>
                <tr>
                    <td>Tên loại sản phẩm: </td>
                    <td><input type="text" name="tenLoai" value="<?= $value['tenLoai']?>"></td>
                </tr>
                <tr>
                    <td>Tình trạng: </td>
                    <td>
                        <?php 
                            if($value['tt_xoa']) {
                        ?>      
                                <select name="tinhtrang">
                                    <option value="1" selected>Kích hoạt</option>
                                    <option value="0">Ẩn</option>
                                </select>
                        <?php
                            }else {
                        ?>     
                                <select name="tinhtrang">
                                    <option value="1" >Kích hoạt</option>
                                    <option value="0" selected>Ẩn</option>
                                </select>
                        <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><button type="submit mt-3" class="btn btn-danger" name="sualoaisanpham">Sửa</button></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </form>
    </div>
    <?php 
        if(isset($_SESSION['success'])){
            // Lấy giá trị của success từ session
            $success = $_SESSION['success'];
            // Sau khi sử dụng giá trị success, bạn có thể xóa nó khỏi session nếu cần
            unset($_SESSION['success']);
            // Sử dụng giá trị của success theo nhu cầu của bạn
            if($success === 'true'){
                echo '<script>showAlert("Thành công!", "success");</script>';
            } else {
                echo '<script>showAlert("Thất bại!", "danger");</script>';
            }
        } 
    ?>
</div>