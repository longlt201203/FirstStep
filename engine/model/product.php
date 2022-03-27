<?php
function product_select_all() {
    global $dbc;
    return basic_mysql_select($dbc,"product");
}

function product_select(string $id) {
    global $dbc;
    return basic_mysql_select($dbc,"product",array(),array(
        "id='".$id."'"
    ));
}

function product_select_category(string $id) {
    global $dbc;
    return basic_mysql_select($dbc,"category_involve",array("category_id"),array(
        "product_id='".$id."'"
    ));
}

function product_post(
    string $id,
    string $name,
    string $description,
    string $main_img_link,
    string $img_links,
    int $price,
    int $remain,
    string $status,
    string $brand_id
) {
    global $dbc;
    return basic_mysql_insert($dbc,"product",array(
        $id,
        $name,
        $description,
        $main_img_link,
        $img_links,
        $price,
        $remain,
        $status,
        $brand_id
    ));
}

function product_add_category(string $id, string $category) {
    global $dbc;
    return basic_mysql_insert($dbc,"category_involve",array($category,$id));
}

function product_update(
    string $id,
    string $name,
    string $description,
    string $main_img_link,
    string $img_links,
    int $price,
    int $remain,
    string $status,
    string $brand_id
) {
    global $dbc;
    return basic_mysql_update($dbc,"product",array(
        "name",
        "description",
        "main_img_link",
        "img_links",
        "price",
        "remain",
        "status",
        "brand_id"
    ),array(
        $name,
        $description,
        $main_img_link,
        $img_links,
        $price,
        $remain,
        $status,
        $brand_id
    ),array(
        "id='".$id."'"
    ));
}

function product_delete(string $id) {
    global $dbc;
    return basic_mysql_delete($dbc,"product",array(
        "id='".$id."'"
    ));
}

function product_remove_category(string $id, string $category) {
    global $dbc;
    return basic_mysql_delete($dbc,"category_involve",array(
        "product_id='".$id."'",
        "category_id='".$category."'"
    ));
}

function product_remove_all_category(string $id) {
    global $dbc;
    return basic_mysql_delete($dbc,"category_involve",array(
        "product_id='".$id."'",
    ));
}