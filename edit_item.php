<?php
require_once 'db_connect.php';
require_once 'session.php';
require_once 'items_api.php';

if ($_SESSION['user info'] == false || $_SESSION['user info']->isadmin != 1)
    header('location: admin_panel_items.php?status=failed');

if (!isset($_GET['id']))
    header('location: admin_panel_items.php?status=failed');

$_id = (int)$_GET['id'];

$item = bsf_items_get_by_id($_id);

if (!$item)
    header('location: admin_panel_items.php?status=failed');


?>
<!DOCTYPE html>
<html>
<!-------------------------------------------------------------------------------------------------------------------------------------------->

<head>
    <title>
        Edit - <?php echo $item->item_name ?>
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
            <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">

                <form class="form-inline mt-0 mt-md-0">


                    <a href="admin_panel.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-success text-light " type="button">Back</button></a>
                        <a href="admin_panel_users.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-primary text-light " type="button">Users</button></a>
                        <a href="admin_panel_items.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-danger text-light " type="button">Items</button></a>
                        <a href="items.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-warning text-light " type="button">User View</button></a>



                </form>
            </div>
        </nav>



    </header>



    <div class="justify-conten-center col-sm-12 bg-light">
        <h1>Add Item</h1>

        <form class="form-block row" method="get" action="update_item.php">
            <div class="form-group col-sm-2">

                <input type="text" class="form-control" id="" placeholder="Item ID" name="id" value="<?php echo $item->item_id ?>" >
            </div>
            <div class="form-group col-sm-2">

                <input type="text" class="form-control" id="" placeholder="Item Name" name="item_name" value="<?php echo $item->item_name ?>">
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
                            if($item->type == $types[$i]->type_id)
                            echo '<option selected value="'. $types[$i]->type_id .'">' . $types[$i]->type_name .'</option>';
                            else
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
                            if ($item->brand == $brands[$i]->brand_id)
                            echo '<option selected value="' . $brands[$i]->brand_id . '">' . $brands[$i]->brand_name . '</option>';
                            else
                                echo '<option value="' . $brands[$i]->brand_id . '">' . $brands[$i]->brand_name . '</option>';
                        }
                    }

                    ?>
                </select>

            </div>
            <div class="form-group col-sm-2">

                <input type="text" class="form-control" id="" placeholder="Quantity" name="quantity" value="<?php echo $item->quantity ?>">
            </div>
            <div class="form-group col-sm-2">
                <input type="text" class="form-control" id="" placeholder="Price" name="price" value="<?php echo $item->price ?>">
            </div>

            <div class="form-group col-sm-12">
            <textarea class="form-control" style="min-height:200px; max-width:82%;"id="exampleFormControlTextarea1" name="des"><?php echo $item->des ?></textarea>
            </div>

            <br>
            <br>
            <br>
            <button type="submit" class="btn btn-default"> Update</button>
        </form>

        <form method="post" class="form-inline" action="upload.php?item_id=<?php echo $item->item_id ?>" method="post" enctype="multipart/form-data">

            <input class="form-control-file" type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit" class="col-sm-1 btn btn-default">

        </form>
    </div>

</div>
</body></html>
