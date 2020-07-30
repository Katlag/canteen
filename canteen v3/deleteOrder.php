<?php

$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

$delete_order = "DELETE FROM orders WHERE OrderID='$_GET[OrderID]'";
if (!mysqli_query($con, $delete_order)) {
    echo 'Not Deleted';
} else {
    echo 'Order has been deleted';
}
header("refresh:2; url = update_data.php");

?>