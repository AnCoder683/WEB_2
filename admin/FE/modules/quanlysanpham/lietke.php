<p>Liệt kê sản phẩm</p>
<?php 
    $sql_lietke_sp = 'SELECT 
    *
FROM 
    sanpham sp
JOIN
	loaisanpham ON loaisanpham.idLoaiSanPham = sp.idLoaiSanPham
ORDER BY 
    sp.idSanPham DESC';
    $result = $conn->query($sql_lietke_sp);
?>
<table class="table" width="50%" style="border-collapse: collapse;">
    <tr>
        <th>STT</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Mô tả</th>
        <th>Giá sản phẩm</th>
        <th>Số lượng trong kho</th>
        <th>Loại sản phẩm</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
    </tr>
<?php
    $i = 0;
    while($row = mysqli_fetch_array($result)) {
        $i++;
?>
    <tr>
        <td><?php echo $i?></td>
        <td><?php echo $row['idSanPham']?></td>
        <td><?php echo $row['tenSanPham']?></td>
        <td><?php echo $row['moTa']?></td>
        <td><?php echo $row['giaSanPham']?></td>
        <td><?php echo $row['soLuongTrongKho']?></td>
        <td><?php echo $row['tenLoai']?></td>
        <td><?php echo $row['tt_xoa']?></td>
        <td>
            <a href="?action=quanlysanpham&query=sua?id=<?php echo $row['idSanPham']?>">
            Sửa</a> |
            <a href="FE/modules/quanlysanpham/xuly.php?query=xoa?id=<?php echo $row['idSanPham']?>">
            Xóa
            </a> |
            <a href="?action=quanlysanpham&query=chitiet&id=<?php echo $row['idSanPham']?>">
            Chi tiết
            </a> 
        </td>
    </tr>
<?php
}
?>
</table>