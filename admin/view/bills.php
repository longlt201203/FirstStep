<section id="bills">
    <h1>Bills</h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <td>Bill ID</td>
                <td>Bill content</td>
                <td>User</td>
                <td>Order Date</td>
                <td>Tax</td>
                <td>Shipping Cost</td>
                <td>Discount</td>
                <td>Total</td>
                <td>Address</td>
                <td>Payment Method</td>
                <td>Status</td>
            </tr>
            </thead>
            <tbody>
            <?php
            $bills = bill_select_all();
            foreach ($bills as $bill) {
                echo '<tr>';
                echo '<td>'.$bill["id"].'</td>';
                echo '<td>';
                echo '<ul>';
                foreach (bill_get_content($bill["id"]) as $content) {
                    $product = product_select($content["product_id"])[0];
                    echo '<li>x'.$content["quantity"].' '.$product["name"].' ('.$product["id"].')</li>';
                }
                echo '</ul>';
                echo '</td>';
                echo '<td>'.$bill["account_username"].'</td>';
                echo '<td>'.date_format(date_create($bill["order_day"]),"H:i:s d/m/Y").'</td>';
                echo '<td>'.intval($bill["tax"]*100).'%</td>';
                echo '<td>'.number_format(intval($bill["shipping_cost"])).' VNĐ</td>';
                echo '<td>'.number_format(intval($bill["discount"])).' VNĐ</td>';
                echo '<td>'.number_format(intval($bill["total"])).' VNĐ</td>';
                echo '<td>'.$bill["address"].'</td>';
                echo '<td>'.$bill["payment_method"].'</td>';
                echo '<td>'.$bill["status"].'</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
        <form action="controller.php?from_form=bills&action=delete" method="post">
            <h3>Delete Bill</h3>
            <div>
                <label for="bill_id">Bill ID</label>
                <input type="text" name="bill_id" id="bill_id">
            </div>
            <div>
                <input type="checkbox" id="confirm_delete_bill" required>
                <label for="confirm_delete_bill">Confirm</label>
            </div>
            <input type="submit" value="Delete">
        </form>
        <form action="controller.php?from_form=bills&action=update" method="post">
            <h3>Update Bill</h3>
            <div>
                <label for="bill_id">Bill ID</label>
                <input type="text" name="bill_id" id="bill_id">
            </div>
            <div>
                <label for="bill_address">Address</label>
                <input type="text" name="bill_address" id="bill_address">
            </div>
            <div>
                <label for="bill_payment_method">Payment Method</label>
                <select name="bill_payment_method" id="bill_payment_method">
                    <option value="" selected>Keep Original</option>
                    <option value="CASH">Cash</option>
                    <option value="CREDIT">Credit</option>
                </select>
            </div>
            <div>
                <label for="bill_status">Status</label>
                <select name="bill_status" id="bill_status">
                    <option value="" selected>Keep Original</option>
                    <option value="WAITING">Waiting</option>
                    <option value="DONE">Done</option>
                </select>
            </div>
            <input type="submit" value="Update">
        </form>
    </div>
</section>