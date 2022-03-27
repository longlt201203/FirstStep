<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cart</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="add_to_cart.php">
                    <input type="hidden" name="action" value="update">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($cart_products)) {
                                foreach ($cart_products as $product) {
                                    echo '<input type="hidden" name="product[]" value="'.$product["id"].'">';
                                    echo "<tr>
                            <td class=\"thumbnail-img\">
                                <a href=\"/FirstStep/shop-detail.php?product={$product["id"]}\">
                                <img class=\"img-fluid\" src=\"{$product["main_img_link"]}\" alt=\"{$product["name"]}\" />
                                </a>
                            </td>
                            <td class=\"name-pr\">
                                <a href=\"/FirstStep/shop-detail.php?product={$product["id"]}\">
                                    {$product["name"]}
                                </a>
                            </td>
                            <td class=\"price-pr\">
                                <p>".number_format(intval($product["price"]))." VNĐ</p>
                            </td>
                            <td class=\"quantity-box\"><input type=\"number\" size=\"4\" value=\"{$_SESSION["cart"][$product["id"]]}\" min=\"1\" step=\"1\" class=\"c-input-text qty text\" name='quantity[]'></td>
                            <td class=\"total-pr\">
                                <p>".number_format(intval($product["price"])/1000*$_SESSION["cart"][$product["id"]]).",000 VNĐ</p>
                            </td>
                            <td class=\"remove-pr\">
                                <a href=\"/FirstStep/add_to_cart.php?action=remove&product={$product["id"]}\">
                                    <i class=\"fas fa-times\"></i>
                                </a>
                            </td>
                        </tr>";
                                }
                                unset($product_id,$product);
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?=isset($total) ? "<div class=\"row my-5\">
            <div class=\"col-lg-6 col-sm-6\">
                <div class=\"update-box\">
                    <input type='submit' value='Update Cart' class='btn btn-dark'>
                </div>
            </div>
        </div>" : ""?>
                </form>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Order summary</h3>
                    <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"><?=number_format($total ?? 0)?> VNĐ</div>
                    </div>
                    <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold">0 VNĐ</div>
                    </div>
                    <div class="d-flex">
                        <h4>Tax</h4>
                        <div class="ml-auto font-weight-bold"><?=number_format(($total ?? 0)*0.1)?> VNĐ</div>
                    </div>
                    <div class="d-flex">
                        <h4>Shipping Cost</h4>
                        <div class="ml-auto font-weight-bold">Free</div>
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Grand Total</h5>
                        <div class="ml-auto h5"><?=number_format(($total ?? 0)*1.1)?> VNĐ</div>
                    </div>
                <hr> </div>
            </div>
            <div class="col-12 d-flex shopping-box"><a href="/FirstStep/checkout.php" class="ml-auto btn hvr-hover">Checkout</a> </div>
        </div>
    </div>
</div>