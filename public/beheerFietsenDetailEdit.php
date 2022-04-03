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
    require "../src/classes/BeheerFietsen.php";

    $product_id = $_GET['fiets_id'];

    $beheerFietsen = new BeheerFietsen();
    $product_information = $beheerFietsen->getFietsenEdit($product_id);    
?>

<div class="page-wrapper">
    <div class="page-content-wrapper">
       <div class="fietsen-edit-content-wrapper">
            <div class="fiets-edit-page-title">
                <h1>Fiets bewerken</h1>
            </div>
            <form id="edit-fiets-form">
                 <div class="edit-img-wrapper">
                    <img src="img/fiets_img/<?php echo $product_information[0]['product_image']?>" alt="Afbeelding niet gevonden">
                <div class="mb-3">
                        <label for="formFile" class="form-label">Upload een foto</label>
                        <input class="form-control" name="fietsImage" type="file" id="formFile">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Titel van Product</label>
                    <input type="email" name="fietsTitle" value="<?php echo $product_information[0]['product_title']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title of product">
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Omschrijven van Product</label>
                    <textarea class="form-control" name="fietsDescription" rows="7"><?php echo $product_information[0]['product_description'] ?></textarea>
                </div>
               <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Kleur van de fiets</label>
                    <select class="form-select" name="bikeColor" aria-label="Default select example">
                        <?php 
                            $product_color = $db->db_getData("SELECT * FROM product_color");
                            foreach($product_color as $color) {
                                if($product_information[0]['product_color'] == $color['color_id'])
                                {
                                    echo "<option selected value='$color[color_id]'>$color[color_name]</option>";
                                }
                                else
                                {
                                    echo "<option value='$color[color_id]'>$color[color_name]</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Frame grote</label>
                    <select class="form-select" name="bikeFrame" aria-label="Default select example">
                        <?php
                            $product_frame = $db->db_getData("SELECT * FROM product_frame");
                            foreach ($product_frame as $frame) {
                                if($product_information[0]['product_frame'] == $frame['frame_id']) 
                                {
                                    echo "<option selected value='$frame[frame_id]'>$frame[frame_size]</option>";
                                }
                                else
                                {
                                    echo "<option value='$frame[frame_id]'>$frame[frame_size]</option>";
                                }
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
                                if($product_information[0]['product_wheel'] == $wheel['wheel_id'])
                                {
                                    echo "<option selected value='$wheel[wheel_id]'>$wheel[wheel_size]</option>";
                                }
                                else
                                {
                                    echo "<option value='$wheel[wheel_id]'>$wheel[wheel_size]</option>";
                                }
                            }

                        ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Is de fiets elektrisch</label>
                    <select class="form-select" name="bikeElectric" aria-label="Default select example">
                        <?php
                            if($product_information[0]['bike_electric'] == 1)
                            {
                                echo "<option selected value='1'>Ja</option>";
                                echo "<option value='0'>Nee</option>";
                            }
                            else
                            {
                                echo "<option value='1'>Ja</option>";
                                echo "<option selected value='0'>Nee</option>";
                            }
                        ?>
                        
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Price of the product</label>
                    <input type="email" name="fietsPrice" value="<?php echo $product_information[0]['product_price']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Price of product">
                </div>
                <button id="save-fiets-btn" class="btn btn-secondary">Opslaan</button>
                <button id="remove-fiets-btn" class="btn btn-secondary">Verwijder fiets</button>
            </form>
       </div>
    </div>
</div>

<script>
    const xhr = new XMLHttpRequest();
    const save_fiets_btn = document.querySelector('#save-fiets-btn');
    const remove_fiets_btn = document.querySelector('#remove-fiets-btn');
    const fiets_id = <?php echo $_GET['fiets_id'] ?>

    save_fiets_btn.addEventListener('click', (e) => {
        const fiets_form = document.querySelector('#edit-fiets-form');
        const fiets_form_data = new FormData(fiets_form);
        fiets_form_data.append('product-id', <?php echo $_GET['fiets_id'] ?>);
        e.preventDefault();
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log(this.responseText)
                if(this.responseText.trim() == "success") {
                    window.location.reload();
                }
            }
        }
        xhr.open("POST", "../src/functions/editFiets.php");
        // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(fiets_form_data);
    })

    remove_fiets_btn.addEventListener('click', (e) => {
        e.preventDefault();
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log(this.responseText)
                if(this.responseText.trim() == "success") {
                    window.location.href = "beheerFietsen.php";
                }
            }
        }
        xhr.open("POST", "../src/functions/removeFiets.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(`fiets_id=${fiets_id}`);
    })
</script>

<?php require "footer.php";?>