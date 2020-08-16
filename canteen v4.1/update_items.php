<?php
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

//updating an item
$update_item = "UPDATE items SET Item ='$_POST[Item]',ItemType ='$_POST[ItemType]',Category = '$_POST[Category]', 
Calories='$_POST[Calories]',Cost ='$_POST[Cost]', Availability='$_POST[Availability]' WHERE ItemID='$_POST[ItemID]'";

if (!mysqli_query($con, $update_item)) {
    echo 'Not Updated';
} else {
    echo 'Updated';
}
header("refresh:2, url = update_data.php");

?>


