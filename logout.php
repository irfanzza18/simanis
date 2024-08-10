<?php
session_start();

if(isset($_POST['logout_btn'])){

    // die('logout');
    session_destroy();
    unset($_SESSION['username']);
    
    header('Location: login.php');
}

?>