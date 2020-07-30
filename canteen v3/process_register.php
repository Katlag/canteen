<?php

$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");


// initializing variables
$FName = $_POST['FName'];
$LName = $_POST['LName'];

if (empty($FName)) {
    echo 'First name is required';
    header("refresh:2; url = sign_up.php");
    return $FName;
}

if (empty($LName)) {
    echo 'Last name is required';
    header("refresh:2; url = sign_up.php");
    return $LName;
} else {
    $insert_customer = "INSERT INTO customers(FName,LName) VALUES ('$FName','$LName')";
//error check for items
    if (!mysqli_query($con, $insert_customer)) {
        echo 'Sign up not a success. Please try again';
    } else {
        echo 'You have successfully signed up';
    }
    header("refresh:2; url = order.php");
}

?>


