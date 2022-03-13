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
            <div class="fiets-content-wrapper">

            </div>
        <div class="add-fietsen-card">
            <i class="fa-solid fa-circle-plus"></i>
        </div>
    </div>
</div>

<script src="js/beheer/dashboard/linkToFietsen.js"></script>
<script src="js/beheer/dashboard/getFietsenBeheerDashboard.js"></script>

<?php require "footer.php";?>