<?php
function brand_select_all() {
    global $dbc;
    return basic_mysql_select($dbc,"brand");
}

function brand_select(string $id) {
    global $dbc;
    return basic_mysql_select($dbc,"brand",array(),array(
        "id='".$id."'"
    ));
}

function brand_post(string $id, string $name, string $image_link) {
    global $dbc;
    return basic_mysql_insert($dbc,"brand",array($id,$name,$image_link));
}

function brand_delete(string $id) {
    global $dbc;
    return basic_mysql_delete($dbc,"brand",array(
        "id='".$id."'"
    ));
}

function brand_update($id, $name, $image) {
    global $dbc;
    return basic_mysql_update($dbc,"brand",array("name","image"),array($name,$image),array(
        "id='".$id."'"
    ));
}