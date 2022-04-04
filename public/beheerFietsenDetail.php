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
                    <label for="exampleInputEmail1">Kleur van de fiets</label>
                    <select class="form-select" name="bikeColor" aria-label="Default select example">
                        <?php 
                            $product_color = $db->db_getData("SELECT * FROM product_color");
                            foreach($product_color as $color) {
                                echo "<option value='$color[color_id]'>$color[color_name]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Frame grote</label>
                    <select class="form-select" name="bikeFrame" aria-label="Default select example">
                        <option selected>Frame grote</option>
                        <?php
                            $product_frame = $db->db_getData("SELECT * FROM product_frame");
                            foreach ($product_frame as $frame) {
                                echo "<option value='$frame[frame_id]'>$frame[frame_size]</option>";
                            }
                        ?>

                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Wiel grote</label>
                    <select class="form-select" name="bikeWheel" aria-label="Default select example">
                        <?php 
                            $product_wheel = $db->db_getData("SELECT * FROM product_wheel");
                            foreach ($product_wheel as $wheel) {
                                echo "<option value='$wheel[wheel_id]'>$wheel[wheel_size]</option>";
                            }

                        ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Is de fiets elektrisch</label>
                    <select class="form-select" name="bikeElectric" aria-label="Default select example">
                        <option selected>Is de fiets elektrisch</option>
                        <option value="ja">Ja</option>
                        <option selected value="nee">Nee</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Prijs van het product</label>
                    <input type="email" class="form-control" name="fietsPrice" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Prijs van het product">
                </div>
                <button id="save-fiets-btn" class="btn btn-secondary">Opslaan</button>
            </form>
       </div>
    </div>
</div>

<script src="js/beheer/dashboard/addFietsen.js"></script>

<?php require "footer.php";?>