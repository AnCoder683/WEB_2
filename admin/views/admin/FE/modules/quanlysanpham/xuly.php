<?php 
    include('../../../BE/config/config.php');
    $tensanpham = $_POST['tensanpham'];
    $gia = $_POST['giasanpham'];
    $mota = $_POST['mota'];
    $soluong = $_POST['soluongtrongkho'];
    $idloaisp = $_POST['loaisanpham'];
    $tinhtrang = $_POST['tinhtrang'];
    
    if(isset($_POST['themsanpham'])){
        //Thêm
        $sql_themsp = "INSERT INTO sanpham(tensanpham, giasanpham, mota, soluongtrongkho, tt_xoa, idloaisanpham) 
        VALUE ('$tensanpham', '$gia', '$mota', '$soluong', '$tinhtrang', '$idloaisp')";
        $conn->query($sql_themsp);
        header('Location:../../../index.php?action=quanlysanpham&query=them');
    }
    elseif(isset($_POST['suasanpham'])){
        //Sửa
        $id = $_GET['id'];
        $sql_sua = "UPDATE sanpham SET tenLoai ='$loaisanpham' WHERE idLoaiSanPham = '$id'";
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