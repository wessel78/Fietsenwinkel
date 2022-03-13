<?php 
    session_start();
    require "../../config/database.php";
    require "../../config/config.php";
    require CLASS_FOLDER . "Database.php";
    require CLASS_FOLDER . "BeheerFietsen.php";

    $fiets_id = $_POST['fiets_id'];

    $fietsen = new BeheerFietsen();
    echo $fietsen->removeFiets($fiets_id);

    
?>