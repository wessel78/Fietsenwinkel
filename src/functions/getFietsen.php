<?php
session_start();
require "../../config/database.php";
require "../../config/config.php";
require CLASS_FOLDER . "Database.php";
require CLASS_FOLDER . "BeheerFietsen.php";

$fiets_kleur = $_POST['fiets-color']; 
$fiets_frame = $_POST['fiets-frame']; 
$fiets_wiel = $_POST['fiets-wiel']; 
$fiets_elektrisch = $_POST['fiets_elektrisch']; 

$beheerFietsen = new BeheerFietsen();
echo json_encode($beheerFietsen->getFietsenFilter($fiets_kleur, $fiets_frame, $fiets_wiel, $fiets_elektrisch));
