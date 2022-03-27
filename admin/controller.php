<?php
require "../config/app_info.php";
require "../engine/processor/serialization.php";
require "../engine/processor/basic_mysql.php";
require "../engine/processor/file_uploader.php";
require "../engine/processor/db_connection.php";
require "view/head.php";
require "controller/".$_GET["from_form"].".php";
echo '<a href="./">Go back</a>';
require "view/footer.php";