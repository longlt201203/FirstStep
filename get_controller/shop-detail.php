<?php
$display_product = array();
if (isset($_GET["product"])) {
    $display_product = product_select($_GET["product"])[0];
    if (!$display_product) {
        go_back();
    }
} else {
    go_back();
}