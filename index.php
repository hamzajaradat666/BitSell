<?php
require_once 'db_connect.php';
require_once 'session.php'; ?>
<!DOCTYPE html>
<html>
<!-------------------------------------------------------------------------------------------------------------------------------------------->

<head>
    <title>
        BitSell
    </title>

    <script src="js/script.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/style.css" type="text/css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>




</head>



<body class="">
    <!------------------------------------------------------------------------------------------------------------------------------------------>




    <div class="mybody">

       <?php require_once 'z_HEADER.php'?>

        <div class="categories">



        </div>



    <!-------------------------------------------------------------------------------------------------------------------------------------->


    <div class="">


        
        <hr>
        <hr>
        
        <div id="demo" class="container col-sm-7 carousel slide" data-ride="carousel" style="border:solid gray 5px; max-width:830px;">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
                <li data-target="#demo" data-slide-to="4"></li>
            </ul>
            <div class="carousel-inner bg-dark">
                <div class="carousel-item active ">
                    <div class="row">
                        <a class="col-sm-3" href="index.php">
                            <div><img class="img-responsive" src="css/car4.png"></div>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <a class="col-sm-3" href="index.php">
                            <div><img class="img-responsive" src="css/car2.png"></div>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <a class="col-sm-3" href="index.php">
                            <div><img class="img-responsive" src="css/car3.png"></div>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <a class="col-sm-3" href="index.php">
                            <div><img class="img-responsive" src="css/car4.png"></div>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <a class="col-sm-3" href="index.php">
                            <div><img class="img-responsive" src="css/car5.png"></div>
                        </a>
                    </div>
                </div>
            </div>
            <a style=" background-color: black;" class="carousel-control-prev car-control car_con" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a style=" background-color: black;" class=" carousel-control-next car-control car_con" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        
        
        
    </div>
        <hr>
        <hr>



    <div class="list-items">

        <h2>Deals recommended for you</h2>


        <div class="row">
            <?php
        require_once('items_api.php');
        include('script_path.php');
        require_once('pagination#.php');



        ?>



        </div>
    </div>

    <?php require_once('z_PAGES.php'); ?>


    <hr>

    <?php require_once 'z_FOOTER.php'?>

</div>

</body>

</html>
