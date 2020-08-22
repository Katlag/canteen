<?php

//error message will show if admin is not logged in (For if a user tries to click on the update data page)
echo "Please login to access this page";
header("refresh:2; url = index.php");

?>