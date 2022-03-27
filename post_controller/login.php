<?php
$user = account_login($_POST["username"] ?? "",$_POST["pass"] ?? "");
if ($user) {
    $_SESSION["user"] = $user;
    header("Location: /FirstStep/");
} else {
    $return_message = '<h6 class="text-danger">Login failed. Wrong username or password!</h6>';
}