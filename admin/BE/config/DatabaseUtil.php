<?php
    class DatabaseUtil {
        private $servername = "localhost";
        private $username = "root"; // Thay bằng tên người dùng cơ sở dữ liệu
        private $password = ""; // Thay bằng mật khẩu của người dùng cơ sở dữ liệu
        private $dbname = "fashionstore"; // Thay bằng tên cơ sở dữ liệu
        private $conn;
        // Phương thức để mở kết nối đến cơ sở dữ liệu
        public function DatabaseUtil() {}
        public function connect() {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                die("Kết nối không thành công: " . $this->conn->connect_error);
            }
            return $this->conn;
        }
        

        // Phương thức để thực thi truy vấn SELECT và trả về kết quả
        public function executeQuery($sql) {
            $result = $this->conn->query($sql);
            return $result;
        }

        // Phương thức để đóng kết nối đến cơ sở dữ liệu
        public function close() {
            $this->conn->close();
        }
    }
?>