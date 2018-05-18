<?php
require_once 'db_connect.php';
require_once 'session.php';
require_once 'users_api.php';

if (!isset($_GET['id']) || $_SESSION['user info'] == false)
    header('location: index.php?status=failed');

$_id = (int)$_GET['id'];
if ($_id == 0)
    header('location: index.php?status=failed');
$user = bsf_users_get_by_id($_id);
if (!$user)
    header('location: index.php?status=failed');

if ($user->isadmin != 1 || $user->user_id != $_SESSION['user info']->user_id)
    header('location: index.php?status=failed');






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
                <nav class="navbar navbar-expand-md navbar-dark  bg-dark">

                    <a class="navbar-brand col-sm-1" href="index.php">
                    <img class="navlogo" src="css/logo3.png" width="200px;">
                </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                    <div class="d-flex justify-content-end collapse navbar-collapse" id="navbarCollapse">


                        <form class="form-inline mt-0 mt-md-0">


                            <a href="admin_panel.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-success text-light " type="button">Back</button></a>
                            <a href="admin_panel_users.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-primary text-light " type="button">Users</button></a>
                            <a href="admin_panel_items.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-danger text-light " type="button">Items</button></a>
                            <a href="admin_panel_brand_type.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-secondary text-light " type="button">Catagories</button></a>
                            <!--<a href="items.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-warning text-light " type="button">User View</button></a>-->




                        </form>
                    </div>
                </nav>



            </header>




            <div class="col-sm-12 bg-light pb-3">
                <h1>Add New Type</h1>

                <form class="form-inline" method="get" action="add_type.php">
                    <div class="form-group">

                        <input type="text" class="form-control" id="" placeholder="Type Name" name="name">
                    </div>
                    
                    <button type="submit" class="col-sm-1 btn btn-default">Add</button>
                </form>


            </div>

        </div>




        <br>
        <br>


        <div class="row container">   
            
            <?php
            include_once('items_api.php');
            include_once 'type_api.php';
            include_once 'brand_api.php';
            $types = bsf_types_get();
            $types_count = count($types);
            if(!$types || $types_count == 0)
                echo 'no types';
            else {
                echo '<table class="col-sm-12 table table-hover text-secondry">';
                echo '<thead><tr><<th>Type</th><th>Remove</th><th># of items</th></tr>';
                echo '</thead><tbody>';

                for ($i = 0; $i < $types_count; $i++) {
                    $type = $types[$i];
                    $t = bsf_items_get('*', 'WHERE `type`=' . $type->type_id );
                    if (!$t)
                        $c = 0;
                    else
                        $c = count($t);
                    echo '<tr>';
                    echo '<td>' . $type->type_name . '</td>';
                    echo '<td><a href="delete_type.php?id=' . $type->type_id . '"><span class="glyphicon glyphicon-remove-sign">Remove</span></a></td>';
                    echo '<td>' . $c  .'</td>';


                    echo '</tr>';
                }
                echo '</tr></tbody></table>';

            }
            ?>
            
            
            <div class="col-sm-12 bg-light pb-3">
                <h1>Add New Brand</h1>

                <form class="form-inline" method="get" action="add_brand.php">
                    <div class="form-group">

                        <input type="text" class="form-control" id="" placeholder="Brand Name" name="name">
                    </div>
                    
                
                    <button type="submit" class="col-sm-1 btn btn-default">Add</button>
                </form>


            </div>
            
            
            <?php
        
        
            echo '<table  class="col-sm-12 table table-hover text-secondry">';
            echo '<thead><tr><<th>Brand</th><th>Remove</th><th># of items</th></tr>';
            echo '</thead><tbody>';
            $brands = bsf_brands_get();
            $brands_count = count($brands);
            if (!$brands || $brands_count == 0)
                echo 'no brands';
            else {

                for ($i = 0; $i < $brands_count; $i++) {
                    $brand = $brands[$i];
                    $b = bsf_items_get('*', 'WHERE `brand`=' . $brand->brand_id);
                    if (!$b)
                        $c = 0;
                    else
                        $c = count($b);
                    echo '<tr>';
                    echo '<td>' . $brand->brand_name . '</td>';
                    echo '<td><a href="delete_brand.php?id=' . $brand->brand_id . '"><span class="glyphicon glyphicon-remove-sign">Remove</span></a></td>';
                    echo '<td>' . $c . '</td>';

                    echo '</tr>';
                }
                echo '</tr></tbody></table>';

            }
            ?>
            
            

        </div>
            
            
        

        










    </body>

    </html>
