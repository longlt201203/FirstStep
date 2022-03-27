<section id="account">
    <h1>Account</h1>
    <table class="table">
        <?php
        $clients = account_select_all();
        if (sizeof($clients) == 0) {
            echo '<p>Don\'t have any client yet</p>';
        } else {
            echo '<thead>';
            echo '<tr>';
            foreach (array_keys($clients[0]) as $head) {
                echo '<th>'.$head.'</th>';
            }
            echo '<th>Wishlist</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($clients as $client) {
                foreach ($client as $value) {
                    echo '<td>'.$value.'</td>';
                }
                echo '<td>';
                $wishlist = account_get_wishlist($client["username"]);
                if (sizeof($wishlist) > 0) {
                    echo array_pop($wishlist)["product_id"];
                    while (sizeof($wishlist) > 0) {
                        echo ", ".array_pop($wishlist)["product_id"];
                    }
                }
                echo '</td>';
                echo '</tr>';
            }
            echo '</body>';
        }
        ?>
    </table>
</section>