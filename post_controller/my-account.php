<?php
if (isset($_POST["old_pass"])) {
    if (base64_encode($_POST["old_pass"]) == $user["pass"]) {
        if ($_POST["new_pass"] == $_POST["new_pass_confirm"]) {
            if (account_change_password($user["username"],$_POST["new_pass"])) {
                $_SESSION["user"] = account_login($user["username"],$_POST["new_pass"]);
                $return_message = '<h6 class="text-success">Change password successfully!</h6>';
            } else {
                $return_message = '<h6 class="text-danger">Some errors occurred when changing the password!</h6>';
            }
        } else {
            $return_message = '<h6 class="text-danger">Confirm password does not match!</h6>';
        }
    } else {
        $return_message = '<h6 class="text-danger">Incorrect password!</h6>';
    }
} else {
    $fname = $_POST["fname"] ?? "";
    $lname = $_POST["lname"] ?? "";
    $email = $_POST["email"] ?? "";
    $phone = $_POST["phone"] ?? "";
    $address = $_POST["address"] ?? "";
    if (account_update_information(
        $user["username"],
        $fname,
        $lname,
        $email,
        $phone,
        $address
    )) {
        $_SESSION["user"] = account_login($user["username"],base64_decode($user["pass"]));
        $return_message = '<h6 class="text-success">Update information successfully!</h6>';
    } else {
        $return_message = '<h6 class="text-danger">Some errors occurred when updating information!</h6>';
    }
}
$user = $_SESSION["user"];