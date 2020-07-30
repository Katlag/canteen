<?php
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

//updating a drink
$update_item = "UPDATE items SET Item ='$_POST[Item]',Category = '$_POST[Category]',
 Calories='$_POST[Calories]',Cost ='$_POST[Cost]' WHERE ItemID='$_POST[ItemID]'";


if (!mysqli_query($con, $update_item)) {
    echo 'Not Updated';
} else {
    echo 'Updated';
}
header("refresh:2, url = update_data.php");

?>


