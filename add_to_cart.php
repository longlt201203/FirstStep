<?php
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    if (isset($_GET["action"])) {
        switch ($_GET["action"]) {
            case "add":
                if (!isset($_SESSION["cart"])) {
                    $_SESSION["cart"] = array();
                }
                if (isset($_GET["product"]) && !empty($_GET["product"])) {
                    if (!isset($_SESSION["cart"][$_GET["product"]])) {
                        $_SESSION["cart"][$_GET["product"]] = 0;
                    }
                    $_SESSION["cart"][$_GET["product"]] += $_GET["quantity"] ?? 1;
                    echo "Add item successfully!";
                }
                break;
            case "remove":
                if (isset($_SESSION["cart"]) && isset($_GET["product"]) && !empty($_GET["product"])) {
                    unset($_SESSION["cart"][$_GET["product"]]);
                    echo "Remove item successfully!";
                }
                break;
            case "update":
                if (isset($_SESSION["cart"]) && isset($_GET["product"]) && !empty($_GET["product"]) && isset($_GET["quantity"]) && !empty($_GET["quantity"])) {
                    $product_ids = $_GET["product"];
                    $quantities = $_GET["quantity"];
                    if (sizeof($product_ids) == sizeof($quantities)) {
                        for ($i = 0; $i < sizeof($product_ids); $i++) {
                            if (isset($_SESSION["cart"][$product_ids[$i]])) {
                                $_SESSION["cart"][$product_ids[$i]] = $quantities[$i];
                            }
                        }
                        unset($i);
                        echo "Remove item successfully!";
                    }
                    unset($product_ids,$quantities);
                }
                break;
        }
    }
    header("Location: ".($_SERVER["HTTP_REFERER"] ?? "/FirstStep"));
} else {
    header("Location: /FirstStep/login.php");
}