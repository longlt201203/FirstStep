<?php
require "../engine/model/brand.php";
switch ($_GET["action"]) {
    case "post":
        $brand_name = trim($_POST["brand_name"]);
        if (!empty($brand_name)) {
            $brand_id = serialization_random_id(6);
            $brand_image = $_FILES["brand_image"];
            if (!empty($brand_image["name"])) {
                $brand_image_link = upload_file($_FILES["brand_image"],$_SERVER["DOCUMENT_ROOT"]."/FirstStep/images/brand/",$brand_id.".".strtolower(pathinfo($_FILES["brand_image"]["name"],PATHINFO_EXTENSION)),true);
                if ($brand_image_link) {
                    $brand_image_link = addslashes(str_replace($_SERVER["DOCUMENT_ROOT"],"",$brand_image_link));
                    if (brand_post($brand_id,$brand_name,$brand_image_link)) {
                        echo '<p class="text-success">Post Brand successfully!</p>';
                    } else {
                        echo '<p class="text-danger">Some errors occurred when posting brand!</p>';
                    }
                } else {
                    echo '<p class="text-danger">Can\'t upload the image!</p>';
                }
            } else {
                echo '<p class="text-danger">Missing brand image!</p>';
            }
        } else {
            echo '<p class="text-danger">Empty Brand\'s name!</p>';
        }
        break;
    case "delete":
        $brand_id = trim($_POST["brand_id"]);
        if (!empty($brand_id)) {
            if (brand_delete($brand_id)) {
                echo '<p class="text-success">Delete brand successfully!</p>';
            } else {
                echo '<p class="text-danger">Some errors occurred when deleting the brand!</p>';
            }
        }
        break;
    case "edit":
        $brand_id = trim($_POST["edit_brand_id"]);
        if (!empty($brand_id)) {
            $old_brand = brand_select($brand_id);
            if (sizeof($old_brand) > 0 && $old_brand = array_pop($old_brand)) {
                $name = $_POST["edit_brand_name"];
                if (empty($name)) {
                    $name = $old_brand["name"];
                }
                $img_link = "";
                $img = $_FILES["edit_brand_image"];
                if (!empty($img["name"])) {
                    $img_link = upload_file($img,$_SERVER["DOCUMENT_ROOT"]."/FirstStep/images/brand/",$brand_id.".".strtolower(pathinfo($img["name"],PATHINFO_EXTENSION)),true);
                    if (!$img_link) {
                        $img_link = "";
                        echo '<p class="text-danger">Some errors occurred when uploading the image!</p>';
                    }
                }
                if (empty($img_link)) {
                    $img_link = $old_brand["image"];
                }
                $img_link = addslashes(str_replace($_SERVER["DOCUMENT_ROOT"],"",$img_link));
                if (brand_update($brand_id,$name,$img_link)) {
                    echo '<p class="text-success">Update brand successfully!</p>';
                } else {
                    echo '<p class="text-danger">Some errors occurred when updating the brand!</p>';
                }
            } else {
                echo '<p>Can\'t find the brand you are looking for!</p>';
            }
        }
        break;
    default:
        header("Location: ./");
        break;
}