<?php
require "../engine/model/bill.php";
switch ($_GET["action"]) {
    case "delete":
        if (bill_delete($_POST["bill_id"])) {
            echo '<p class="text-success">Delete bill successfully!</p>';
        } else {
            echo '<p class="text-danger">Some errors occurred when deleting the bill!</p>';
        }
        break;
    case "update":
        $id = trim($_POST["bill_id"]);
        $old_bill = bill_select($id);
        if ($old_bill) {
            $address = trim($_POST["bill_address"]);
            if (empty($address)) {
                $address = $old_bill["address"];
            }
            $payment_method = trim($_POST["bill_payment_method"]);
            if (empty($payment_method)) {
                $payment_method = $old_bill["payment_method"];
            }
            $status = trim($_POST["bill_status"]);
            if (empty($status)) {
                $status = $old_bill["status"];
            }
            if (bill_update($id,$address,$payment_method,$status)) {
                echo '<p class="text-success">Update bill successfully!</p>';
            } else {
                echo '<p class="text-danger">Some errors occurred when updating the bill!</p>';
            }
        } else {
            echo '<p class="text-danger">Can\'t find the bill you are searching for!</p>';
        }
        break;
}