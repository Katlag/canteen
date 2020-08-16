<?php
session_start();

$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

// initializing variables
$Fname = "";
$LName = "";

// registering the customer
if (isset($_POST['submit'])) {
// code to get all the input values in the form
    $Fname = mysqli_real_escape_string($con, $_POST['FName']);
    $Lname = mysqli_real_escape_string($con, $_POST['LName']);

    if (empty($Fname)) {
        echo 'First name is required';
        header("refresh:2; url = sign_up.php");
        return $Lname;
    }
    if (empty($LName)) {
        echo 'Last name is required';
        header("refresh:2; url = sign_up.php");
        return $LName;
    } else {
        //inserting customer into database
        $insert_info = "INSERT INTO customers (Fname,Lname) VALUES('$Fname', '$Lname')";

        if (!mysqli_query($con, $insert_info)) {
            echo 'Please try again';
            header("refresh:2, url = sign_up.php");
        } else {
            echo 'You have successfully signed up!';
            header("refresh:2, url = index.php");
        }
    }
}
?>