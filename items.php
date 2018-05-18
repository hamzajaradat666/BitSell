<?php require_once 'session.php';
      require_once 'db_connect.php';
?>
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



    <?php require_once('z_HEADER.php'); ?>


    
</div>


<!-------------------------------------------------------------------------------------------------------------------------------------->


<div>


<div class="list-items">

    <h2>Deals recommended for you</h2>


    <div class="row">
        <?php
        require_once('items_api.php');
        include('script_path.php');
        require_once('pagination4.php');

        ?>



    </div>

    <?php require_once('z_PAGES.php'); ?>

</div>

<hr>

<?php require_once('z_FOOTER.php'); ?>



</body>
</html>
