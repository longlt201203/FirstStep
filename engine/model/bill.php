<?php
function bill_select_all() {
    global $dbc;
    return basic_mysql_select($dbc,"bill",array(),array(),"order_day");
}

function bill_select(string $id) {
    global $dbc;
    if ($result = basic_mysql_select($dbc,"bill",array(),array(
        "id='".$id."'"
    ))) {
        return array_pop($result);
    }
    return false;
}

function bill_get_content(string $id) {
    global $dbc;
    return basic_mysql_select($dbc,"bill_content",array(),array(
        "bill_id='".$id."'"
    ));
}

function bill_insert(
    string $id,
    string $payment_method,
    float $tax,
    string $address,
    int $discount,
    int $shipping_cost,
    int $total,
    string $account_username
) {
    global $dbc;
    return basic_mysql_insert($dbc,"bill",array(
        $id,
        $payment_method,
        $tax,
        $address,
        $discount,
        $shipping_cost,
        $total,
        $account_username,
        date("Y-m-d H:i:s"),
        "WAITING"
    ));
}

function bill_add_item(string $id, string $product_id, int $quantity) {
    global $dbc;
    return basic_mysql_insert($dbc,"bill_content",array($id,$product_id,$quantity));
}

function bill_delete(string $id) {
    global $dbc;
    return basic_mysql_delete($dbc,"bill",array(
        "id='".$id."'"
    ));
}

function bill_update(string $id, string $address, string $payment_method, string $status) {
    global $dbc;
    return basic_mysql_update($dbc,"bill",array("address","payment_method","status"),array($address,$payment_method,$status),array(
        "id='".$id."'"
    ));
}