<p>Liệt kê loại sản phẩm</p>
<table class="table" width="50%" style="border-collapse: collapse;">
    <tr>    
        <th>STT</th>
        <th>Id</th>
        <th>Tên loại sản phẩm</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
    </tr>
<?php
    $i = 0;
    foreach ($data as $key => $value) {
        $i++;
?>
    <tr>
        <td><?php echo $i?></td>
        <td><?php echo $value['idLoaiSanPham']?></td>
        <td><?php echo $value['tenLoai']?></td>
        <td><?php echo $value['tt_xoa']?></td>
        <td>
            <a href="/<?php echo $value['idLoaiSanPham']?>">
            <img src="<?php echo BASE_URL ?>/MVC/assets/img/edit.png" alt="Sửa"></a> |
            <a href="/<?php echo $value['idLoaiSanPham']?>">
                <img name="xoaloaisanpham" src="<?php echo BASE_URL ?>/MVC/assets/img/delete.png" alt="Xóa">
            </a>
        </td>
    </tr>
<?php
}
?>
</table>