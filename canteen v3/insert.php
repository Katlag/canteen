<?php
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

$Item = $_POST['Item'];
$Category = $_POST['Category'];
$Calories = $_POST['Calories'];
$Cost = $_POST['Cost'];
$Availability = $_POST['Availability'];


//error check for items

if (empty(($Item) and ($Category) and ($Calories) and ($Cost) and ($Availability))) {
    echo 'Please fill out all fields';
    header("refresh:2; url = update_data.php");
    return $Item;
} else {
    $insert_item = "INSERT INTO items(Item,Category,Calories,Cost,Availability) VALUES ('$Item','$Category', '$Calories', '$Cost', '$Availability')";

    if (!mysqli_query($con, $insert_item)) {
        echo 'Item has not been Inserted';
    } else {
        echo 'Item has been inserted';
    }
    header("refresh:2; url = update_data.php");

}


?>








