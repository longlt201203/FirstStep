<?php
$brands = brand_select_all();
$products = array();
if (!isset($_GET["category"])) {
    $products = product_select_all();
} else {
    $product_ids = category_select_product($_GET["category"]);
    foreach ($product_ids as $product_id) {
        $products[] = product_select($product_id["product_id"])[0];
    }
}
if (isset($_GET["brand"])) {
    for ($i = 0; $i < sizeof($products); $i++) {
        if ($products[$i]["brand_id"] != $_GET["brand"]) {
            array_splice($products,$i,1);
            $i--;
        }
    }
    unset($i);
}
if (isset($_GET["search"]) && !empty($_GET["search"])) {
    for ($i = 0; $i < sizeof($products); $i++) {
        if (strpos(strtolower($products[$i]["name"]),strtolower($_GET["search"])) === false) {
            array_splice($products,$i,1);
            $i--;
        }
    }
    unset($i);
}
if (isset($_GET["sort"])) {
    switch ($_GET["sort"]) {
        case "NEW":
            for ($i = 0; $i < sizeof($products); $i++) {
                if ($products[$i]["status"] != "NEW") {
                    array_splice($products,$i,1);
                    $i--;
                }
            }
            unset($i);
            break;
        case "SALE":
            for ($i = 0; $i < sizeof($products); $i++) {
                if ($products[$i]["status"] != "SALE") {
                    array_splice($products,$i,1);
                    $i--;
                }
            }
            unset($i);
            break;
        case "ASC_PRICE":
            for ($i = 0; $i < sizeof($products)-1; $i++) {
                for ($j = $i+1; $j < sizeof($products); $j++) {
                    if ($products[$i]["price"] > $products[$j]["price"]) {
                        $tmp = $products[$i];
                        $products[$i] = $products[$j];
                        $products[$j] = $tmp;
                    }
                }
            }
            unset($i,$j,$tmp);
            break;
        case "DESC_PRICE":
            for ($i = 0; $i < sizeof($products)-1; $i++) {
                for ($j = $i+1; $j < sizeof($products); $j++) {
                    if ($products[$i]["price"] < $products[$j]["price"]) {
                        $tmp = $products[$i];
                        $products[$i] = $products[$j];
                        $products[$j] = $tmp;
                    }
                }
            }
            unset($i,$j,$tmp);
            break;
    }
}