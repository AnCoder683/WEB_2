<?php
    class Session {
        // Phương thức khởi tạo
        public function __construct() {
            session_start();
        }
    
        // Thiết lập giá trị cho một biến phiên
        public static function set($key, $value) {
            $_SESSION[$key] = $value;
        }
    
        // Lấy giá trị của một biến phiên
        public static function get($key) {
            return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
        }
    
        // Xóa một biến phiên
        public static function delete($key) {
            if (isset($_SESSION[$key])) {
                unset($_SESSION[$key]);
            }
        }
    
        // Kiểm tra xem một biến phiên có tồn tại hay không
        public static function exists($key) {
            return isset($_SESSION[$key]);
        }
    
        // Xóa tất cả các biến phiên và kết thúc phiên
        public static function destroy() {
            session_unset();
            session_destroy();
            header("Location:login.php");
        }
    }
?>