<?php
session_start();
$products = array();
if (isset($_SESSION["user"])) {
    foreach (account_get_wishlist($_SESSION["user"]["username"]) as $product_id) {
        $products[] = product_select($product_id["product_id"])[0];
    }
    unset($product_id);
} else {
    header("Location: /FirstStep/login.php");
}