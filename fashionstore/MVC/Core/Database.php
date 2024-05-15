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
    }