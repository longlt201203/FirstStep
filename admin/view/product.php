<section id="product">
    <h1>Product</h1>
    <table class="table">
        <?php
        $products = product_select_all();
        if (sizeof($products) == 0) {
            echo '<p>Don\'t have any product yet!</p>';
        } else {
            echo '<thead>';
            echo '<tr>';
            foreach (array_keys($products[0]) as $head) {
                echo '<th>'.$head.'</th>';
            }
            echo '<th>category</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($products as $product) {
                echo '<tr>';
                foreach ($product as $key => $value) {
                    echo '<td>';
                    if ($key != "main_img_link" && $key != "img_links") {
                        echo $value;
                    } else if ($key == "main_img_link") {
                        echo '<img height="100" src="'.$value.'">';
                    } else {
                        $imgs = json_decode($value,true);
                        foreach ($imgs as $img) {
                            echo '<img height="100" src="'.$img.'">';
                        }
                    }
                    echo '</td>';
                }
                echo '<td>';
                $product_categories = product_select_category($product["id"]);
                if ($product_categories && sizeof($product_categories) > 0) {
                    echo array_pop($product_categories)["category_id"];
                    while (sizeof($product_categories) > 0) {
                        echo ", ".array_pop($product_categories)["category_id"];
                    }
                }
                echo '</td>';
                echo '</tr>';
            }
            echo '</body>';
        }
        ?>
    </table>
    <form action="controller.php?from_form=product&action=post" method="post" enctype="multipart/form-data">
        <h3>Post Product</h3>
        <div>
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" id="product_name">
        </div>
        <div>
            <label for="product_description">Description</label>
            <textarea name="product_description" id="product_description" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="product_price">Price</label>
            <input type="number" name="product_price" id="product_price" min="0">
        </div>
        <div>
            <label for="product_remain">Remain</label>
            <input type="number" name="product_remain" id="product_remain" value="0" min="0">
        </div>
        <div>
            <label for="product_status">Status</label>
            <select name="product_status" id="product_status">
                <option value="NEW">New</option>
                <option value="SALE">Sale</option>
                <option value="NONE">None</option>
            </select>
        </div>
        <div>
            <label for="product_category">Category</label>
            <?php
                if (sizeof($categories) != 0) {
                    foreach ($categories as $category) {
                        echo '<div>';
                        echo '<input type="checkbox" name="product_category[]" value="'.$category["id"].'" id="product_category_'.$category["id"].'">';
                        echo '<label for="product_category_'.$category["id"].'">'.$category["name"].'</label>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="">There is nothing yet!</p>';
                }
            ?>
        </div>
        <div>
            <label for="product_brand_id">Brand</label>
            <select name="product_brand_id" id="product_brand_id">
                <?php
                echo '<option value="NULL">Decide later</option>';
                if (sizeof($brands) != 0) {
                    foreach ($brands as $brand) {
                        echo '<option value="'.$brand["id"].'">'.$brand["name"].'</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <label for="product_main_image">Main Image</label>
            <input type="file" name="product_main_image" id="product_main_image" accept="image/*">
        </div>
        <div>
            <label for="product_img_links">Images</label>
            <input type="hidden" name="product_img_count" id="product_img_links_counter" value="0">
            <ul id="product_img_container" header_name="product_img_links"></ul>
            <a class="a-button" onclick="add_image_panel(document.getElementById('product_img_container'))">Add image</a>
        </div>
        <input type="submit" value="Post">
    </form>
    <form action="controller.php?from_form=product&action=delete" method="post">
        <h3>Delete Product</h3>
        <div>
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id">
                <?php
                echo '<option value="">Decide later</option>';
                if (sizeof($products) != 0) {
                    foreach ($products as $product) {
                        echo '<option value="'.$product["id"].'">'.$product["name"].'</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <label for="delete_product_confirm">Confirm</label>
            <input type="checkbox" id="delete_product_confirm" required>
        </div>
        <input type="submit" value="Delete">
    </form>
    <form action="controller.php?from_form=product&action=edit" method="post" enctype="multipart/form-data">
        <h3>Edit Product (Leave blank to keep the information)</h3>
        <div>
            <label for="edit_product_id">Product</label>
            <select name="edit_product_id" id="edit_product_id">
                <?php
                echo '<option value="">Decide later</option>';
                if (sizeof($products) != 0) {
                    foreach ($products as $product) {
                        echo '<option value="'.$product["id"].'">'.$product["name"].'</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <label for="edit_product_name">Product Name</label>
            <input type="text" name="edit_product_name" id="edit_product_name">
        </div>
        <div>
            <label for="edit_product_description">Description</label>
            <textarea name="edit_product_description" id="edit_product_description" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="edit_product_price">Price (-1 to keep the original value)</label>
            <input type="number" name="edit_product_price" id="edit_product_price" min="-1" value="-1">
        </div>
        <div>
            <label for="edit_product_remain">Remain (-1 to keep the original value)</label>
            <input type="number" name="edit_product_remain" id="edit_product_remain" min="-1" value="-1">
        </div>
        <div>
            <label for="edit_product_status">Status</label>
            <select name="edit_product_status" id="edit_product_status">
                <option value="">Keep original</option>
                <option value="NEW">New</option>
                <option value="SALE">Sale</option>
                <option value="NONE">None</option>
            </select>
        </div>
        <div>
            <label for="edit_product_category_id">Category</label>
            <div>
                <input type="checkbox" name="edit_product_category[]" value="KEEP" id="edit_product_category_KEEP" checked>
                <label for="edit_product_category_KEEP">Keep original</label>
            </div>
            <?php
            if (sizeof($categories) != 0) {
                foreach ($categories as $category) {
                    echo '<div>';
                    echo '<input type="checkbox" name="edit_product_category[]" value="'.$category["id"].'" id="edit_product_category_'.$category["id"].'">';
                    echo '<label for="edit_product_category_'.$category["id"].'">'.$category["name"].'</label>';
                    echo '</div>';
                }
            } else {
                echo '<p class="">There is nothing yet!</p>';
            }
            ?>
        </div>
        <div>
            <label for="edit_product_brand_id">Brand</label>
            <select name="edit_product_brand_id" id="edit_product_brand_id">
                <?php
                echo '<option value="">Keep original</option>';
                if (sizeof($brands) != 0) {
                    foreach ($brands as $brand) {
                        echo '<option value="'.$brand["id"].'">'.$brand["name"].'</option>';
                    }
                }
                echo '<option value="NULL">Remove brand</option>';
                ?>
            </select>
        </div>
        <div>
            <label for="edit_product_main_image">Main Image</label>
            <input type="file" name="edit_product_main_image" id="edit_product_main_image" accept="image/*">
        </div>
        <div>
            <label for="edit_product_img_links">Images</label>
            <input type="hidden" name="edit_product_img_count" id="edit_product_img_links_counter" value="0">
            <ul id="edit_product_img_container" header_name="edit_product_img_links"></ul>
            <a class="a-button" onclick="add_image_panel(document.getElementById('edit_product_img_container'))">Add image</a>
        </div>
        <input type="submit" value="Update">
    </form>
</section>