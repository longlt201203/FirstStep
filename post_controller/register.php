<?php
$username = $_POST["username"] ?? "";
$email = $_POST["email"] ?? "";
$pass = $_POST["pass"] ?? "";
$fname = $_POST["fname"] ?? "";
$lname = $_POST["lname"] ?? "";
$phone = $_POST["phone"] ?? "";
$address = $_POST["address"] ?? "";
if (account_register(
    $username,
    $pass,
    $fname,
    $lname,
    $email,
    $phone,
    $address
)) {
    $return_message = '<h6 class="text-success">Register successfully!</h6>';
} else {
    $return_message = '<h6 class="text-danger">Register failed!</h6>';
}