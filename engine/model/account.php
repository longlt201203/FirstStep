<?php
/**
 * @param string $username
 * @param string $pass
 * @return false|array
 */
function account_login(string $username, string $pass) {
    global $dbc;
    if ($result_set = basic_mysql_select($dbc,"account",array(),array(
        "username='".$username."'",
        "pass='".base64_encode($pass)."'"
    ))) {
        return array_pop($result_set);
    }
    return false;
}

function account_get_wishlist(string $username) {
    global $dbc;
    return basic_mysql_select($dbc,"wishlist",array("product_id"),array(
        "account_username='".$username."'"
    ));
}

function account_get_bills(string $username) {
    global $dbc;
    return basic_mysql_select($dbc,"bill",array(),array(
        "account_username='".$username."'"
    ));
}

/**
 * @param string $username
 * @param string $pass
 * @param string $fname
 * @param string $lname
 * @param string $email
 * @param string $phone
 * @param string $address
 * @return bool
 */
function account_register(
    string $username,
    string $pass,
    string $fname,
    string $lname,
    string $email,
    string $phone,
    string $address
) {
    global $dbc;
    return basic_mysql_insert($dbc,"account",array(
        $username,
        base64_encode($pass),
        $fname,
        $lname,
        $email,
        $phone,
        $address,
        date("Y-m-d H:i:s")
    ));
}

function account_add_wishlist_item($username, $product_id) {
    global $dbc;
    return basic_mysql_insert($dbc,"wishlist",array($product_id,$username));
}

function account_remove_wishlist_item(string $username, string $product_id) {
    global $dbc;
    return basic_mysql_delete($dbc,"wishlist",array(
       "account_username='".$username."'",
       "product_id='".$product_id."'"
    ));
}

function account_remove_wishlist(string $username) {
    global $dbc;
    return basic_mysql_delete($dbc,"wishlist",array(
        "account_username='".$username."'",
    ));
}

function account_select_all() {
    global $dbc;
    return basic_mysql_select($dbc,"account");
}

function account_change_password(string $username, string $new_pass) {
    global $dbc;
    return basic_mysql_update($dbc,"account",array("pass"),array(base64_encode($new_pass)),array(
        "username='".$username."'"
    ));
}

function account_update_information(
    string $username,
    string $fname,
    string $lname,
    string $email,
    string $phone,
    string $address
) {
    global $dbc;
    return basic_mysql_update($dbc,"account",array(
        "fname",
        "lname",
        "email",
        "phone",
        "address"
    ),array(
        $fname,
        $lname,
        $email,
        $phone,
        $address
    ),array(
        "username='".$username."'"
    ));
}