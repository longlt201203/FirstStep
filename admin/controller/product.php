<?php
require "../engine/model/product.php";
switch ($_GET["action"]) {
    case "post":
        $id = serialization_random_id(10);
        $name = trim($_POST["product_name"]);
        if (!empty($name)) {
            $description = trim($_POST["product_description"]);
            $price = intval(trim($_POST["product_price"]));
            $remain = intval(trim($_POST["product_remain"]));
            $status = trim($_POST["product_status"]);
            $main_img = $_FILES["product_main_image"];
            if (!empty($main_img["name"])) {
                if (!empty($status)) {
                    $main_img_link = upload_file($main_img,$_SERVER["DOCUMENT_ROOT"]."/FirstStep/images/product/",$id.".".strtolower(pathinfo($main_img["name"],PATHINFO_EXTENSION)),true);
                    if ($main_img_link) {
                        $img_links = array();
                        for ($i = 0; $i < intval($_POST["product_img_count"]); $i++) {
                            $img = $_FILES["product_img_links_img_".$i];
                            if (!empty($img["name"])) {
                                $img_link = upload_file($img,$_SERVER["DOCUMENT_ROOT"]."/FirstStep/images/product/",$id.$i.".".strtolower(pathinfo($img["name"],PATHINFO_EXTENSION)),true);
                                if ($img_link) {
                                    $img_links[] = addslashes(str_replace($_SERVER["DOCUMENT_ROOT"],"",$img_link));
                                } else {
                                    echo '<p class="text-danger">Some errors occurred when uploading '.$img["name"].'!</p>';
                                }
                            } else {
                                echo '<p>Missing the image for the '.($i+1).'-st/nd/rd/th image!</p>';
                            }
                        }
                        $main_img_link = str_replace($_SERVER["DOCUMENT_ROOT"],"",$main_img_link);
                        $img_links = addslashes(json_encode($img_links));
                        $brand_id = trim($_POST["product_brand_id"]);
                        if (empty($brand_id)) {
                            $brand_id = "NULL";
                        }
                        if (product_post($id,$name,$description,$main_img_link,$img_links,$price,$remain,$status,$brand_id)) {
                            echo '<p class="text-success">Post product successfully!</p>';
                            $categories = $_POST["product_category"];
                            if (sizeof($categories) > 0) {
                                foreach ($categories as $category) {
                                    if (!empty($category)) {
                                        if (!product_add_category($id,$category)) {
                                            echo '<p class="text-danger">Can\'t add category whose id is '.$category.' to the database!</p>';
                                        }
                                    }
                                }
                            }
                        } else {
                            echo '<p class="text-danger">Some errors occurred when posting the product!</p>';
                        }
                    } else {
                        echo '<p class="text-danger">Some errors occurred when uploading '.$main_img["name"].'!</p>';
                    }
                } else {
                    echo '<p class="text-danger">Empty product status!</p>';
                }
            } else {
                echo '<p>Missing the image for main image!</p>';
            }
        } else {
            echo '<p class="text-danger">Empty product name!</p>';
        }
        break;
    case "delete":
        $product_id = trim($_POST["product_id"]);
        if (!empty($product_id)) {
            if (product_delete($product_id)) {
                echo '<p class="text-success">Delete product successfully!</p>';
            } else {
                echo '<p class="text-danger">Some errors occurred when deleting the product!</p>';
            }
        }
        break;
    case "edit":
        $id = trim($_POST["edit_product_id"]);
        if (!empty($id)) {
            $old_product = product_select($id);
            if (sizeof($old_product) > 0 && $old_product = array_pop($old_product)) {
                $name = trim($_POST["edit_product_name"]);
                if (empty($name)) {
                    $name = $old_product["name"];
                }
                $description = trim($_POST["edit_product_description"]);
                if (empty($description)) {
                    $description = $old_product["description"];
                }
                $price = intval(trim($_POST["edit_product_price"]));
                if ($price < 0) {
                    $price = $old_product["price"];
                }
                $remain = intval(trim($_POST["edit_product_remain"]));
                if ($remain < 0) {
                    $remain = $old_product["remain"];
                }
                $status = trim($_POST["edit_product_status"]);
                if (empty($status)) {
                    $status = $old_product["status"];
                }
                $main_img_link = "";
                $main_img = $_FILES["edit_product_main_image"];
                if (!empty($main_img["name"])) {
                    $main_img_link = upload_file($main_img, $_SERVER["DOCUMENT_ROOT"] . "/FirstStep/images/product/", $id . "." . strtolower(pathinfo($main_img["name"], PATHINFO_EXTENSION)), true);
                    if (!$main_img_link) {
                        $main_img_link = "";
                        echo '<p class="text-danger">Some errors occurred when uploading '.$main_img["name"].'!</p>';
                    }
                }
                if (empty($main_img_link)) {
                    $main_img_link = $old_product["main_img_link"];
                }
                $main_img_link = str_replace($_SERVER["DOCUMENT_ROOT"],"",$main_img_link);
                $img_links = array();
                for ($i = 0; $i < intval($_POST["edit_product_img_count"]); $i++) {
                    $img = $_FILES["edit_product_img_links_img_".$i];
                    if (!empty($img["name"])) {
                        $img_link = upload_file($img,$_SERVER["DOCUMENT_ROOT"]."/FirstStep/images/product/",$id.$i.".".strtolower(pathinfo($img["name"],PATHINFO_EXTENSION)),true);
                        if ($img_link) {
                            $img_links[] = addslashes(str_replace($_SERVER["DOCUMENT_ROOT"],"",$img_link));
                        } else {
                            echo '<p class="text-danger">Some errors occurred when uploading '.$img["name"].'!</p>';
                        }
                    } else {
                        echo '<p>Missing the image for the '.($i+1).'-th/sd/rd image!</p>';
                    }
                }
                if (sizeof($img_links) != 0) {
                    $img_links = json_encode($img_links);
                } else {
                    $img_links = $old_product["img_links"];
                }
                $brand_id = trim($_POST["edit_product_brand_id"]);
                if (empty($brand_id)) {
                    $brand_id = $old_product["brand_id"] ?? "NULL";
                }
                if (product_update(
                    $id,
                    $name,
                    $description,
                    $main_img_link,
                    $img_links,
                    $price,
                    $remain,
                    $status,
                    $brand_id
                )) {
                    echo '<p class="text-success">Update product successfully!</p>';
                } else {
                    echo '<p class="text-danger">Some errors occurred when updating the product!</p>';
                }
                if (isset($_POST["edit_product_category"])) {
                    $product_categories = $_POST["edit_product_category"];
                    if (!in_array("KEEP", $product_categories)) {
                        $old_product_category_ids = product_select_category($id);
                        $old_product_categories = array();
                        foreach ($old_product_category_ids as $old_product_category_id) {
                            $old_product_categories[] = $old_product_category_id["category_id"];
                        }
                        $remove_categories = array_diff(array_diff($product_categories,$old_product_categories),$product_categories);
                        foreach ($remove_categories as $remove_category) {
                            if (!product_remove_category($id,$remove_category)) {
                                echo '<p class="text-danger">Some errors occurred when removing category whose id is '.$remove_category.'!</p>';
                            }
                        }
                        $new_categories = array_diff(array_diff($product_categories,$old_product_categories),$old_product_categories);
                        foreach ($new_categories as $new_category) {
                            if (!product_add_category($id,$new_category)) {
                                echo '<p class="text-danger">Some errors occurred when adding category whose id is '.$new_category.'!</p>';
                            }
                        }
                    }
                } else if (!product_remove_all_category($id)) {
                    echo '<p class="text-danger">Some errors occurred when deleting the product\'s categories!</p>';
                }
            } else {
                echo '<p class="text-danger">Can\'t find the product you are looking for!</p>';
            }
        }
        break;
    default:
        header("Location: ./");
        break;
}