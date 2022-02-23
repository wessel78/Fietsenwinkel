<?php
    if(!isset($_SESSION['login']))
    {
        $_SESSION['login'] = "false";
    }

    if(!isset($_SESSION['permission']))
    {
        $_SESSION['permission'] = false;
    }

    if(!isset($_SESSION['incorectLogin']))
    {
        $_SESSION['incorectLogin'] = "false";
    }


?>