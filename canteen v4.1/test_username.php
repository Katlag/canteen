<?php

$password = 'Cheese';
$encrypted_password = md5($password);

$bcrypt_password = password_hash($password, PASSWORD_BCRYPT);
echo "<br>Bcrypt Password: " . $bcrypt_password;


?>