<?php
    session_start();

    if ($_SESSION['login'] == "false") {
        header("Location: inlog_pagina.php");
        die();
    }

    require "header.php";
    include "../src/classes/Database.php";
    $db = new Database;
?>

<div class="page-wrapper">
    <div class="swall-wrapper">
        <div class="swal-icon swal-icon--success">
            <span class="swal-icon--success__line swal-icon--success__line--long"></span>
            <span class="swal-icon--success__line swal-icon--success__line--tip"></span>

            <div class="swal-icon--success__ring"></div>
            <div class="swal-icon--success__hide-corners"></div>
        </div>
        <h3>Review is succesvol geplaatst</h3>
    </div>
</div>

<script src="js/beheer/dashboard/reviewSuccess.js"></script>

<?php require "footer.php";
