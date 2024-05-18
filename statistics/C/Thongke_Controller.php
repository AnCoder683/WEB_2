<?php   
include $_SERVER['DOCUMENT_ROOT'] . '/WEB_2/statistics/MODEL/tthongkeconect.php';
// $userData = "tiền";

// // Dữ liệu hệ thống
// $systemData = "tỷ lệ";

// // Kết hợp dữ liệu thành một mảng
// $data = array(
//     'userData' => $userData,
//     'systemData' => $systemData
// );

// // Trả về dữ liệu dưới dạng JSON
// header('Content-Type: application/json');
// echo json_encode($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") 
 {
        // Lấy giá trị của tham số functionName
        $functionName = $_POST['functionName'];
        $month = $_POST['data'];
        // Dùng switch-case để xác định hàm cần gọi dựa trên giá trị của tham số
        switch ($functionName) {
            case 'load_info_butt':
                load_info_butt($month);
                break;
            case 'load_month_income':
                load_month_income($month);
                break;
            // Thêm các case khác nếu cần
            default:
                // Nếu không có case nào phù hợp, có thể xử lý hoặc gửi thông báo lỗi
                echo "Invalid function name!";
        }
    }


//load_info_butt();



function load_info_butt($month)
{       try
        {       $tien= thonhke_doanhthu_thang($month);
                $tien2= thonhke_doanhthu_thang($month-1);
// Kết hợp dữ liệu thành một mảng
                
                $DoanhthuData = $tien ;
// Dữ liệu hệ thống
                $Doanhthutyle = "%";
                if ($tien2 != 0)
                { $Doanhthutyle = round($tien/$tien2*100);
                        if ($Doanhthutyle>100)
                        $Doanhthutyle ="Tăng " .$Doanhthutyle ."%";
                        else
                        $Doanhthutyle ="Giảm " .$Doanhthutyle ."%";
                }
                
                $data = array(
                'DoanhthuData' => $DoanhthuData,
                'Doanhthutyle' => $Doanhthutyle 
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
        }
        catch (Exception $e)
        {       
        
                
        }
        
}


function load_month_income($month)
{       try
        {      
             $tien= thonhke_doanhthu_thang($month);
// Kết hợp dữ liệu thành một mảng
                
                $DoanhthuData = $tien;
// Dữ liệu hệ thống
                    $Doanhthutyle =0;
                
                $data = array(
                'DoanhthuData' => $DoanhthuData,
                'Doanhthutyle' => $Doanhthutyle 
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
        }
        catch (Exception $e)
        {       
        
                
        }
        
}


?>