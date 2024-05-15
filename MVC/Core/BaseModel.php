<?php
    class BaseModel extends Database{
        private $connect;
        public function __construct()
        {
            $this->connect = $this->connectDatabase();
            // dòng này để lấy và up dữ liệu tiếng việt
            $this->_query("SET NAMES 'utf8'");
        }
        public function getOrderBy($table, $column, $order, $limit){
            $columnToString = implode(', ', $column);
            $orderToString = implode(' ', $order);
            if($order)
            {
                $sql = "SELECT $columnToString FROM $table ORDER BY $orderToString LIMIT $limit";
            }
            else{
                $sql = "SELECT $columnToString FROM $table LIMIT $limit";
            }
            $query = $this->_query($sql);
            $data = $this->_getArrayData($query);
            return $data;
        }

        public function findById($table, $id){
            $pk = $this->_getPK($table);
            $sql = "SELECT * FROM $table WHERE $pk = '$id'";
            $query = $this->_query($sql);
            return $this->_getArrayData($query);
        }

        public function insert($table, $data){
            $cols = implode(', ', array_keys($data));
            $arrayVal = [];
            foreach($data as $key => $value){
                array_push($arrayVal, "'$value'");
            }
            $vals = implode(', ', $arrayVal);
            $sql = "INSERT INTO $table($cols) VALUES($vals)";
            return $this->_query($sql);
        }
        
        public function update($table, $data, $id){
            $pk = $this->_getPK($table);
            $setArr = [];
            foreach($data as $key => $value){
                array_push($setArr, "$key = '$value'");
            }
            $setArrToString = implode(', ', $setArr);
            $sql = "UPDATE $table SET $setArrToString WHERE $pk = '$id'";
            try {
                $this->_query($sql);
                return true; // Trả về true nếu không có lỗi xảy ra
            } catch (Exception $e) {
                return false; // Trả về false nếu có lỗi xảy ra
            }
        }

        public function delete($table, $id){
            $pk = $this->_getPK($table);
            $sql = "DELETE FROM $table WHERE $pk = '$id'";
            try {
                $this->_query($sql);
                return true; // Trả về true nếu không có lỗi xảy ra
            } catch (Exception $e) {
                return false; // Trả về false nếu có lỗi xảy ra
            }
        }

        protected function _getArrayData($query){
            $data = [];
            while($row = mysqli_fetch_assoc($query)){
                array_push($data, $row);
            }
            return $data;
        }
        // hàm này lấy pk
        protected function _getPK($table){
            $sqlID = "SELECT COLUMN_NAME
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
            WHERE TABLE_NAME = '$table'
            AND CONSTRAINT_NAME = 'PRIMARY'";
    
            $queryGetID = $this->_query($sqlID);
            $arrayPK = [];
            while($row =  mysqli_fetch_assoc($queryGetID)){
                array_push($arrayPK,$row);
            }
            return  $arrayPK[0]["COLUMN_NAME"];
        }
        // hàm này để đẩy query xuống DB
        public function _query($sql){
            return mysqli_query($this->connect, $sql);
        }
        
        public function insert_getlastId($table, $data) {
            $cols = implode(', ', array_keys($data));
            $arrayVal = [];
            foreach($data as $key => $value){
                array_push($arrayVal, "'$value'");
            }
            $vals = implode(', ', $arrayVal);
            $sql = "INSERT INTO $table($cols) VALUES($vals)";
            if ($this->_query($sql)) {
                return strval(mysqli_insert_id($this->connect));
            } else {
                return false;
            }
        }
        private function escapeString($value) {
            return mysqli_real_escape_string($this->connect, $value);
        }
        public function select($sql)
        {
            $query = $this->_query($sql);
            $data = $this->_getArrayData($query);
            return $data;
        }
    }