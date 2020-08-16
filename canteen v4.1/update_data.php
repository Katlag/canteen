<?php
session_start();

$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

if ((!isset($_SESSION['logged_in'])) or $_SESSION['logged_in'] != 1) {
    header("Location: error_page.php");
}


$update_items = "SELECT * FROM items";
$update_items_record = mysqli_query($con, $update_items);


$this_order_query = "SELECT orders.OrderID, customers.FName, customers.LName, items.Item 
FROM customers, orders, items WHERE customers.CustomerID = orders.CustomerID AND orders.ItemID = items.ItemID  ORDER BY `OrderID` ASC";
$this_order_record = mysqli_query($con, $this_order_query);


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
                    <li class="nav-item hover">
                        <a class="nav-title" href="order.php">ORDER</a>
                    </li>
                    <li class="nav-item dropdown hover navactive">
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
    <h6><br>────── Update Data ──────</h6>
</div>

<main>
    <div class="container">
        <h3>ADD A ITEM</h3>
        <hr style="border: 2px solid #89ADAE; width:10%">
        <p class='para-text-signup'>Admin may create a new item to add to the menu</p>
        <div>
            <img src="images/update_data/insert_subheader.png" class="center" alt="insert data subheader"
                 width="500" height="125">
        </div>

        <div class="background_img_update">
            <div id="insert-content" class="input-align center">
                <form action="insert.php" method="post">
                    Item Name: <input type="text" name="Item" class="input-align"><br><br>
                    &ensp;Category: <input type="text" name="Category" class="input-align"><br><br>
                    &emsp; &emsp; Type: <input type="text" name="ItemType" class="input-align"><br><br>
                    &nbsp;&emsp;Calories: <input type="text" name="Calories" class="input-align"><br><br>
                    &ensp; &emsp;Cost: $ <input type="text" name="Cost" class="input-align"><br>
                    &nbsp;Availability: <input type="text" name="Availability" class="input-align"
                                               style="margin-top: 1rem"><br>
                    <br>
                    <input type="submit" name="items_button" value="Insert"
                           class="button-card btn btn-light">
                </form>
            </div>
        </div>

        <br>
        <hr style="border: 3px solid #2A84A0; margin-top: 2rem; margin-bottom: 2rem;"/>

        <br>
        <h3>DELETE ORDERS</h3>
        <hr style="border: 2px solid #89ADAE; width:10%">
        <p class='para-text-signup'>Admin may delete customer orders placed</p>
        <br>
        <div id="delete-content" class="center">
            <table width="100%">
                <tr>
                    <th>OrderID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Item Ordered</th>
                    <th>Delete</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($this_order_record)) {
                    echo "<tr><form action =  update_items.php method = post>";
                    echo "<td>" . $row ['OrderID'] . "</td>";
                    echo "<td>" . $row['FName'] . "</td>";
                    echo "<td>" . $row['LName'] . "</td>";
                    echo "<td>" . $row['Item'] . "</td>";
                    echo "<td><a class='delete-text' href=deleteOrder.php?OrderID=" . $row['OrderID'] . ">Delete</a></td>";
                    echo "</form></tr>";
                }
                ?>
            </table>
        </div>


        <hr style="border: 3px solid #2A84A0; margin-top: 3rem; margin-bottom: 2rem;"/>

        <br><br><br>
        <h3>UPDATE ITEMS</h3>
        <hr style="border: 2px solid #89ADAE; width:10%">
        <p class='para-text-signup'>Admin may update/delete Items within the menu</p>
        <br>
        <div id="items-content">
            <table width="100%">
                <tr>
                    <th>Item Information</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Calories</th>
                    <th>Cost</th>
                    <th>Availability</th>
                    <th>Submit</th>
                    <th>Delete</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($update_items_record)) {
                    echo "<tr><form action =  update_items.php method = post>";
                    echo "<td><input type=text name=Item value='" . $row['Item'] . "'></td>";
                    echo "<td><input type=text name=Category value='" . $row['Category'] . "'></td>";
                    echo "<td><input type=text name=ItemType value='" . $row['ItemType'] . "'></td>";
                    echo "<td><input type=text name=Calories value='" . $row['Calories'] . "'></td>";
                    echo "<td><input type=text name=Cost value='" . $row['Cost'] . "'></td>";
                    echo "<td><input type=text name=Availability value='" . $row['Availability'] . "'></td>";
                    echo "<input type=hidden name=ItemID value='" . $row['ItemID'] . "'>";
                    echo "<td><input type = submit name='submit_button' class='button-update btn-light'></td>";
                    echo "<td><a class='delete-text' href=delete.php?ItemID=" . $row['ItemID'] . ">Delete</a></td>";
                    echo "</form></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</main>


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