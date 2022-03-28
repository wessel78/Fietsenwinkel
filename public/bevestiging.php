<?php
session_start();
require "../src/functions/sendEmail.php";

if ($_SESSION['login'] == "false") {
  header("Location: inlog_pagina.php");
  die();
}

sendEmail($_SESSION['email']);

require "header.php";
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>

<div class="page-wrapper">

<h1>BEDANKT VOOR JE BESTELLING</h1>

<?php require "footer.php"; ?>