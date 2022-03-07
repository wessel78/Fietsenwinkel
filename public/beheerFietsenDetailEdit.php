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
                    <label for="exampleInputEmail1">Title of the product</label>
                    <input type="email" name="fietsTitle" value="<?php echo $product_information[0]['product_title']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title of product">
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Description of the product</label>
                    <textarea class="form-control" name="fietsDescription" rows="7"><?php echo $product_information[0]['product_description'] ?></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Color of the product</label>
                    <input type="email" name="fietsColor" value="<?php echo $product_information[0]['product_color']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Color of product">
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Price of the product</label>
                    <input type="email" name="fietsPrice" value="<?php echo $product_information[0]['product_price']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Price of product">
                </div>
                <button id="save-fiets-btn" class="btn btn-secondary">Opslaan</button>
            </form>
       </div>
    </div>
</div>

<script>
    const xhr = new XMLHttpRequest();
    const place_review_btn = document.querySelector('#save-fiets-btn');

    place_review_btn.addEventListener('click', (e) => {
        const fiets_form = document.querySelector('#edit-fiets-form');
        const fiets_form_data = new FormData(fiets_form);
        fiets_form_data.append('product-id', <?php echo $_GET['fiets_id'] ?>);
        e.preventDefault();
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log(this.responseText)
                if(this.responseText.trim() == "success") {
                    console.log(1)
                    window.location.reload();
                }
            }
        }
        xhr.open("POST", "../src/functions/editFiets.php");
        // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(fiets_form_data);
    })
</script>

<?php require "footer.php";?>