<?php
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Canteen</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href="css/style.css">
</head>

<body>
<div class="background_img">

    <!--        <img class="background-img" src="images/home_page/coffee_bg.jpg" alt="coffee shop background">-->
    <h1 class="text-uppercase" style="font-size: 2.5rem;">Thankyou for your purchase at the canteen</h1>
    <div class="container">
        <div class="row" style="background-color: transparent">
            <div class="column" style="margin-left: 19rem">
                <form action="order.php" method="post">
                    <input type='submit' value="Order again"
                           class="button-card btn btn-light center">
                </form>
            </div>
            <div class="column">
                <form action="index.php" method="post">
                    <input type='submit' value="Return Home"
                           class="button-card btn btn-light center">
                </form>
            </div>
        </div>
    </div>
</div>


<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>