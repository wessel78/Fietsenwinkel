<?php 
    session_start();
    require "../../config/database.php";
    require "../../config/config.php";
    require CLASS_FOLDER . "Database.php";
    require CLASS_FOLDER . "BeheerFietsen.php";

    $beheerFietsen = new BeheerFietsen();
    echo $beheerFietsen->addFiets();

?>