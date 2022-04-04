<?php
session_start();
require "header.php";
include "../src/classes/Database.php";

$database = new Database;

?>

<div class="page-wrapper">
    <div class="page-content-wrapper">
        <div class="fietsen-content-wrapper">
            <div class="filter-wrapper">
                <div class="filter-title">
                    <h3>Filter fietsen</h3>
                </div>
                <div class="filter-content-wrapper">
                    <form id="filter-form" method="POST">
                        <div class="filter-form">
                            <p>Fiets kleur</p>
                            <select class="filter-input" id="fiets-color" name="fiets-color">
                                <option selected value="all">alle</option>
                                <?php 
                                    $product_color = $database->db_getData("SELECT * FROM product_color");
                                    foreach($product_color as $color) {
                                        echo "<option value='$color[color_id]'>$color[color_name]</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="filter-option">
                            <p>Fiets frame maat</p>
                            <select class="filter-input" id="fiets-frame" name="fiets-frame">
                                <option selected value="all">alle</option>
                                <?php
                                    $product_frame = $database->db_getData("SELECT * FROM product_frame");
                                    foreach ($product_frame as $frame) {
                                        echo "<option value='$frame[frame_id]'>$frame[frame_size]</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="filter-option">
                            <p>Fiets wiel maat</p>
                            <select class="filter-input" id="fiets-wiel" name="fiets-wiel">
                                <option selected value="all">alle</option>
                                <?php 
                                    $product_wheel = $database->db_getData("SELECT * FROM product_wheel");
                                    foreach ($product_wheel as $wheel) {
                                        echo "<option value='$wheel[wheel_id]'>$wheel[wheel_size]</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="filter-option">
                            <p>Elektrische fiets</p>
                            <select class="filter-input" id="filter_elektrisch" name="fiets_elektrisch">
                                <option selected value="all">alle</option>
                                <option value="1">Ja</option>
                                <option value="0">Nee</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="fietsen-wrapper">
                
            </div>
        </div>
    </div>
</div>

<script src="js/klant/getFietsen.js"></script>

<?php require "footer.php"; ?>