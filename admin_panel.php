<?php
require_once 'db_connect.php';
require_once 'session.php';
require_once 'users_api.php';
if (!isset($_GET['id']) || $_SESSION['user info'] == false)
    header('location: index.php?status=failed1');

$_id = (int)$_GET['id'];
if ($_id == 0)
    header('location: index.php?status=failed2');
$user = bsf_users_get_by_id($_id);
if (!$user)
    header('location: index.php?status=failed3');

if ($user->isadmin != 1 || $user->user_id != $_SESSION['user info']->user_id)
    header('location: index.php?status=failed4');






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



<body>
    <!------------------------------------------------------------------------------------------------------------------------------------------>



    <div class="mybody">



        <header>
            <nav class="navbar navbar-expand-md navbar-dark  bg-dark" >

                <a class="navbar-brand" href="index.php">
                <img class="w-50 navlogo" src="css/logo3.png">
            </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse text-secondary justify-content-end" id="navbarCollapse">
                    <h1>Admin Panel</h1>
                </div>
            </nav>



        </header>

          <img src="css/bg-log3.jpg" style="position:fixed">      
        <div class="row container justify-content-center" style="margin-left:10%; margin-top:5%;">
        
            <button class="col-sm-6 btn btn-outline-primary ml-5 mb-5"><a href="admin_panel_users.php?id=<?php echo $_SESSION['user info']->user_id ?>"><div class="rounded text-light">
                
                <h1 class="text-center">Users</h1>
                
                </div></a></button>
            
            
            <button class="col-sm-6 btn btn-outline-danger ml-5 mb-5"><a href="admin_panel_items.php?id=<?php echo $_SESSION['user info']->user_id ?>"><div class="rounded text-light">
                
                <h1 class="text-center">Items</h1>
                
                </div></a></button>
            
            <!--<button class="col-sm-6 btn btn-outline-warning ml-5 mb-5"><a href="admin_panel_items.php?id=<?php echo $_SESSION['user info']->user_id ?>"><div class="rounded text-light">
                
                <h1 class="text-center">User View</h1>
                
                </div></a></button>-->
            
             <button class="col-sm-6 btn btn-outline-secondary ml-5 mb-5"><a href="admin_panel_brand_type.php?id=<?php echo $_SESSION['user info']->user_id ?>"><div 
            class="rounded text-light">
                
                <h1 class="text-center">Catagories</h1>
                
                </div></a></button>
            
            <button class="col-sm-6 btn btn-outline-success ml-5 mb-5"><a href="index.php?id=<?php echo $_SESSION['user info']->user_id ?>"><div 
            class="rounded text-light">
                
                <h1 class="text-center">Home Page</h1>
                
                </div></a></button>
            
           
        
        
        </div>
        
        
        
        
        
        


    </div>



 

</body>

</html>
