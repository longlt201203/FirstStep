<div class="cart-box-main">
    <div class="container">
        <?=isset($return_message) ? $return_message : ""?>
        <div class="row new-account-login">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="title-left">
                    <h3>Account Information</h3>
                </div>
                <form class="mt-3 review-form-box" id="formRegister" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputName" class="mb-0">First Name</label>
                            <input type="text" class="form-control" id="InputName" placeholder="First Name" name="fname" value="<?=$user["fname"]?>"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputLastname" class="mb-0">Last Name</label>
                            <input type="text" class="form-control" id="InputLastname" placeholder="Last Name" name="lname" value="<?=$user["lname"]?>"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputEmail1" class="mb-0">Email Address</label>
                            <input type="email" class="form-control" id="InputEmail1" placeholder="Enter Email" name="email" value="<?=$user["email"]?>"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputPhone" class="mb-0">Phone Number</label>
                            <input type="text" class="form-control" id="InputPhone" placeholder="Phone Number" name="phone" value="<?=$user["phone"]?>"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputAddress" class="mb-0">Address</label>
                            <input type="text" class="form-control" id="InputAddress" placeholder="Address" name="address" value="<?=$user["address"]?>"> </div>
                    </div>
                    <button type="submit" class="btn hvr-hover">Update</button>
                </form>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="title-left">
                    <h3>Change Password</h3>
                </div>
                <form class="mt-3 review-form-box" id="formRegister" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputPassword1" class="mb-0">Old Password</label>
                            <input type="password" class="form-control" id="InputPassword1" placeholder="Password" name="old_pass"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword2" class="mb-0">New Password</label>
                            <input type="password" class="form-control" id="InputPassword2" placeholder="Password" name="new_pass"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword3" class="mb-0">Confirm New Password</label>
                            <input type="password" class="form-control" id="InputPassword3" placeholder="Password" name="new_pass_confirm"> </div>
                    </div>
                    <button type="submit" class="btn hvr-hover">Change</button>
                </form>
            </div>
        </div>
        <div class="row new-account-login">
            <div class="col">
                <div class="title-left">
                    <h3>Buying History</h3>
                </div>
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Bill ID</th>
                                <th>Bill Content</th>
                                <th>Order Date</th>
                                <th>Tax</th>
                                <th>Shipping Cost</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Shipping Address</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($bills) {
                                    foreach ($bills as $bill) {
                                        $bill_content = bill_get_content($bill["id"]);
                                        echo '<tr>';
                                        echo '<td>'.$bill["id"].'</td>';
                                        echo '<td>';
                                        echo '<ol>';
                                        foreach ($bill_content as $content) {
                                            $product = product_select($content["product_id"])[0];
                                            echo '<li>x'.$content["quantity"].' <a href="/FirstStep/shop-detail.php?product='.$product["id"].'">'.$product["name"].'</a></li>';
                                        }
                                        echo '</ol>';
                                        echo '</td>';
                                        echo '<td>'.date_format(date_create($bill["order_day"]),"H:i:s d/m/Y").'</td>';
                                        echo '<td>'.number_format($bill["tax"]*100).'%</td>';
                                        echo '<td>'.number_format(intval($bill["shipping_cost"])).' VNĐ</td>';
                                        echo '<td>'.number_format(intval($bill["discount"])).' VNĐ</td>';
                                        echo '<td>'.number_format(intval($bill["total"])).' VNĐ</td>';
                                        echo '<td>'.$bill["address"].'</td>';
                                        echo '<td>'.$bill["payment_method"].'</td>';
                                        echo '<td>'.$bill["status"].'</td>';
                                        echo '</tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>