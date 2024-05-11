<?php
    class Database extends PDO{
        const SERVER = 'localhost';
        const USER = 'root';
        const PASS = '';
        const DB_NAME = 'web2';
        public function connectDatabase()
        {
            $connect = mysqli_connect(self::SERVER, self::USER, self::PASS, self::DB_NAME);
            if(mysqli_connect_errno() === 0){
                return $connect;
            }
            return false;
        }
    }