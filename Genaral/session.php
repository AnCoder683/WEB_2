<?php 
class Session{
    public static function start(){
        session_start();
    }

    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }

    public static function get($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function exist($key){
        return isset($_SESSION[$key]);
    }

    public static function delete($key){
        if (isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }

    public static function destroy(){
        $_SESSION = array();
        session_destroy();
    }
}
?>