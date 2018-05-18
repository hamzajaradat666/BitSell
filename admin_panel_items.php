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

        


        <div class="justify-content-center col-sm-12 bg-light pb-3">
            <h1>Add Item</h1>

            <form class="form-block row" method="post" action="add_item.php">
                <div class="form-group col-sm-2">

                    <input type="text" class="form-control" id="" placeholder="Item Name" name="item_name">
                </div>
                <div class="form-group col-sm-2">


                    <select class="form-control" name="type">
                        <?php
                        require_once 'type_api.php';

                        $types = bsf_types_get();
                        if (!$types)
                            echo 'no types';
                        else {
                            for ($i=0; $i < count($types); $i++) {
                                echo '<option value="'. $types[$i]->type_id .'">' . $types[$i]->type_name .'</option>';
                            }}

                        ?>

                    </select>
                </div>
                <div class="form-group col-sm-2">


                  <select class="form-control" name="brand">
                      <?php
                      require_once 'brand_api.php';
                      $brands = bsf_brands_get();

                      if (!$brands)
                          echo 'no brands';
                      else {
                          for ($i = 0; $i < count($brands); $i++) {
                              echo '<option value="' . $brands[$i]->brand_id . '">' . $brands[$i]->brand_name . '</option>';
                          }
                      }

                      ?>
                  </select>

                </div>
                <div class="form-group col-sm-2">

                    <input type="text" class="form-control" id="" placeholder="Quantity" name="quantity">
                </div>
                <div class="form-group col-sm-2">
                    <input type="text" class="form-control" id="" placeholder="Price" name="price">
                </div>

                
                <div class="form-group col-sm-12">
                    <textarea class="form-control" name="des" placeholder="Descrption" style="min-height:200px; max-width:82%;" ></textarea>
                </div>


                <button type="submit" class=" container col-sm-1 btn btn-default">Add</button>
            </form>


        </div>

    </div>




    <br>
    <br>


    <div class="container">
        <?php

            include_once('items_api.php');
            include_once 'type_api.php';
            include_once 'brand_api.php';
            $items = bsf_items_get();
            if(!$items)
                die('no items');
            $items_count = count($items);

            echo '<table class="table table-hover text-secondry">';
            echo '<thead><tr><th>Item Id</th><th>Item Name</th><th>Type</th><th>Brand</th><th>Quantity</th><th>Price</th><<th>Edit</th><th>Remove</th></tr>';
            echo '</thead><tbody>';

            for ($i = 0; $i < $items_count; $i++) {
                $item = $items[$i];
                echo '<tr>';

                echo '<td>' . $item->item_id  . '</td>';
                echo '<td><a href="item_page.php?id='.$item->item_id.'">' . $item->item_name  . '</a></td>';
                echo '<td>' . bsf_type_get_by_id($item->type)->type_name. '</td>';
                echo '<td>' . bsf_brand_get_by_id($item->brand)->brand_name . '</td>';
                echo '<td>' . $item->quantity . '</td>';
                echo '<td>' . $item->price . '$</td>';
                echo '<td><a href="edit_item.php?id='. $item->item_id.'">Edit </a></td>';
                echo '<td><a href="delete_item.php?id='.$item->item_id.'"><span class="glyphicon glyphicon-remove-sign">Remove</span></a></td>';

                echo '</tr>';
            }
            echo '</tr></tbody></table>';


            ?>

    </div>










</body>

</html>
