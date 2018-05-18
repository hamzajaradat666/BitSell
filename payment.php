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

    <?php require_once 'session.php'?>
    <?php require_once 'z_HEADER.php'?>




    <div class="mybody">


        <div class="row">

            <div class="col-sm-4">
                <h3>Enter Payment Options:</h3><img src="css/credit-cards-beacon._CB385401666_.gif">
            </div>


            <div class="container">
                
                <form action="">
                    <div class="form-group">
                        <label for="">Name On Card:</label>
                        <input type="text" class="form-control" id="" placeholder="" name="">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Card Number:</label>
                        <input type="text" class="form-control" id="" placeholder="" name="">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Expairation Date:</label>
                        <input type="text" class="form-control" id="" placeholder="" name="">
                    </div>
                    
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>


        </div>

    </div>


    <!-------------------------------------------------------------------------------------------------------------------------------------->


    <br>
    <hr>



</body>

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
                    <li><a href="aboutus.html">About Us</a></li>

                </ul>
            </div>
            <!--/.Second column-->
        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            © 2018 Copyright: <a href="index.html"> Bitsell.com </a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->




</html>
