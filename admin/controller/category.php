<?php
require "../engine/model/category.php";
switch ($_GET["action"]) {
    case "post":
        $id = serialization_random_id(5);
        $category_name = trim($_POST["category_name"]);
        if (!empty($category_name)) {
            $category_description = trim($_POST["category_description"]);
            $image = $_FILES["category_image"];
            if (!empty($image["name"])) {
                $image_link = upload_file($image,$_SERVER["DOCUMENT_ROOT"]."/FirstStep/images/category/",$id.".".strtolower(pathinfo($image["name"],PATHINFO_EXTENSION)),true);
                if ($image_link) {
                    $image_link = str_replace($_SERVER["DOCUMENT_ROOT"],"",$image_link);
                    if (category_post($id,$category_name,$category_description,$image_link)) {
                        echo '<p class="text-success">Post Category successfully!</p>';
                    } else {
                        echo '<p class="text-danger">Some errors occurred when posting category!</p>';
                    }
                } else {
                    echo '<p class="text-danger">Some errors occurred when uploading the image!</p>';
                }
            } else {
                echo '<p class="text-danger">Missing category image!</p>';
            }

        } else {
            echo '<p class="text-danger">Empty category name!</p>';
        }
        break;
    case "delete":
        $category_id = trim($_POST["category_id"]);
        if (!empty($category_id)) {
            if (category_delete($category_id)) {
                echo '<p class="text-success">Delete category successfully!</p>';
            } else {
                echo '<p class="text-danger">Some errors occurred when deleting the category!</p>';
            }
        }
        break;
    case "edit":
        $id = trim($_POST["edit_category_id"]);
        if (!empty($id)) {
            $old_category = category_select($id);
            if (sizeof($old_category) > 0 && $old_category = array_pop($old_category)) {
                $name = trim($_POST["edit_category_name"]);
                if (empty($name)) {
                    $name = $old_category["name"];
                }
                $description = trim($_POST["edit_category_description"]);
                if(empty($description)) {
                    $description = $old_category["description"];
                }
                $image_link = "";
                $image = $_FILES["edit_category_image"];
                if (!empty($image["name"])) {
                    $image_link = upload_file($image,$_SERVER["DOCUMENT_ROOT"]."/FirstStep/images/category/",$id.".".strtolower(pathinfo($image["name"],PATHINFO_EXTENSION)),true);
                    if (!$image_link) {
                        $image_link = "";
                        echo '<p class="text-danger">Some errors occurred when uploading the image!</p>';
                    }
                }
                if (empty($image_link)) {
                    $image_link = $old_category["image"];
                }
                $image_link = str_replace($_SERVER["DOCUMENT_ROOT"],"",$image_link);
                if (category_update($id,$name,$description,$image_link)) {
                    echo '<p class="text-success">Update category successfully!</p>';
                } else {
                    echo '<p class="text-danger">Some errors occurred when updating the category!</p>';
                }
            } else {
                echo '<p class="text-danger">Can\'t find the category you are searching for!</p>';
            }
        }
        break;
    default:
        header("Location ./");
        break;
}