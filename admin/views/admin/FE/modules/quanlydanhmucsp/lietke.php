<p>Liệt kê loại sản phẩm</p>
<?php 
    $sql_lietke_loaisp = 'SELECT * FROM loaisanpham ORDER BY idloaisanpham desc';
    $result = $conn->query($sql_lietke_loaisp);
?>
<table class="table" width="50%" style="border-collapse: collapse;">
    <tr>    
        <th>STT</th>
        <th>Id</th>
        <th>Tên loại sản phẩm</th>
        <th>Quản lý</th>
    </tr>
<?php
    $i = 0;
    while($row = mysqli_fetch_array($result)) {
        $i++;
?>
    <tr>
        <td><?php echo $i?></td>
        <td><?php echo $row['idLoaiSanPham']?></td>
        <td><?php echo $row['tenLoai']?></td>
        <td>
            <a href="?action=quanlydanhmucsanpham&query=sua&id=<?php echo $row['idLoaiSanPham']?>">
            <img src="FE/img/edit.png" alt="Sửa"></a> |
            <a href="FE/modules/quanlydanhmucsp/xuly.php?id=<?php echo $row['idLoaiSanPham']?>">
                <img name="xoaloaisanpham" src="FE/img/delete.png" alt="Xóa">
            </a>
        </td>
    </tr>
<?php
}
?>
</table>