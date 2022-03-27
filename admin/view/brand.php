<section id="brand">
    <h1>Brand</h1>
    <table class="table">
        <?php
        $brands = brand_select_all();
        if (sizeof($brands) == 0) {
            echo '<p>Don\'t have any brand yet</p>';
        } else {
            echo '<thead>';
            echo '<tr>';
            foreach (array_keys($brands[0]) as $head) {
                echo '<th>'.$head.'</th>';
            }
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($brands as $brand) {
                echo '<tr>';
                foreach ($brand as $key => $value) {
                    echo '<td>';
                    if ($key != "image") {
                        echo $value;
                    } else {
                        echo '<img height="100" src="'.$value.'">';
                    }
                    echo '</td>';
                }
                echo '</tr>';
            }
            echo '</body>';
        }
        ?>
    </table>
    <form action="controller.php?from_form=brand&action=post" method="post" enctype="multipart/form-data">
        <h3>Post Brand</h3>
        <div>
            <label for="brand_name">Brand Name</label>
            <input type="text" id="brand_name" name="brand_name">
        </div>
        <div>
            <label for="brand_image">Brand Image</label>
            <input type="file" id="brand_image" name="brand_image" accept="image/*">
        </div>
        <input type="submit" value="Post">
    </form>
    <form action="controller.php?from_form=brand&action=delete" method="post">
        <h3>Delete Brand</h3>
        <div>
            <label for="brand_id">Brand</label>
            <select name="brand_id" id="brand_id">
                <?php
                echo '<option value="">Decide later</option>';
                if (sizeof($brands) != 0) {
                    foreach ($brands as $brand) {
                        echo '<option value="'.$brand["id"].'">'.$brand["name"].'</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <label for="delete_brand_confirm">Confirm</label>
            <input type="checkbox" id="delete_brand_confirm" name="delete_brand_confirm" required>
        </div>
        <input type="submit" value="Delete">
    </form>
    <form action="controller.php?from_form=brand&action=edit" method="post" enctype="multipart/form-data">
        <h3>Edit Brand</h3>
        <div>
            <label for="edit_brand_id">Brand</label>
            <select name="edit_brand_id" id="edit_brand_id">
                <?php
                echo '<option value="">Decide later</option>';
                if (sizeof($brands) != 0) {
                    foreach ($brands as $brand) {
                        echo '<option value="'.$brand["id"].'">'.$brand["name"].'</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <label for="edit_brand_name">Brand Name</label>
            <input type="text" id="edit_brand_name" name="edit_brand_name">
        </div>
        <div>
            <label for="edit_brand_image">Brand Image</label>
            <input type="file" id="edit_brand_image" name="edit_brand_image" accept="image/*">
        </div>
        <input type="submit" value="Update">
    </form>
</section>