<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Wishlist</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Wishlist</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Wishlist  -->
<div class="wishlist-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Images</th>
                            <th>Product Name</th>
                            <th>Unit Price </th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($products as $product) {
                                echo "<tr>
                            <td class=\"thumbnail-img\">
                                <a href=\"/FirstStep/shop-detail.php?product={$product["id"]}\">
                                <img class=\"img-fluid\" src=\"{$product["main_img_link"]}\" alt=\"\" />
                                </a>
                            </td>
                            <td class=\"name-pr\">
                                <a href=\"/FirstStep/shop-detail.php?product={$product["id"]}\">
                                    {$product["name"]}
                                </a>
                            </td>
                            <td class=\"price-pr\">
                                <p>{$product["price"]}</p>
                            </td>
                            <td class=\"remove-pr\">
                                <a href=\"/FirstStep/add_to_wishlist.php?action=remove&product={$product["id"]}\">
                                    <i class=\"fas fa-times\"></i>
                                </a>
                            </td>
                        </tr>";
                            }
                            unset($product);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Wishlist -->