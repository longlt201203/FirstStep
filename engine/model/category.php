<?php
function category_select_all() {
    global $dbc;
    return basic_mysql_select($dbc,"category");
}

function category_select(string $id) {
    global $dbc;
    return basic_mysql_select($dbc,"category",array(),array(
        "id='".$id."'"
    ));
}

function category_select_product(string $id) {
    global $dbc;
    return basic_mysql_select($dbc,"category_involve",array("product_id"),array(
        "category_id='".$id."'"
    ));
}

function category_post(string $id, string $name, string $description, string $image_link) {
    global $dbc;
    return basic_mysql_insert($dbc,"category",array($id,$name,$description,$image_link));
}

function category_delete(string $id) {
    global $dbc;
    return basic_mysql_delete($dbc,"category",array(
        "id='".$id."'"
    ));
}

function category_update(string $id, string $name, string $description, string $image_link) {
    global $dbc;
    return basic_mysql_update($dbc,"category",array("name","description","image"),array($name,$description,$image_link),array(
        "id='".$id."'"
    ));
}