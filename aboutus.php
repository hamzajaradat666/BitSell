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



<body class="container col-sm-9">
    <!------------------------------------------------------------------------------------------------------------------------------------------>


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
                    <span class="caret"> <p><?php echo $user->username?></p></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Log Out</a></li>
                        </ul>
                    </div>
                    
                    
                        
                        
                   

                </form>
            </div>
        </nav>
    </header>




    

<hr>
    
    
    <div class="container">
            
        <h2> We seek to make and new electronic hardware and any requiered sofware for them a place to be easy reachable, <br> Dont bother reading about us GO SHOPPING !!</h2>    
        
    </div>
    
<hr>

<!--Footer-->
<footer class="bg-outline-primary page-footer font-small red pt-4 mt-4">

    <!--Footer Links-->
    <div class="container-fluid text-center text-md-left">
        <div class="row">

            <!--First column-->
            <div class="col-md-6">
                <h5 class="text-uppercase">Bitsell</h5>
                <p>Here you can use rows and columns here to organize your footer content.</p>
            </div>
            <!--/.First column-->

            <!--Second column-->
            <div class="col-md-6">
                <h5 class="text-uppercase">Other Pages</h5>
                <ul class="list-unstyled">
                    
                    <li><a href="index.php">Home</a></li>

                </ul>
            </div>
            <!--/.Second column-->
        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            © 2018 Copyright: <a href="index.php"> Bitsell.com </a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->


    </body>

</html>
