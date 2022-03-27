<?php
require "config/app_info.php";
require "engine/processor/basic_mysql.php";
require "engine/processor/db_connection.php";
require "engine/model/account.php";
session_start();
if (isset($_SESSION["user"])) {
    if (isset($_GET["action"])) {
        switch ($_GET["action"] && isset($_GET["product"])) {
            case "add":
                account_add_wishlist_item($_SESSION["user"]["username"],$_GET["product"]);
                break;
            case "remove":
                account_remove_wishlist_item($_SESSION["user"]["username"],$_GET["product"]);
                break;
        }
    }
    header("Location: ".$_SERVER["HTTP_REFERER"] ?? "/FirstStep/");
} else {
    header("Location: /FirstStep/login.php");
}