<?php
    class Database{
        const SERVER = 'localhost';
        const USER = 'root';
        const PASS = '';
        const DB_NAME = 'fashionstore';
        public function connectDatabase()
        {
            $connect = mysqli_connect(self::SERVER, self::USER, self::PASS, self::DB_NAME);
            if(mysqli_connect_errno() === 0){
                return $connect;
            }
            return false;
        }

        protected function _query($sql) {
            $result = $this->connectDatabase()->query($sql);
            if ($result === TRUE) {
                return $this->connectDatabase()->insert_id; // Return the last inserted ID for insert queries
            } elseif ($result) {
                return $result; // Return result set object for other queries
            } else {
                throw new Exception("Database query error: " . $this->connectDatabase()->error);
            }
        }
    }