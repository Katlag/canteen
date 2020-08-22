<?php

#connection to database
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

#query finds order ID of order chosen to be deleted and removes from the orders table
$delete_order = "DELETE FROM orders WHERE OrderID='$_GET[OrderID]'";

#error checking to see if the order has been deleted
if (!mysqli_query($con, $delete_order)) {
    echo 'Not Deleted';
} else {
    echo 'Order has been deleted';
}
header("refresh:2; url = update_data.php");

?>