<?php
try
{   
    include $_SERVER['DOCUMENT_ROOT'] . '/WEB_2/statistics/MODEL/tthongkeconect.php';
    $date = new DateTime('2024-5-1');

    $myArray = [];
    $day     = [];
    for ($i = 0; $i < 31; $i++) {
        $fullDateTime = $date->format('Y-m-d');
        array_push($myArray, thonhke_thunhap_day($fullDateTime));
        array_push($day,strval($i+1));
        $date->modify('+1 day');
        
    }
    //echo (thonhke_thunhap_day($date));
    // Dữ liệu giả lập, trong thực tế bạn có thể lấy dữ liệu từ cơ sở dữ liệu
    $data = [
        'labels' => $day,
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