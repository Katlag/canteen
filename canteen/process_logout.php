<?php
session_start();

//connection code
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

$logout = session_destroy();

//if session has successfully been destroyed, user will be notified
if (!mysqli_query($con, $logout)) {
    echo 'You have successfully logged out';
    header("refresh:2; url = index.php");
}

?>