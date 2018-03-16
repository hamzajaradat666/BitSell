<?php

if (!isset($_GET['id']))
    die('bad access1');

$_id = (int)$_GET['id'];
if ($_id == 0)
    die('bad access2');
require_once ('items_api.php');

$item = bsf_items_get_by_id($_id);
bsf_db_close();

if ($item == NULL)
    die('bad user id');

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>
            <?php echo $item->item_name?> - profile</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/style.css" type="text/css">


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>


    </head>

    <body class="col-sm-12">

        <header>
            <nav class="navbar navbar-expand-md navbar-ligth  bg-ligth">
                <a class="navbar-brand col-sm-1" href="index.php"><img class="w-100 navlogo" src="css/logo.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <form class="form-inline mt-2 mt-md-0">

                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">

                        <button class="btn btn-outline-primary  my-2 my-sm-0" type="submit" style="margin-left: 5px">Search</button>

                        <a href="cart.php" style="margin-left: 5px">
                    <span class="caret">Shopping Cart<img src="css/shopcart.png" width="50px;"></span></a>


                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" style="margin-left: 5px" type="button" data-toggle="dropdown">
                        <span class="caret">User Name</span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Log Out</a></li>
                            </ul>
                        </div>


                    </form>
                </div>
            </nav>
        </header>

        <div class="mybody">

            <div class="categories">

                <div class="dropdown">

                    <div class="row">

                        <div>

                            <button class="cata-links btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="caret">PC's & Desktops</span></button>


                            <ul class="dropdown-styles dropdown-menu">
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="#">Log Out</a></li>
                            </ul>

                        </div>

                        <div>

                            <button class="cata-links btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="caret">Hardware & Software</span></button>


                            <ul class="dropdown-styles dropdown-menu">
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="#">Log Out</a></li>
                            </ul>

                        </div>
                        <div>

                            <button class="cata-links btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="caret">PC's & Desktops</span></button>


                            <ul class="dropdown-styles dropdown-menu">
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="#">Log Out</a></li>
                            </ul>

                        </div>
                        <div>

                            <button class="cata-links btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="caret">PC's & Desktops</span></button>


                            <ul class="dropdown-styles dropdown-menu">
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="#">Log Out</a></li>
                            </ul>

                        </div>
                        <div>

                            <button class="cata-links btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="caret">PC's & Desktops</span></button>


                            <ul class="dropdown-styles dropdown-menu">
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="#">Log Out</a></li>
                            </ul>

                        </div>





                    </div>
                </div>

            </div>


            <p>Item name:
                <?php echo $item->item_name?>
            </p>
            <p>Price:
                <?php echo $item->price?>$</p>



        </div>
    </body>


    </html>
