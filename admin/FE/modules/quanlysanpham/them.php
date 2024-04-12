
<p>Thêm sản phẩm</p>
<?php 
    $sql_lietke_loaisp = 'SELECT * FROM loaisanpham ORDER BY idloaisanpham desc';
    $result_loaisp = $conn->query($sql_lietke_loaisp);
    $sql_lietke_mausp = 'SELECT * FROM mau ORDER BY idmau desc';
    $result_mausp = $conn->query($sql_lietke_mausp);
    $sql_lietke_sizesp = 'SELECT * FROM size ORDER BY idsize desc';
    $result_sizesp = $conn->query($sql_lietke_sizesp);
    $arr_chitietsp = [];
?>
<form method="POST" action="FE/modules/quanlysanpham/xuly.php">
    <table border="1" width="50%" style="border-collapse: collapse;">
        <tr>
            <th>Điền sản phẩm</th>
        </tr>
        <tr>
            <td>Tên sản phẩm: </td>
            <td><input type="text" name="tensanpham"></td>
        </tr>
        <tr>
            <td>Giá sản phẩm: </td>
            <td><input type="text" name="giasanpham"></td>
        </tr>
        <tr>
            <td>Số lượng: </td>
            <td><input type="text" name="soluongtrongkho" value="0"></td>
        </tr>
        <tr>
            <td>Mô tả sản phẩm: </td>
            <td><textarea name="mota" cols="30" rows="10" style="resize: none;"></textarea> </td>
        </tr>
        <tr>
            <td>Loại sản phẩm</td>
            <td><select name="loaisanpham">
                <option value="0">
                    Chọn loại sản phẩm
                </option>
            <?php
                while($row = mysqli_fetch_array($result_loaisp)) {
            ?>
                    <option  value="<?php echo $row['idLoaiSanPham']?>">
                        <?php echo $row['tenLoai']?>
                    </option>
            <?php
                }
            ?>
            </select></td>
        </tr>
        <tr>
            <td>Tình trạng: </td>
            <td>
                <select name="tinhtrang">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <th>Chi tiết sản phẩm</th>
        <tr>
            <td>Màu sản phẩm</td>
            <td>
                <select name="" id="">
                    <option value="0">
                        Chọn màu sản phẩm
                    </option>
                    <?php
                        while($row = mysqli_fetch_array($result_mausp)) {
                    ?>
                            <option value="<?php echo $row['idMau']?>">
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
                <select name="" id="">
                    <option value="0">
                        Chọn size sản phẩm
                    </option>
                    <?php
                        while($row = mysqli_fetch_array($result_sizesp)) {
                    ?>
                            <option value="<?php echo $row['idSize']?>">
                                <?php echo $row['tenSize']?>
                            </option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="" id="">
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
        </tr>
    </table>
</form>