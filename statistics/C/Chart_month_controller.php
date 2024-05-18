<?php
try
{
    include $_SERVER['DOCUMENT_ROOT'] . '/WEB_2/statistics/MODEL/tthongkeconect.php';
    $date = new DateTime('2024-1-18');
    
    $myArray = [];
    for ($i = 0; $i < 12; $i++) {
        array_push($myArray, thonhke_doanhthu_12thang($date));
        $date->modify('+1 month');
        
    }
    //echo (thonhke_thunhap_day($date));
    // Dữ liệu giả lập, trong thực tế bạn có thể lấy dữ liệu từ cơ sở dữ liệu
    $data = [
        'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July','august','september','October','November','December'],
        'values' => $myArray
    ];
    
    // Trả về dữ liệu dưới dạng JSON
    echo json_encode($data);
}
catch (PDOException $e)
{
 echo($e);
}

?>
