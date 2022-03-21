<?php
    session_start();
    require "header.php";
    include "../src/classes/Database.php";
    $db = new Database;
?>

<div class="page-wrapper">
    <form id="login-form" class="form-signin text-center">
        <input type="email" name="userName" id="inputEmail" class="form-control inlog" placeholder="Username" required="" autofocus="" >
        <input type="password" name="password" id="inputPassword" class="form-control inlog" placeholder="Password" required="">
        <button id="login-btn" class="btn btn-lg btn-primary btn-block bg-dark inlog-btn" type="submit">Log in</button>
    </form>
</div>
   
<script src="js/login/login/loginAjax.js"></script>

<?php require "footer.php"; ?>