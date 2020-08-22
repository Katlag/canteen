<?php
//connection to database
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

//variables, taking the input value from what is entered in the update data page
$Item = $_POST['Item'];
$Category = $_POST['Category'];
$ItemType = $_POST['ItemType'];
$Calories = $_POST['Calories'];
$Cost = $_POST['Cost'];
$Availability = $_POST['Availability'];


//error check for items

//checking to see no fields are left blank
if (empty(($Item) and ($ItemType) and ($Category) and ($Calories) and ($Cost))) {
    echo 'Please fill out all fields';
    header("refresh:2; url = update_data.php");
    return $Item;
}

//Checking to see if calories only contains numbers
if (ctype_digit($Calories) === false) {
    echo 'Calories must contain numbers only. Please try again. ';
    header("refresh:2; url = update_data.php");
    return $Calories;
}

//Checking to see if cost only contains numbers
if (is_numeric($Cost) === false) {
    echo 'Cost must contain numbers only. Please try again. ';
    header("refresh:2; url = update_data.php");
    return $Cost;
}

//Checking to see if availability only contains numbers
if (ctype_digit($Availability) === false) {
    echo 'Availability must contain numbers only. Please try again. ';
    header("refresh:2; url = update_data.php");
    return $Availability;
}

//Checking to availability is equal to either 1 or 0
if (($Availability) > 1 or ($Availability) < 0) {
    echo 'Availability must be set to 1 or 0. Please try again. ';
    header("refresh:2; url = update_data.php");
    return $Availability;
}

//Checking to see if category only contain letters, not numbers
if (ctype_alpha($Category) === false) {
    echo 'Category must contain letters only. Please try again. ';
    header("refresh:2; url = update_data.php");
    return $Category;
}
//Checking to see if Item type only contain letters, not numbers
if (ctype_alpha($ItemType) === false) {
    echo 'Type must contain letters only. Please try again. ';
    header("refresh:2; url = update_data.php");
    return $ItemType;
} else {
    //Query inserts values of each variable into the items table
    $insert_item = "INSERT INTO items(Item,Category,ItemType,Calories,Cost,Availability) VALUES ('$Item','$Category','$ItemType', '$Calories', '$Cost', '$Availability')";

    //error check to see if everything has successfully been inserted
    if (!mysqli_query($con, $insert_item)) {
        echo 'Item has not been Inserted';
    } else {
        echo 'Item has been inserted';
    }
    header("refresh:2; url = update_data.php");

}


?>








