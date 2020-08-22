<?php

//connection code
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");


//initializing variables
$FName = $_POST['FName'];
$LName = $_POST['LName'];
$Email = $_POST['Email'];

//query takes input email value to see if it's in the database
$check_email = "SELECT * FROM customers WHERE Email='$Email'";
$this_email_check = mysqli_query($con, $check_email);

//checking to see if both fields are empty
if (empty(($FName) and ($LName) and ($Email))) {
    echo 'No Field can be blank. First name, last name and email are required.';
    header("refresh:2; url = sign_up.php");
    return $FName;
}


//Checking to see if First name only contain letters, not numbers
if (ctype_alpha($FName) === false) {
    echo 'First Name must only contain letters. Please try again. ';
    header("refresh:2; url = sign_up.php");
    return $FName;
}

//Checking to see if email is already taken
if (mysqli_num_rows($this_email_check) > 0) {
    echo "This email has already been taken. Please try again";
    header("refresh:2; url = sign_up.php");
    return $Email;
}

//Checking to see if Last name only contain letters, not numbers
if (ctype_alpha($LName) === false) {
    echo 'Last Name must only contain letters. Please try again. ';
    header("refresh:2; url = sign_up.php");
    return $LName;
} else {
    //query inserts FName, LName and Email entered by the user into the customers table
    $insert_customer = "INSERT INTO customers(FName,LName,Email) VALUES ('$FName','$LName','$Email')";

//error check to see if all was done correctly
    if (!mysqli_query($con, $insert_customer)) {
        echo 'Sign up not a success. Please try again';
    } else {
        echo 'You have successfully signed up';
    }
    header("refresh:2; url = order.php");
}

?>


