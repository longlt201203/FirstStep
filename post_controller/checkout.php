<?php
if (isset($_SESSION["cart"]) && sizeof($_SESSION["cart"]) > 0) {
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $address = trim($_POST["address"]);
    $payment_method = trim($_POST["payment_method"]);

    $bill_id = serialization_random_id(7);
    $products = array();
    $total = 0;
    foreach (array_keys($_SESSION["cart"]) as $product_id) {
        $product = product_select($product_id)[0];
        $products[] = $product;
        $total += intval($product["price"])/1000*$_SESSION["cart"][$product_id];
    }

    if (bill_insert(
        $bill_id,
        $payment_method,
        0.1,
        $address,
        0,
        0,
        $total*1100,
        $user["username"]
    )) {
        $ok = true;
        foreach ($products as $product) {
            if (!bill_add_item($bill_id,$product["id"],intval($_SESSION["cart"][$product["id"]]))) {
                $ok = false;
                $return_message = '<h6 class="text-danger">Some errors occurred when adding product '.$product["id"].' to your order!</h6>';
                break;
            }
        }
        if ($ok) {
            $return_message = '<h6 class="text-success">Your order is placed!</h6>';
        }
    } else {
        $return_message = '<h6 class="text-danger">Some errors occurred when placing your order!</h6>';
    }
    unset($product,$products,$product_id,$total,$bill_id,$ok,$_SESSION["cart"]);
} else {
    $return_message = '<h6 class="text-danger">You have nothing in your cart!</h6>';
}