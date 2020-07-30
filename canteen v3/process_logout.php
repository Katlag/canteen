<?php
session_start();

$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

$logout = session_destroy();
if (!mysqli_query($con, $logout)) {
    echo 'You have successfully logged out';
    header("refresh:2; url = index.php");
}

?>