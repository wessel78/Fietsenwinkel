<?php
    session_start();
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
            <div class="edit-img-wrapper">
                <img src="img/no-image-found.webp" alt="Afbeelding niet gevonden">
               <div class="mb-3">
                    <label for="formFile" class="form-label">Upload een foto</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="exampleInputEmail1">Title of the product</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title of product">
            </div>
            <div class="form-group mb-4">
                <label for="exampleInputEmail1">Color of the product</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Color of product">
            </div>
            <div class="form-group mb-4">
                <label for="exampleInputEmail1">Price of the product</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Price of product">
            </div>
            <button class="btn btn-secondary">Opslaan</button>
       </div>
    </div>
</div>

<?php require "footer.php";?>