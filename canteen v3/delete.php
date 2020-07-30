<?php

$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

$delete_item = "DELETE FROM items WHERE ItemID='$_GET[ItemID]'";
if (!mysqli_query($con, $delete_item)) {
    echo 'Not Deleted';
} else {
    echo 'Deleted';
}
header("refresh:2; url = update_data.php");

?>