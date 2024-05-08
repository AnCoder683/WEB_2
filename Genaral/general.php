<?php 
include "session.php";
$session = new Session();
$session::start();
if($session :: exist('username')){
    $user = $session::get('username');
}
else{
    $user = '';
}

?>