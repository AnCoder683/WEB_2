<?php 
    $id = $_GET['id'];
    $sql_sua_loaisp = "SELECT * FROM loaisanpham WHERE idLoaiSanPham = '$id' LIMIT 1";
    $result = $conn->query($sql_sua_loaisp);
?>
<form method="POST" action="FE/modules/quanlydanhmucsp/xuly.php?id=<?php echo $id?>">
    <table border="1" width="50%" style="border-collapse: collapse;">
        <tr>
            <th>Sửa loại sản phẩm</th>
        </tr>
    <?php
        $i = 0;
        while($row = mysqli_fetch_array($result)) {
            $i++;
    ?>
        <tr>
            <td>Tên loại sản phẩm: </td>
            <td><input type="text" name="tendanhmuc" value="<?php echo $row['tenLoai']?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="sualoaisanpham" value="Sửa loại sản phẩm"></td>
        </tr>
    <?php
        }
    ?>
    </table>
</form>