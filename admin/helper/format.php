<?php
define("DATE_FORMAT", "d-m-Y");
define("TIME_FORMAT", "s:i:H");
define("DATETIME_FORMAT", "d-m-Y s:i:H");
    class Format{    
        // Hàm định dạng ngày tháng
        function formatDate($date) {
            return date(DATE_FORMAT, strtotime($date));
        }

        // Hàm định dạng thời gian
        function formatTime($time) {
            return date(TIME_FORMAT, strtotime($time));
        }

        // Hàm định dạng ngày giờ
        function formatDatetime($datetime) {
            return date(DATETIME_FORMAT, strtotime($datetime));
        }

        function validation($data) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    }
?>