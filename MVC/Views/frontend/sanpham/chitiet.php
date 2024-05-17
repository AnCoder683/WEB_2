<p>Chi tiết sản phẩm</p>
<?php 
    $id = $_GET['id'];
    $sql_lietke_sp = "SELECT 
    sp.idSanPham,
    sp.tenSanPham,
    sp.giaSanPham,
    sp.moTa,
    sp.tt_xoa,
    mau.tenMau,
    loaisanpham.tenLoai,
    size.tenSize,
    chitiet.imgPath AS detailImgPath,
    chitiet.idchitietsanpham AS idchitiet
FROM 
    sanpham sp
JOIN 
    chitietsanpham chitiet ON sp.idSanPham = chitiet.idSanPham
JOIN 
    mau ON chitiet.idMau = mau.idMau
JOIN 
    size ON chitiet.idSize = size.idSize
JOIN
	loaisanpham ON loaisanpham.idLoaiSanPham = sp.idLoaiSanPham
WHERE sp.idSanPham = '$id'
ORDER BY 
    sp.idSanPham DESC";
    $result = $conn->query($sql_lietke_sp);
?>
<table class="table" width="50%" style="border-collapse: collapse;">
    <tr>
        <th>STT</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Mô tả</th>
        <th>Giá sản phẩm</th>
        <th>Loại sản phẩm</th>
        <th>Màu</th>
        <th>Size</th>
        <th>Hình ảnh</th>
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
        <td><?php echo $row['tenLoai']?></td>
        <td><?php echo $row['tenMau']?></td>
        <td><?php echo $row['tenSize']?></td>
        <td><img src="FE/img/uploads/<?php echo $row['detailImgPath']?>" 
        alt="Ảnh sản phẩm" width="100" height="100"> </td>
        <td><?php echo $row['tt_xoa']?></td>
        <td>
            <a href="?action=chitietsanpham&query=sua&id=<?php echo $row['idchitiet']?>">
            Sửa</a> |
            <a href="FE/modules/chitietsanpham/xuly.php?id=<?php echo $row['idSanPham']?>">
            Xóa
            </a>
        </td>
    </tr>
<?php
}
?>
</table>