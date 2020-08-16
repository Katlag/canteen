<?php
#connection to database
$con = mysqli_connect("localhost", "lagoutariska", "bluefrog55", "lagoutariska_canteen");

#query selects ItemID and Item from the items table
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

<body>
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
                        <a class="nav-title" href="items.php">MENU</a>
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
    <h1>THE CANTEEN</h1>
    <h3 style="text-shadow: 1px 1px #373635"><br>────── Wellington Girls College ──────</h3>
</div>

<main>
    <div class="container">
        <br>
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
                                    <img class="d-block w-100" src="images/home_page/canteen_img.png"
                                         alt="wgc canteen">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="images/home_page/wgc_kids.png"
                                         alt="kids">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="images/home_page/sandwich.png"
                                         alt="sandwich">
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
                        <h2>ABOUT US</h2>
                        <p class="para-text" style="padding-left: 2rem">
                            Welcome to the offical Wellington Girls College canteen website. Our number one priority at
                            the canteen is <b>you</b>! Our range of savoury and sweet foods contrast greatly to that of
                            our drinks and cold treats.
                            <br><br>
                            We open from 9:00am to 2:00pm from Monday to Friday to ensure
                            that you can buy the snack that you want for lunch! Come visit the canteen down by the quad
                            and try some of our items, all at an affordable price. Enjoy!
                            <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <hr style="border: 3px solid #2A84A0; margin-top: 4rem; margin-bottom: 3rem;"/>

        <br>
        <h2>OUR MENU</h2>
        <hr style="border: 2px solid #89ADAE; width:10%">
        <p class="para-text-signup center">Find out what we sell at the canteen</p>

        <div class="card-deck">
            <div class="card">
                <img src="images/items/hamburger.png" class="center" alt="hamburger" width="100" height="100">
                <div class="card-body">
                    <h3 class="card-title">Savoury</h3>
                    <p><small class="text-muted center">Nothing over $4.00</small>
                    </p>
                    <p class="card-text center">Our savoury foods range from anything between pizzas, burgers, corndogs
                        and many more. Don't forget our healthy options such as wraps and sandwiches!</p>
                    <a href="items.php" class="button-card btn btn-light center">Find out more</a>
                </div>
            </div>
            <div class="card">
                <img src="images/items/donut.png" class="center" alt="donut" width="100" height="100">
                <div class="card-body">
                    <h3 class="card-title">Sweet</h3>
                    <p><small class="text-muted center">Nothing over $3.50</small></p>
                    <p class="card-text center">Treat yourself to some of our sweet treats at the canteen. Our sweet
                        foods range from a variety of slices, jelly's and ice-creams. Be sure to try them out!</p>
                    <a href="items.php" class="button-card btn btn-light center">Find out more</a>
                </div>
            </div>
            <div class="card">
                <img src="images/items/iced_coffee.png" class="center" alt="iced coffee" width="100" height="100">
                <div class="card-body">
                    <h3 class="card-title">Drinks</h3>
                    <p><small class="text-muted center">Nothing over $3.00</small></p>
                    <p class="card-text center">Sit down and relax with a drink from our menu. Our drinks range from
                        cold to hot - whether that be a or a lemon tea, hot-chocolate or a refreshing iced coffee!</p>
                    <a href="items.php" class="button-card btn btn-light center">Find out more</a>
                </div>
            </div>
        </div>

        <br>
        <hr style="border: 3px solid #2A84A0; margin-top: 5rem; margin-bottom: 4rem;"/>


        <br><br>
        <h2>GET STARTED</h2>
        <hr style="border: 2px solid #89ADAE; width:10%">
        <p class="para-text-signup center">Sign up to order, or order now if you've already signed up!</p>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <img src="images/home_page/sign_up.png" class="center" alt="laptop" width="450" height="300">
                        <p class="para-text center">Before ordering, please sign up and enter your full name and email
                            address so that we can keep track of your order!</p>
                        <a href="sign_up.php" class="button-card btn btn-light center">Sign up now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <img src="images/home_page/order_pic.png" class="center" alt="order" width="450" height="300">
                        <p class="para-text center">Already signed up? Fill out our order form with your name and item
                            of choice.</p>
                        <a href="order.php" class="button-card btn btn-light center">Order now</a>
                    </div>
                </div>
            </div>
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