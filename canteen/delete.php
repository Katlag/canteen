<?php

//connection to database
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

//query deletes ItemID of item chosen in the items table
$delete_item = "DELETE FROM items WHERE ItemID='$_GET[ItemID]'";

//error checked to see if the item has been successfully deleted
if (!mysqli_query($con, $delete_item)) {
    echo 'Item has not Deleted';
} else {
    echo 'Item has been Deleted';
}
header("refresh:2; url = update_data.php");

?>