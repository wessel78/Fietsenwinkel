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
       <div class="fietsen-edit-content-wrapper">
            <div class="fiets-edit-page-title">
                <h1>Fiets toevoegen</h1>
            </div>
            <form id="add-fiets-form">
                <div class="edit-img-wrapper">
                <div class="mb-3">
                        <label for="formFile" class="form-label">Upload een foto</label>
                        <input class="form-control" type="file" name="fietsImage" id="formFile">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Titel van Product</label>
                    <input type="email" class="form-control" name="fietsTitle" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title of product">
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Omschrijving van Product</label>
                    <textarea class="form-control" name="fietsDescription" rows="7"></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Kleur van Product</label>
                    <input type="email" class="form-control" name="fietsColor" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Color of product">
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Prijs van Product</label>
                    <input type="email" class="form-control" name="fietsPrice" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Price of product">
                </div>
                <button id="save-fiets-btn" class="btn btn-secondary">Opslaan</button>
            </form>
       </div>
    </div>
</div>

<script src="js/beheer/dashboard/addFietsen.js"></script>

<?php require "footer.php";?>