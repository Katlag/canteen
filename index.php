<?php
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

$all_items_query = 'SELECT ItemID, Item FROM items';
$all_items_result = mysqli_query($con, $all_items_query);

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

</body>
<div class="background_img">
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

                    <li class="nav-item navactive">
                        <a class="nav-title" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item hover">
                        <a class="nav-title" href="items.php">ITEMS</a>
                    </li>
                    <li class="nav-item hover">
                        <a class="nav-title" href="sign_up.php">SIGN UP</a>
                    </li>
                    <li class="nav-item hover">
                        <a class="nav-title" href="order.php">ORDER</a>
                    </li>
                    <li class="nav-item dropdown hover ">
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
    <!--        <img class="background-img" src="images/home_page/coffee_bg.jpg" alt="coffee shop background">-->
    <h1>THE CANTEEN</h1>
    <h3 style="text-shadow: 1px 1px #373635"><br>────── Wellington Girls College ──────</h3>
</div>


<main>
    <div class="container">
        <div class="card-image-top mb-3">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <h2>ABOUT US</h2>
                    <div class="card-body">
                        <!--Orders form-->
                        <p class="para-text">
                            Welcome to the offical Wellington Girls College canteen website. Our number one priority at
                            the canteen is <b>you</b>! Our range of savoury and sweet foods contrast greatly to that of
                            our drinks and cold treats.
                            <br><br>
                            We open from 9:00am to 2:00pm from Monday to Friday to ensure
                            that you can buy the snack that you want for lunch! Come visit the canteen down by the quad
                            and try some of our items, all at an affordable price.
                            <br><br>
                            To order now, click the sign-up button down below so you can enter all the food and drink
                            items that
                            you would like to buy. Enjoy!

                            <br><br>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="images/home_page/canteen_img.png" class="card-img" alt="WGC canteen">
                </div>
            </div>
            <a href="sign_up.php" alt="Sign up" class="button-card-signup btn btn-light">Sign up here!</a>
        </div>
        <hr style="border: 4px solid #2A84A0; margin-top: 5rem; margin-bottom: 4rem;"/>

        <div class="card-image-top mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <div class="carousel">
                        <div id="canteen_carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="carousel" data-slide-to="0" class="active"></li>
                                <li data-target="carousel" data-slide-to="1"></li>
                                <li data-target="carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="images/home_page/sandwich.png"
                                         alt="Sandwich">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="images/home_page/nachos.png"
                                         alt="Nachos">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="images/home_page/soft_serve.png"
                                         alt="Soft serve">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="images/home_page/coke.png"
                                         alt="Coke">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#canteen_carousel" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#canteen_carousel" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <!--Drinks form-->
                        <h2>ITEMS INFORMATION</h2>
                        <p class="para-text">
                            Here at the Wellington Girls College canteen, we offer some of the best snacks and drinks,
                            all for an affordable price. Our job is to ensure you can find the best food/drink suited to
                            your
                            liking. To see all the information about the items we sell at the canteen, click the button
                            below to see more.
                            <br><br>
                        </p>
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
                            <input type="submit" name="item_button" value="Show the item information"
                                   class="button-card btn btn-light">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <hr style="border: 4px solid #2A84A0; margin-top: 4rem; margin-bottom: 3rem;"/>

        <h2>SIGN UP TO ORDER</h2>
        <div>
            <img src="images/home_page/signup_subheader.png" class="center" alt="items subheader" width="500"
                 height="125">
        </div>
        <div class="card-image-top mb-3">
            <div class="row no-gutters">
                <div class="card-body center">
                    <!--Orders form-->
                    <p class="para-text">
                        Before you order, please sign up and enter your first and last name so we can keep track of your
                        order. Thanks!
                        <br><br>
                        ↓↓↓
                    </p>
                    <a href="sign_up.php" alt="Sign up" class="button-card btn btn-light">Sign up here!</a>
                </div>
            </div>
        </div>
    </div>
</main>


<div class="page-footer">
    <div class="container">
        <div class="row py-4 d-flex align-items-center">
            <div class="text-center text-md-left">
                <!--                <h4 class="mb-0">Get in contact with us for more information</h4>-->
            </div>
        </div>
    </div>


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
                       href="https://www.facebook.com/CanteenLady">Contact the
                        Canteen</a>
                </p class="footer-text">
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