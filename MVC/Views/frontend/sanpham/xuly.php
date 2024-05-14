<?php 
    include('../../../BE/config/config.php');
    $id = $_GET['id'];
    $mau = $_POST['mau'];
    $size = $_POST['size'];
    $soluong = $_POST['soluong'];
//hinh anh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_temp = $_FILES['hinhanh']['tmp_name'];
//sửa tên hình ảnh
    $hinhanh = $id.'_'.$hinhanh;
    $tinhtrang = $_POST['tinhtrang'];
    if(isset($_POST['themchitietsanpham'])){
        //Thêm
        echo "Them";
        // $sql_themchitietsp = "INSERT INTO chitietsanpham(idsanpham, idmau, idsize, soluong, imgpath, tt_xoa) 
        // VALUE ('$id', '$mau', '$size', '$soluong', '$hinhanh', '$tinhtrang')";
        // $conn->query($sql_themchitietsp);
        // move_uploaded_file($hinhanh_temp, '../../img/uploads/'.$hinhanh);
        // header("Location:../../../index.php?action=chitietsanpham&query=lietke&id="."$id");
    }
    elseif(isset($_POST['suachitietsanpham'])){
        //Sửa
        echo "Sua";
        // if($hinhanh != '') {
        //     $sql_sua = "UPDATE chitietsanpham SET idmau ='$mau', idsize = '$size', imgpath = '$hinhanh', tt_xoa = '$tinhtrang'
        //     WHERE idLoaiSanPham = '$id'";
        //     $conn->query($sql_sua);
        // } else {
        //     $sql_sua = "UPDATE chitietsanpham SET idmau ='$mau', idsize = '$size' tt_xoa = '$tinhtrang'
        //     WHERE idLoaiSanPham = '$id'";
        //     $conn->query($sql_sua);
        // }
        // header("Location:../../../index.php?action=chitietsanpham&query=sua&id='$id'");
    }
    // else{
    //     $id = $_GET['id'];
    //     $sql_xoa = "UPDATE chitietsanpham SET tinhTrang WHERE idLoaiSanPham = '$id'";
    //     $conn->query($sql_xoa);
    //     header('Location:../../../index.php?action=quanlydanhmucsanpham&query=them');
    // }
?>