<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: /FirstStep/login.php");
}
$user = $_SESSION["user"];
$bills = account_get_bills($user["username"]);