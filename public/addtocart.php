<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    array_push($_SESSION['cart'], $product_id);
}

