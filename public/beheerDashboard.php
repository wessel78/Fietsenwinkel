<?php
session_start();

if ($_SESSION['login'] == "false") 
{
    header("Location: inlog_pagina.php");
    die();
}

if($_SESSION['permission'] != "admin")
{
    header("Location: inlog_pagina.php");
    die();
}

require "header.php";
include "../src/classes/Database.php";
$db = new Database;
?>

<div class="page-wrapper">
    <div class="page-content-wrapper">

        <!-- Beheer fietsen -->
        <div class="beheer-card-wrapper">
            <div  id="beheer-fiets-btn" class="beheer-card">
                <i class="fa-solid fa-person-biking"></i>
            </div>
            <p>Beheer fietsen</p>
        </div>

        <!-- Beheer reviews -->
        <div class="beheer-card-wrapper">
            <div id="beheer-review-btn" class="beheer-card">
                <i class="fa-solid fa-comment-dots"></i>
            </div>
            <p>Beheer reviews</p>
        </div>
    </div>
</div>

<script src="js/beheer/dashboard/dashboardNavigation.js"></script>

<?php require "footer.php";?>