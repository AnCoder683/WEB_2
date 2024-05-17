<p>Sửa chi tiết sản phẩm</p>
<?php
    //Load dữ liệu từ các bảng chỉ mục màu và size
    $sql_lietke_mausp = 'SELECT * FROM mau ORDER BY idmau desc';
    $result_mausp = $conn->query($sql_lietke_mausp);
    $sql_lietke_sizesp = 'SELECT * FROM size ORDER BY idsize desc';
    $result_sizesp = $conn->query($sql_lietke_sizesp);
    //Xử lý chi tiết sản phẩm
    $idchitiet = $_GET['id'];
    $sql_chitiet_sp = "SELECT * FROM chitietsanpham WHERE idchitietsanpham = '$idchitiet' LIMIT 1";
    $result_chitiet = $conn->query($sql_chitiet_sp);
    $row_chitiet = mysqli_fetch_array($result_chitiet);
?>
<form method="POST" action="FE/modules/chitietsanpham/xuly.php?id=<?php echo $id?>" enctype="multipart/form-data">
    <table class="table" width="50%" style="border-collapse: collapse;">
        <tr>
            <th>Điền chi tiết sản phẩm</th>
        </tr>
        <tr>
            <td>Màu sản phẩm</td>
            <td>
                <select name="mau">
                    <option value="0">
                        Chọn màu sản phẩm
                    </option>
                    <?php
                        while($row = mysqli_fetch_array($result_mausp)) {
                            $selected = ($row['idMau'] == $row_chitiet['idMau']) ? 'selected' : '';
                    ?>
                            <option value="<?php echo $row['idMau']?>" <?php echo $selected?>>
                                <?php echo $row['tenMau']?>
                            </option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Size</td>
            <td>
                <select name="size">
                    <option value="0">
                        Chọn size sản phẩm
                    </option>
                    <?php
                        while($row = mysqli_fetch_array($result_sizesp)) {
                            $selected = ($row['idSize'] == $row_chitiet['idSize']) ? 'selected' : '';
                            
                    ?>
                            <option value="<?php echo $row['idSize']?>" <?php echo $selected?>>
                                <?php echo $row['tenSize']?>
                            </option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="number" name="soluong" value="<?php echo $row_chitiet['soLuong']?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanh">
                <img src="FE/img/uploads/<?php echo $row_chitiet['imgPath'];?>" width="100px" height="100px">
            </td>
        </tr>
        <tr>
            <td>Tình trạng: </td>
            <td>
                <?php 
                    if($row_chitiet['tt_xoa']) {
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
            <td colspan="2"><input type="submit" name="suachitietsanpham" value="Sửa chi tiết sản phẩm"></td>
        </tr>
    </table>
</form>