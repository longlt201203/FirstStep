<section id="category">
    <h1>Category</h1>
    <table class="table">
        <?php
        $categories = category_select_all();
        if (sizeof($categories) == 0) {
            echo '<p>Don\'t have any category yet</p>';
        } else {
            echo '<thead>';
            echo '<tr>';
            foreach (array_keys($categories[0]) as $head) {
                echo '<th>'.$head.'</th>';
            }
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($categories as $category) {
                echo '<tr>';
                foreach ($category as $key => $value) {
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
    <form action="controller.php?from_form=category&action=post" method="post" enctype="multipart/form-data">
        <h3>Post Category</h3>
        <div>
            <label for="category_name">Category Name</label>
            <input type="text" id="category_name" name="category_name">
        </div>
        <div>
            <label for="category_description">Description</label>
            <textarea name="category_description" id="category_description" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="category_image">Image</label>
            <input type="file" name="category_image" id="category_image" accept="image/*">
        </div>
        <input type="submit" value="Post">
    </form>
    <form action="controller.php?from_form=category&action=delete" method="post">
        <h3>Delete Category</h3>
        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id">
                <?php
                echo '<option value="">Decide later</option>';
                if (sizeof($categories) != 0) {
                    foreach ($categories as $category) {
                        echo '<option value="'.$category["id"].'">'.$category["name"].'</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <label for="delete_category_confirm">Confirm</label>
            <input type="checkbox" id="delete_category_confirm" required>
        </div>
        <input type="submit" value="Delete">
    </form>
    <form action="controller.php?from_form=category&action=edit" method="post" enctype="multipart/form-data">
        <h3>Edit category</h3>
        <div>
            <label for="edit_category_id">Category</label>
            <select name="edit_category_id" id="edit_category_id">
                <?php
                echo '<option value="">Decide later</option>';
                if (sizeof($categories) != 0) {
                    foreach ($categories as $category) {
                        echo '<option value="'.$category["id"].'">'.$category["name"].'</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <label for="edit_category_name">Category Name</label>
            <input type="text" id="edit_category_name" name="edit_category_name">
        </div>
        <div>
            <label for="edit_category_description">Description</label>
            <textarea name="edit_category_description" id="edit_category_description" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="edit_category_image">Image</label>
            <input type="file" name="edit_category_image" id="edit_category_image" accept="image/*">
        </div>
        <input type="submit" value="Update">
    </form>
</section>