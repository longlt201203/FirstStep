<?php
require "../config/app_info.php";
$APP["name"] = $_POST["name"];
$APP["description"] = $_POST["description"];
$APP["home-url"] = $_POST["home-url"];
$APP["database-connection-info"]["database"] = $_POST["database"];
$APP["database-connection-info"]["hostname"] = $_POST["hostname"];
$APP["database-connection-info"]["username"] = $_POST["username"];
$APP["database-connection-info"]["password"] = $_POST["password"];
fwrite(fopen($app_info_file_name,"w"),json_encode($APP));
echo '<p>Edit app information successfully!</p>';