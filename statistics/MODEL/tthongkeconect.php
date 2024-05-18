<?php
function conectcheck ()
{      
    $servername ="localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "fashionstore"; 
    
    
    $conn = new mysqli($servername,$username,$password,$dbname);
    try {
        if ($conn ->connect_error)
    {  
        die("kết nối thất bại :" . $conn->connect_error);
    }
    echo '<script>alert(" da blutoot con net suc sec fuly")</script>';
    
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Connect Fail: ' . $e->getMessage() . '")</script>';
     };
    
}
function thonhke_thunhap_day($date)
{   
    $servername ="localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "fashionstore"; 
    
    
    $conn = new mysqli($servername,$username,$password,$dbname);
    try
    {   
        if (!$conn) { die("Connection failed: " . mysqli_connect_error());   }
        
        $sql = "SELECT * FROM `donhang` WHERE ngayDat = '$date';";
        $result = mysqli_query($conn, $sql);
        $s=0;
        if ($result->num_rows > 0) {
            // Lặp qua mỗi dòng dữ liệu
            
            while($row = $result->fetch_assoc()) {
                // Xử lý dữ liệu ở đây
                $s=$s+$row["thanhTien"];
               // echo "ID: " . $row["idDonHang"] . " - Tổng tiền: " . $row["tongTienHang"] . "<br>";
            }
            return $s;
            
        } else {
            return 0;
        }
            
            
    }

    catch( PDOException $e)
    {
        
    }
}
function thonhke_doanhthu_12thang($date)
{
    $servername ="localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "fashionstore"; 
    $month = $date->format('m');
    $year  = $date->format('Y');
    $month = ltrim($month, '0'); // Loại bỏ số 0 đứng trước nếu có
    $conn = new mysqli($servername,$username,$password,$dbname);
    try     
    {
        if (!$conn) { die("Connection failed: " . mysqli_connect_error());   }
        
        $sql = "SELECT * FROM `donhang` WHERE MONTH(ngayDat) = '$month' and YEAR(ngaydat)='$year';";
        $result = mysqli_query($conn, $sql);
        $s=0;
        if ($result->num_rows > 0) {
            // Lặp qua mỗi dòng dữ liệu
            
            while($row = $result->fetch_assoc()) {
                // Xử lý dữ liệu ở đây
                $s=$s+$row["thanhTien"];
               // echo "ID: " . $row["idDonHang"] . " - Tổng tiền: " . $row["tongTienHang"] . "<br>";
            }
            return $s;
            
        } else {
            return 0;
        }
            
            
    }

    catch( PDOException $e)
    {
        echo ($e);
    }
    

}
function thonhke_doanhthu_thang($month)
{
    $servername ="localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "fashionstore"; 
    
    
    $conn = new mysqli($servername,$username,$password,$dbname);
    try
    {
        if (!$conn) { die("Connection failed: " . mysqli_connect_error());   }
        
        $sql = "SELECT * FROM `donhang` WHERE MONTH(ngayDat) = $month;";
        $result = mysqli_query($conn, $sql);
        $s=0;
        if ($result->num_rows > 0) {
            // Lặp qua mỗi dòng dữ liệu
            
            while($row = $result->fetch_assoc()) {
                // Xử lý dữ liệu ở đây
                $s=$s+$row["thanhTien"];
               // echo "ID: " . $row["idDonHang"] . " - Tổng tiền: " . $row["tongTienHang"] . "<br>";
            }
            return $s;
            
        } else {
            return 0;
        }
            
            
    }

    catch( PDOException $e)
    {

    }
    

}
function list_hoadon()
{   $servername ="localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "fashionstore"; 
    
    
    $conn = new mysqli($servername,$username,$password,$dbname);
    try
    {
        if (!$conn) { die("Connection failed: " . mysqli_connect_error());   }
        
        $sql = "SELECT * FROM `donhang`";
        $result = mysqli_query($conn, $sql);
        $s=0;
        if ($result->num_rows > 0) {
            // Lặp qua mỗi dòng dữ liệu
            
            while($row = $result->fetch_assoc()) {
                // Xử lý dữ liệu ở đây
                $s=$s+$row["tongTienHang"];
               // echo "ID: " . $row["idDonHang"] . " - Tổng tiền: " . $row["tongTienHang"] . "<br>";
            }
            echo $s;
            
        } else {
            echo "Không có dữ liệu.";
        }
    }

    catch( PDOException $e)
    {

    }
}
  ?>



  


