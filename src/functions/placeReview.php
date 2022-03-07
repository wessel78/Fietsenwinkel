<?php 
    session_start();
    require "../../config/database.php";
    require "../../config/config.php";
    require CLASS_FOLDER . "Database.php";
    require CLASS_FOLDER . "Review.php";

    $review = new Review;
    echo $review->placeReview();
?>