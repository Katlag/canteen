<?php
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

// customers query to populate the customer dropdown form
$all_customers_query = 'SELECT CustomerID, FName, LName FROM customers';
$all_customers_result = mysqli_query($con, $all_customers_query);

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
<div class="background_img_all">
    <nav class="navbar navbar-expand-lg navbar-light bg-canteen">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
                    aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href='index.php'>
                <img class="nav-image" width="400" alt="canteen logo" src="images/home_page/canteen_logo3.png">
            </a>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    <li class="nav-item hover">
                        <a class="nav-title" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item hover">
                        <a class="nav-title" href="items.php">MENU</a>
                    </li>
                    <li class="nav-item hover">
                        <a class="nav-title" href="sign_up.php">SIGN UP</a>
                    </li>
                    <li class="nav-item navactive">
                        <a class="nav-title" href="order.php">ORDER</a>
                    </li>
                    <li class="nav-item dropdown hover">
                        <a class="nav-title dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ADMIN</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="login.php">LOGIN</a>
                            <a class="dropdown-item" href="process_logout.php">LOGOUT</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="update_data.php">UPDATE</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h2>THE CANTEEN</h2>
    <h6><br>────── Order Now ──────</h6>
</div>

<div class="container">

    <div class="row">
        <div class="col-sm-6">
            <div class="order-form">
                <h3>Place your Order</h3>
                <hr style="border: 2px solid #89ADAE; width:10%">
                <img src="images/order/order_subheader.png" class="center" alt="order icon" width="500"
                     height="125"><br>
                <form name="order_form" id='order_form' method="post" action="submit_order.php">
                    <div class="form-inline">
                        <div class="center">
                            <label class="label-text">First Name: </label>
                            <input type="text" name="FName">
                        </div>
                        <br>
                        <div class="center">
                            <label class="label-text">Last Name:</label>
                            <input type="text" name="LName">
                        </div>
                        <div class="center">
                            <label class="label-text">Item Name:</label>
                            <input type="text" name="Item">
                        </div>
                    </div>
                    <br>
                    <div class="center">
                        <input type="submit" name="submit" id="submit" value="Submit Order"
                               class="button-card-signup btn btn-light center">
                    </div>
                    <br>
                </form>
            </div>
        </div>
        <div class="col-sm-6">
            <p class="para-text-signup">View all the<b> available</b> items on the menu below</p>
            <hr style="border: 2px solid #89ADAE; width:40%">

            <div id="items-content">
                <table id="itemstable" width="80%" class="table-striped table-center">
                    <?php
                    //Availability query to populate table that shows available items only
                    $result = mysqli_query($con, "SELECT * FROM items WHERE Availability='1' ");
                    if (mysqli_num_rows($result) != 0) {

                        echo "<tr>";
                        echo "<th>Item</th>";
                        echo "<th>Type</th>";
                        echo "<th>Calories</th>";
                        echo "<th>Cost</th>";
                        echo "</tr>";

                        while ($row = mysqli_fetch_array($result)) {
                            $id = ['ItemID'];

                            echo "<tr>";
                            echo "<td>" . $row['Item'] . "</td>";
                            echo "<td>" . $row['ItemType'] . "</td>";
                            echo "<td>" . $row['Calories'] . "</td>";
                            echo "<td>" . $row['Cost'] . "</td>";
                            echo "</tr>";
                        }
                    }

                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="page-footer">
    <div class="container text-center text-md-left mt-5">
        <div class="row mt-3">
            <div class="logo mx-auto mb-md-0 mb-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2998.5363311184515!2d174.77800201542235!3d-41.275430479274625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d38ae2f27710d0d%3A0x2d0763d38f00974b!2sWellington%20Girls&#39;%20College!5e0!3m2!1sen!2snz!4v1595291334782!5m2!1sen!2snz"
                        width="500" height="300" style="border:0; margin-bottom: 1rem;"
                        allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h4 class="text-uppercase font-weight-bold">Visit us</h4>
                <small class="text">Official website</small>
                <p class="footer-text">
                    <a class="footer-link" href="https://wgc.school.nz/">Wellington Girls College website</a>
                </p>
                <small class="text">Canteen contact</small>
                <p class="footer-text">
                    <a class="footer-link"
                       href="https://www.facebook.com/CanteenLady">Contact the Canteen</a>
                </p>
                <small class="text">Facebook page</small>
                <p class="footer-text">
                    <a class="footer-link"
                       href="https://www.facebook.com/CanteenLady">Facebook</a>
                </p>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-md-2 mb-4">
                <h4 class="text-uppercase font-weight-bold">More Info</h4>
                <small class="text">Address</small>
                <p class="footer-text">Pipitea Street, Thorndon, Wellington 6011</p>
                <small class="text">Opening hours</small>
                <p class="footer-text">9:00am-2:00pm
                </p>
                <small class="text">Phone number - Wellington Girls College</small>
                <p class="footer-text">04-472 5743</p>
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