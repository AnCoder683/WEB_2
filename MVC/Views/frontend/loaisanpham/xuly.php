<?php 
    include('../../../BE/config/config.php');
    $loaisanpham = $_POST['tendanhmuc'];
    if(isset($_POST['themloaisanpham'])){
        //Thêm
        $sql_themloaisp = "INSERT INTO loaisanpham(tenloai) VALUE ('$loaisanpham')";
        $conn->query($sql_themloaisp);
        header('Location:../../../index.php?action=quanlydanhmucsanpham&query=them');
    }
    elseif(isset($_POST['sualoaisanpham'])){
        //Sửa
        $id = $_GET['id'];
        $sql_sua = "UPDATE loaisanpham SET tenLoai ='$loaisanpham' WHERE idLoaiSanPham = '$id'";
        $conn->query($sql_sua);
        header('Location:../../../index.php?action=quanlydanhmucsanpham&query=them');
    }
    else{
        $id = $_GET['id'];
        $sql_xoa = "DELETE FROM loaisanpham WHERE idLoaiSanPham = '$id'";
        $conn->query($sql_xoa);
        header('Location:../../../index.php?action=quanlydanhmucsanpham&query=them');
    }
?>