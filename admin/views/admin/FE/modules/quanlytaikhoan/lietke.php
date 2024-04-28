<p>Liệt kê tài khoản</p>
<?php
    $sql_lietke_tk = 'SELECT * FROM nhanvien nv
    LEFT JOIN  taikhoan tk ON nv.idNhanVien = tk.tenDangNhap
    LEFT JOIN quyen q ON q.idQuyen = tk.iqQuyen
    ';
    $result = $conn -> query($sql_lietke_tk);
?>
<form method="POST" action="FE/modules/quanlytaikhoan/xuly.php">
    <table class="table">
        <tr>
            <th>STT</th>
            <th>Mã tài khoản</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Loại tài khoản</th>
            <th>Quyền</th>
            <th>Tình trạng</th>
            <th>Tác vụ</th>
        </tr>
        <tr>
        <?php
            $i = 0;
            while($row = mysqli_fetch_array($result)) {
                $i++;
            
        ?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row['maTK']?></td>
                <td><?php echo $row['tenDangNhap']?></td>
                <td><?php echo $row['MatKhau']?></td>
                <td><?php echo $row['maTK']?></td>
                <td><?php echo $row['quyen']?></td>
                <td><?php echo $row['tinhTrang']?></td>
                <td>
                    <a href="?action=quanlytaikhoan&query=sua?id=<?php echo $row['maTK']?>">
                    Sửa</a> |
                    <a href="FE/modules/quanlysanpham/xuly.php?query=xoa?id=<?php echo $row['maTK']?>">
                    Xóa
                    </a> |
                    <a href="?action=chitietsanpham&query=lietke&id=<?php echo $row['maTK']?>">
                    Chi tiết
                    </a> 
                </td>
            </tr>
        <?php
            }
        ?>
        </tr>
    </table>
</form>