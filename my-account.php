<?php
//error_reporting(0);
require "config/app_info.php";
require "engine/processor/uri_handler.php";
require "engine/processor/serialization.php";
require "engine/processor/db_connection.php";
require "engine/processor/basic_mysql.php";
require "engine/model/category.php";
require "engine/model/product.php";
require "engine/model/account.php";
require "engine/model/bill.php";
require "config/router.php";
require "view/head.php";
require "view/header.php";
require $PAGE_URI;
require "view/footer.php";
