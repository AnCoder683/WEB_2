<?php 
include "session.php";
$session = new Session();
$session::start();
// session_start();
if($session :: exist('username')){
    $user = $session::get('username');
}
else{
    $user = '';
}

?>