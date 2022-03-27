<?php
function go_back() {
    global $APP;
    header("Location: ".($_SERVER["HTTP_REFERER"] ?? $APP["home-url"]));
}

$REQUEST_URI = $_SERVER["REQUEST_URI"];
$REAL_URI = uri_remove_all_parameters(str_replace($APP["home-url"],"",$REQUEST_URI));
if (strcmp($REAL_URI,"/") == 0) {
    $REAL_URI = "/index.php";
}
$PAGE_URI = "view".$REAL_URI;
include "get_controller".$REAL_URI;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "post_controller" . $REAL_URI;
}