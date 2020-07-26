<?php

session_start();

$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

$user = trim($_POST['username']);
$pass = trim($_POST['password']);

$login_query = "SELECT password FROM Users WHERE Username = '" . $user . "'";
$login_result = mysqli_query($con, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

$hash = $login_record['password'];

$verify = password_verify($pass, $hash);
if ($verify) {
    echo'Access granted';
    $_SESSION['logged_in'] = 1;
    header("refresh:2; url = update_data.php");
} else {
    echo'Username or Password is wrong. Please try again';
    header("refresh:2; url = login.php");
}

?>