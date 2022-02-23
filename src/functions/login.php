<?php
    session_start();
    require "../../config/database.php";
    require "../../config/config.php";
    require CLASS_FOLDER . "Database.php";
    require CLASS_FOLDER . "Login.php";

    // $username = 

    $login = new Login;
    echo $login->login();
?>