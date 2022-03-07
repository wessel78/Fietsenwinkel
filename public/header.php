<?php 
    require "../config/config.php";
    require "../config/database.php";
    require "../src/sessions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_FOLDER?>style.css">
    <link rel="stylesheet" href="plugins/sweetalert/swal_checkmark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Fietsenwinkel</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Fietsenwinkel.nl</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <div class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="fietsen.php">Producten</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="winkelwagen.php">Winkelwagen</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="review.php">Reviews</a>
                </li>
                <?php if($_SESSION['login'] == "false"): ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="inlog_pagina.php">Inloggen</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="registreren_pagina.php">Registeren</a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['login'] == "true" && $_SESSION['permission'] == "user"): ?>
                    <li class="nav-item active">
                        <a id="uitloggen-btn" class="nav-link" href="">Uitloggen</a>
                    </li>
                <?php endif;?>
                <?php if ($_SESSION['login'] == "true" && $_SESSION['permission'] == "admin"): ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="beheerDashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item active">
                        <a id="uitloggen-btn" class="nav-link" href="">Uitloggen</a>
                    </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</nav>