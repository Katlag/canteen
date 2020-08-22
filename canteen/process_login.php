<?php

session_start();

//connection code
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

//Takes input values of username and password
$user = trim($_POST['username']);
$pass = trim($_POST['password']);

//if input fields of username and password are empty, error will show
if (empty(($user) and ($pass))) {
    echo 'No Field can be blank. Username and password are required.';
    header("refresh:2; url = login.php");
    return $user;
} else {
    //query matches password with username within the database entered
    $login_query = "SELECT password FROM Users WHERE Username = '" . $user . "'";
    $login_result = mysqli_query($con, $login_query);
    $login_record = mysqli_fetch_assoc($login_result);

    //password is encrypted
    $hash = $login_record['password'];

    $verify = password_verify($pass, $hash);
    
    //error check to see if the username and password is right
    if ($verify) {
        echo 'Access granted';
        $_SESSION['logged_in'] = 1;
        header("refresh:2; url = update_data.php");
    } else {
        echo 'Username or Password is wrong. Please try again';
        header("refresh:2; url = login.php");
    }
}


?>