<?php
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$all_items_query = 'SELECT ItemID, Item FROM items';
$all_items_result = mysqli_query($con, $all_items_query);


if (isset($_GET['item'])) {
    $id = $_GET['item'];
} else {
    $id = 1;
}

$this_item_query = "SELECT Item, Cost, Category, ItemType, Calories FROM items WHERE ItemID ='" . $id . "'";
$this_item_result = mysqli_query($con, $this_item_query);
$this_item_record = mysqli_fetch_assoc($this_item_result);

$category_query = "SELECT Item, Category FROM items WHERE ItemID ='" . $id . "'";
$category_result = mysqli_query($con, $category_query);
$category_record = mysqli_fetch_assoc($category_result);

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
                    <li class="nav-item navactive">
                        <a class="nav-title" href="items.php">ITEMS</a>
                    </li>
                    <li class="nav-item hover">
                        <a class="nav-title" href="sign_up.php">SIGN UP</a>
                    </li>
                    <li class="nav-item hover">
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
    <h6><br>────── Items ──────</h6>
</div>

<main>
    <div class="container">
        <div>
            <img src="images/items/items_subheader_grey.png" class="center" alt="items subheader" width="500"
                 height="125">
        </div>
        <div class="row">
            <div class="column center">
                <br><br>
                <h3>ITEMS INFORMATION</h3>
                <p class="para-text-signup">View the information about each item</p>
                <?php

                echo "<p class='para-text-items'> <b>Item Name:</b> " . $this_item_record['Item'] . "<br>";
                echo "<p class='para-text-items'> <b>Category:</b> " . $this_item_record['Category'] . "<br>";
                echo "<p class='para-text-items'> <b>Type:</b> " . $this_item_record['ItemType'] . "<br>";
                echo "<p class='para-text-items'> <b>Calories:</b> " . $this_item_record['Calories'] . "kcal", "<br>";
                echo "<p class='para-text-items'> <b>Cost: </b>$" . $this_item_record['Cost'] . "<br>";

                ?>

            </div>

            <div class="column center">
                <br><br>
                <h3>SELECT ANOTHER ITEM</h3>
                <p class="para-text-signup">Click below to see the information about another item</p>
                <!--Drinks form-->
                <div>
                    <form name="items_form" id="items_form" method="get" action="items.php">
                        <select id="item" name="item">
                            <!--options-->
                            <?php
                            while ($all_items_record = mysqli_fetch_assoc($all_items_result)) {
                                echo "<option value = '" . $all_items_record['ItemID'] . "'>";
                                echo $all_items_record['Item'];
                                echo "</option>";
                            }
                            ?>
                        </select>
                        <input type="submit" name="items_button" value="Display Information"
                               class="button-card btn btn-light">
                    </form>
                </div>
            </div>
        </div>
        <br>
        <hr style="border: 3px solid #89ADAE; width:50%; margin-top: 5rem;">

        <h3 class="text-uppercase"> Our top picks for the week</h3>
        <p class="para-text-signup">Get them before they're all sold out!</p>
        <br>
        <div class="row">
            <div class="column center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Corndog</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rated our number one favourite <br>★★★★★</h6>
                        <img src="images/items/corndog.png" class="card-img" alt="corndog">
                    </div>
                </div>
            </div>
            <div class="column center">
                <div class="card">
                    <div class="card-body borderless">
                        <h5 class="card-title">Caramel Slice</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rated our second favourite <br>★★★★☆</h6>
                        <img src="images/items/caramel_slice.png" class="card-img" alt="caramel slice">
                    </div>
                </div>
            </div>
            <div class="column center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Panini</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rated our third favourite <br>★★★★☆</h6>
                        <img src="images/items/panini.png" class="card-img" alt="panini">
                    </div>
                </div>
            </div>
        </div>

        <hr style="border: 3px solid #89ADAE; width:50%; margin-top: 3rem;">

        <br><br>
        <h3 class="center">SELECT BY TYPE</h3>
        <hr style="border: 2px solid #89ADAE; width:10%">
        <p class="para-text-signup">Click to see the type of items we offer at the canteen</p>

        <div class="container">
            <div class="row items-icon">
                <div class="column">
                    <form action="items.php" method="post">
                        <img src="images/items/hamburger.png" class="center" alt="hamburger" width="100"
                             height="100">
                        <input type='submit' name='savoury' value="Savoury Foods"
                               class="button-card btn btn-light center">
                    </form>
                </div>
                <div class="column">
                    <form action="items.php" method="post">
                        <img src="images/items/donut.png" class="center" alt="donut" width="100" height="100">
                        <input type='submit' name='sweet' value="Sweet Foods"
                               class="button-card btn btn-light center">
                    </form>
                </div>
                <div class="column">
                    <form action="items.php" method="post">
                        <img src="images/items/iced_coffee.png" class="center" alt="coffee iced" width="100"
                             height="100">
                        <input type='submit' name='cold' value="Cold Drinks"
                               class="button-card btn btn-light center">
                    </form>
                </div>
                <div class="column">
                    <form action="items.php" method="post">
                        <img src="images/items/tea.png" class="center" alt="coffee iced" width="100" height="100">
                        <input type='submit' name='hot' value="Hot Drinks"
                               class="button-card btn btn-light center">
                    </form>
                </div>
            </div>
        </div>

        <div id="items-content">
            <table id="itemstable" width="50%" class="table-striped table-center">
                <?php
                if (isset($_POST['savoury'])) {
                    $result = mysqli_query($con, "SELECT * FROM items WHERE ItemType ='Savoury'");
                    if (mysqli_num_rows($result) != 0) {

                        echo " <h6 class='center'>Savoury Foods</h6>";
                        echo "<tr>";
                        echo "<th>Item</th>";
                        echo "<th>Cost</th>";
                        echo "<th>Calories</th>";
                        echo "</tr>";

                        while ($row = mysqli_fetch_array($result)) {
                            $id = ['ItemID'];

                            echo "<tr>";
                            echo "<td>" . $row['Item'] . "</td>";
                            echo "<td>" . $row['Cost'] . "</td>";
                            echo "<td>" . $row['Calories'] . "</td>";
                            echo "</tr>";
                        }
                    }
                }
                ?>
            </table>
        </div>

        <div id="items-content">
            <table id="itemstable" width="50%" class="table-striped table-center">
                <?php
                if (isset($_POST['sweet'])) {
                    $result = mysqli_query($con, "SELECT * FROM items WHERE ItemType ='Sweet'");
                    if (mysqli_num_rows($result) != 0) {

                        echo " <h6 class='center'>Sweet Foods</h6>";
                        echo "<tr>";
                        echo "<th>Item</th>";
                        echo "<th>Cost</th>";
                        echo "<th>Calories</th>";
                        echo "</tr>";

                        while ($row = mysqli_fetch_array($result)) {
                            $id = ['ItemID'];

                            echo "<tr>";
                            echo "<td>" . $row['Item'] . "</td>";
                            echo "<td>" . $row['Cost'] . "</td>";
                            echo "<td>" . $row['Calories'] . "</td>";
                            echo "</tr>";
                        }
                    }
                }
                ?>
            </table>
        </div>

        <div id="items-content">
            <table id="itemstable" width="50%" class="table-striped table-center">
                <?php
                if (isset($_POST['cold'])) {
                    $result = mysqli_query($con, "SELECT * FROM items WHERE ItemType ='Cold'");
                    if (mysqli_num_rows($result) != 0) {

                        echo " <h6 class='center'>Cold Drinks</h6>";
                        echo "<tr>";
                        echo "<th>Item</th>";
                        echo "<th>Cost</th>";
                        echo "<th>Calories</th>";
                        echo "</tr>";

                        while ($row = mysqli_fetch_array($result)) {
                            $id = ['ItemID'];

                            echo "<tr>";
                            echo "<td>" . $row['Item'] . "</td>";
                            echo "<td>" . $row['Cost'] . "</td>";
                            echo "<td>" . $row['Calories'] . "</td>";
                            echo "</tr>";
                        }
                    }
                }
                ?>
            </table>
        </div>

        <div id="items-content">
            <table id="itemstable" width="50%" class="table-striped table-center">
                <?php
                if (isset($_POST['hot'])) {
                    $result = mysqli_query($con, "SELECT * FROM items WHERE ItemType ='Hot'");
                    if (mysqli_num_rows($result) != 0) {

                        echo " <h6 class='center'>Hot Drinks</h6>";
                        echo "<tr>";
                        echo "<th>Item</th>";
                        echo "<th>Cost</th>";
                        echo "<th>Calories</th>";
                        echo "</tr>";

                        while ($row = mysqli_fetch_array($result)) {
                            $id = ['ItemID'];

                            echo "<tr>";
                            echo "<td>" . $row['Item'] . "</td>";
                            echo "<td>" . $row['Cost'] . "</td>";
                            echo "<td>" . $row['Calories'] . "</td>";
                            echo "</tr>";
                        }
                    }
                }
                ?>
            </table>
        </div>

        <hr style="border: 3px solid #2A84A0; margin-top: 3rem; margin-bottom: 3rem;"/>

        <br>
        <div class="row">
            <div class="column center">
                <br>
                <h3>SEARCH AN ITEM</h3>
                <hr style="border: 2px solid #89ADAE; width:10%">
                <p class="para-text-signup">Enter a key word to see if we have it on the menu!</p>
                <div class="center input-align">
                    <form action="items.php" method="post">
                        <input type="text" name="search" placeholder="Item Name"
                               style="margin-right: 15rem;">
                        <br>
                        <?php
                        if (isset($_POST['search'])) {
                            $search = $_POST['search'];

                            if ($search == "") {
                                echo "Please enter an Item to search";
                            } else {
                                $query1 = "SELECT * FROM items WHERE Item LIKE '%$search%'";
                                $query = mysqli_query($con, $query1);
                                $count = mysqli_num_rows($query);

                                if ($count == 0) {
                                    echo "There was no search results";
                                } else {
                                    while ($row = mysqli_fetch_assoc($query)) {

                                        echo $row['Item'];
                                        echo "<br>";
                                    }
                                }
                            }
                        }
                        ?>
                        <br>
                        <input type="submit" name="submit" value="Search" class="button-card btn btn-light">
                    </form>
                </div>
            </div>
            <div class="column center">
                <img src="images/items/menu.png" class="" alt="menu" width="500">
            </div>
        </div>


        <hr style="border: 3px solid #2A84A0; margin-top: 3rem; margin-bottom: 3rem;"/>


        <div>
            <h3 class="center">SEE WHAT'S AVAILABLE TO ORDER</h3>
            <hr style="border: 2px solid #89ADAE; width:10%">
            <p class="para-text-signup">Click to see what items are and aren't available on our menu</p>
            <div>
                <img src="images/items/menu_subheader.png" class="center" alt="items subheader" width="500"
                     height="125">
            </div>
            <div class="row">
                <div class="column" style="margin-left: 16rem">
                    <form action="items.php" method="post">
                        <input type='submit' name='available' value="Show what's available"
                               class="button-card btn btn-light center">
                    </form>
                </div>
                <div class="column">
                    <form action="items.php" method="post">
                        <input type='submit' name='unavailable' value="Show what's unavailable"
                               class="button-card btn btn-light center">
                    </form>
                </div>
            </div>
        </div>

        <div id="items-content">
            <table id="itemstable" width="60%" class="table-striped table-center">
                <?php
                if (isset($_POST['available'])) {
                    $result = mysqli_query($con, "SELECT * FROM items WHERE Availability ='1'");
                    if (mysqli_num_rows($result) != 0) {

                        echo " <h6 class='center'>Available Items</h6>";
                        echo "<tr>";
                        echo "<th>Item</th>";
                        echo "<th>Cost</th>";
                        echo "<th>Calories</th>";
                        echo "</tr>";

                        while ($row = mysqli_fetch_array($result)) {
                            $id = ['ItemID'];

                            echo "<tr>";
                            echo "<td>" . $row['Item'] . "</td>";
                            echo "<td>" . $row['Cost'] . "</td>";
                            echo "<td>" . $row['Calories'] . "</td>";
                            echo "</tr>";
                        }
                    }
                }
                ?>
            </table>
        </div>

        <div id="items-content">
            <table id="itemstable" width="60%" class="table-striped table-center">
                <?php
                if (isset($_POST['unavailable'])) {
                    $result = mysqli_query($con, "SELECT * FROM items WHERE Availability ='0'");
                    if (mysqli_num_rows($result) != 0) {

                        echo " <h6 class='center'>Unavailable Items</h6>";
                        echo "<tr>";
                        echo "<th>Item</th>";
                        echo "<th>Cost</th>";
                        echo "<th>Calories</th>";
                        echo "</tr>";

                        while ($row = mysqli_fetch_array($result)) {
                            $id = ['ItemID'];

                            echo "<tr>";
                            echo "<td>" . $row['Item'] . "</td>";
                            echo "<td>" . $row['Cost'] . "</td>";
                            echo "<td>" . $row['Calories'] . "</td>";
                            echo "</tr>";
                        }
                    }
                }
                ?>
            </table>
        </div>
        <hr style="border: 3px solid #89ADAE; width:50%; margin-top: 5rem;">
        <br><br>
        <h3>SORT ITEMS</h3>
        <p class="para-text-signup">Please click on the headings to see each header sorted from the selected field</p>
        <?php


        $orderBy = !empty($_GET["orderby"]) ? $_GET["orderby"] : "Item"; #Stating what is ascending first. Item in this case is
        $order = !empty($_GET["order"]) ? $_GET["order"] : "asc"; #Make everything start as ascending


        $sql = "SELECT * FROM items ORDER BY " . $orderBy . " " . $order; #Orderby field chosen and start as ascending

        $result = $con->query($sql);

        #everything starts as ascending when the headers is clicked
        $ItemOrder = "asc";
        $CategoryOrder = "asc";
        $CaloriesOrder = "asc";
        $CostOrder = "asc";

        #When item is clicked on, data will first ascend, as the order above states
        if ($orderBy == "Item" && $order == "asc") {
            $ItemOrder = "desc"; #If clicked the other way, item descends
            $sort_arrow_item = '⇣<br> 
            <div class="itemsTabletext">A-Z</div>'; #Subheader text and descending arrow
        } else {
            $sort_arrow_item = '⇡
            <br>
            <div class="itemsTabletext">Z-A</div>';

        }

        #When category is clicked on, data will first ascend, as the order above states
        if ($orderBy == "Category" && $order == "asc") {
            $CategoryOrder = "desc"; #If clicked the other way, category descends
            $sort_arrow_cat = '⇣ <br>
            <div class="itemsTabletext">Drink-Food</div>';
        } else {
            $sort_arrow_cat = '⇡<br>
            <div class="itemsTabletext">Food-Drink</div>';
        }

        #When calories is clicked on, data will first ascend, as the order above states
        if ($orderBy == "Calories" && $order == "asc") {
            $CaloriesOrder = "desc"; #If clicked the other way, calories descends
            $sort_arrow_cal = '⇣ <br>
            <div class="itemsTabletext">Low-High</div>';
        } else {
            $sort_arrow_cal = '⇡ <br>
            <div class="itemsTabletext">High-Low</div>';

        }

        #When cost is clicked on, data will first ascend, as the order above states
        if ($orderBy == "Cost" && $order == "asc") {
            $CostOrder = "desc"; #If clicked the other way, cost descends
            $sort_arrow_cost = '⇣<br>
            <div class="itemsTabletext">Low-High</div>';
        } else {
            $sort_arrow_cost = '⇡
            <br>
            <div class="itemsTabletext">High-Low</div>';
        }


        ?>
        <div id="content">
            <!--            table echos all data from the database-->
            <table width="100%" id="emp_table" class="table-striped">
                <tr class="tr_header">
                    <th>
                        <a href="?orderby=Item&order=<?php echo $ItemOrder; ?>">Item<?php echo $sort_arrow_item ?></a>
                    </th>
                    <th>
                        <a href="?orderby=Category&order=<?php echo $CategoryOrder; ?>">Category <?php echo $sort_arrow_cat ?></a>
                    </th>
                    <th>
                        <a href="?orderby=Calories&order=<?php echo $CaloriesOrder; ?>">Calories<?php echo $sort_arrow_cal ?></a>
                    </th>
                    <th>
                        <a href="?orderby=Cost&order=<?php echo $CostOrder; ?>">Cost<?php echo $sort_arrow_cost ?></a>
                    </th>
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <!--                    table to echo the headers-->
                    <tr>
                        <td><?php echo $row['Item']; ?></td>
                        <td><?php echo $row['Category']; ?></td>
                        <td><?php echo $row['Calories']; ?></td>
                        <td><?php echo $row['Cost']; ?></td>
                    </tr>
                    <?php
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
                        width="500" height="300" frameborder="0" style="border:0; margin-bottom: 1rem;"
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

