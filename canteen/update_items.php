<?php
//connection code
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

//query updates item with new changes set to any of the fields.
$update_item = "UPDATE items SET Item ='$_POST[Item]',ItemType ='$_POST[ItemType]',Category = '$_POST[Category]', 
Calories='$_POST[Calories]',Cost ='$_POST[Cost]', Availability='$_POST[Availability]' WHERE ItemID='$_POST[ItemID]'";


//error to check to see if item has been updated
if (!mysqli_query($con, $update_item)) {
    echo 'Item has not been Updated';
} else {
    echo 'Item has been updated.';
}
header("refresh:2, url = update_data.php");

?>


