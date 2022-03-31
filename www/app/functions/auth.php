<?php
function connect(): bool{
    if (session_status() === PHP_SESSION_NONE){
        session_start();
        //$_SESSION['connect'] = 1;
    }
    return !empty($_SESSION['connect']);
}
function user_connect(): void {
    if(!connect()){
        header('Location:/log.php');
        exit();
    }
}
?>
