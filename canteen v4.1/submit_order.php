<?php
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

$FName = $_POST ['FName'];
$LName = $_POST ['LName'];
$Item = $_POST['Item'];


#Takes the input name values to see if they're in the database
$check_name = "SELECT * FROM customers WHERE FName='$FName' AND LName='$LName'";
$this_name_check = mysqli_query($con, $check_name);

#Takes the input item value to see if it's in the database
$check_item = "SELECT * FROM items WHERE Item='$Item'";
$this_item_check = mysqli_query($con, $check_item);

#Finds if the input item value is available
$check_availability = "SELECT * FROM items WHERE Item='$Item' AND Availability='1'";
$this_availability_check = mysqli_query($con, $check_availability);



//error check for items

#checking to see no fields are left blank
if (empty(($FName) and ($LName) and ($Item))) {
    echo 'Please fill out all fields before ordering ';
    header("refresh:2; url = order.php");
    return $FName;
}

#Checks to see if the name actually exists within the database
if (mysqli_num_rows($this_name_check) == 0) {
    echo "Sorry this name does not exist. Please sign up or try again.";
    header("refresh:2; url = order.php");
    return $this_name_check;
}

#Checks to see if the item actually exists within the database
if (mysqli_num_rows($this_item_check) == 0) {
    echo "Sorry the item you have entered does not exist. Please try again.";
    header("refresh:2; url = order.php");
    return $this_item_check;
}

#Checks to see if the item is available on the menu
if (mysqli_num_rows($this_availability_check) == 0) {
    echo "Sorry the item you have entered is not available. Please enter a different item.";
    header("refresh:2; url = order.php");
    return $this_availability_check;
} else {
    $order_query = "INSERT INTO orders(CustomerID, ItemID) SELECT CustomerID, ItemID
 FROM customers, items WHERE FName = '$FName' AND LName = '$LName' AND items.Item = '$Item' ";

    if (!mysqli_query($con, $order_query)) {
        echo 'Order failed. Please try again';
    } else {
        echo 'Your order has been recorded. Thank you for your purchase at the canteen!';
    }
    header("refresh:2; url = order_refresh_page.php");

}

?>








