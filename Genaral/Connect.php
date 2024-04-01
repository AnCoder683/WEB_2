<?php
   define('ServerName', 'localhost');
   define('DatabaseName', 'jaja');
   define('user', 'root');
   define('passWord', '');
   
   try{
      $connection = new PDO('mysql:host='.ServerName.';dbname='.DatabaseName,user ,passWord);
      echo '<script>alert("Welcome")</script>';
   }catch(PDOException $e){
      echo '<script>alert("Connect Fail: ' . $e->getMessage() . '")</script>';
   }

?>