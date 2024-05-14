<p>Thêm chi tiết sản phẩm</p>
<?php
    $sql_lietke_mausp = 'SELECT * FROM mau ORDER BY idmau desc';
    $result_mausp = $conn->query($sql_lietke_mausp);
    $sql_lietke_sizesp = 'SELECT * FROM size ORDER BY idsize desc';
    $result_sizesp = $conn->query($sql_lietke_sizesp);
    $id = $_GET['id'];
?>
<form method="POST" action="FE/modules/chitietsanpham/xuly.php?id=<?php echo $id?>" enctype="multipart/form-data">
    <table border="1" width="50%" style="border-collapse: collapse;">
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
                <select name="size">
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
            <td>Số lượng</td>
            <td><input type="number" name="soluong" value="0"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanh" id="">
            </td>
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
        <tr>
            <td colspan="2"><input type="submit" name="themchitietsanpham" value="Thêm chi tiết sản phẩm"></td>
        </tr>
    </table>
</form>