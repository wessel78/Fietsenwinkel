<?php 
    session_start();
    $_SESSION['login'] = "false";
    header("Location: ../../public/index.php");
?>