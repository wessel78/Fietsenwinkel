<?php
    session_start();
    require "../../config/database.php";
    require "../../config/config.php";
    require CLASS_FOLDER . "Database.php";
    require CLASS_FOLDER . "BeheerFietsen.php";

    $product_id = $_POST['product-id'];

    $beheerFietsen = new BeheerFietsen();
    echo json_encode($beheerFietsen->getFietsenEdit());
