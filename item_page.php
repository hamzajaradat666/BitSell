<?php
require_once 'db_connect.php';
require_once 'session.php';
require_once 'images_api.php';
if (!isset($_GET['id']))
    die('bad access1');

$_id = (int)$_GET['id'];
if ($_id == 0)
    die('bad access2');
require_once ('items_api.php');

$item = bsf_items_get_by_id($_id);


if ($item == NULL)
    die('bad user id');

$images = bsf_images_get('*', 'WHERE `item`=' . $item->item_id);
$image = $images[0];


?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>
            <?php echo $item->item_name?> - profile</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">




        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="css/style.css" type="text/css">

    </head>

    <body class="">

        <?php require_once('z_HEADER.php'); ?>

        <div class="mybody">


                <div class="row">
                    <div class="container col-sm-5">

                        <p>
                            <?php echo '<h1>'.$item->item_name.'</h1>'?>
                        </p>
                        <hr>
                        <img class=" img-responsive container w-75" src="<?php  echo $image ? $image->image_path : 'css/logo.png'?>">
                        <hr>
                        <br>
                        <br>
                        <br>
                        <br>
                        <?php   
    

                                if($item->quantity == 0)
                                    echo '<h2 style="color:Red">Out of Stock</h2>';
                                else
                                    echo '<h2 style="color:Green">In Stock</h2>';
                                   
                                   
                                    
                        ?>
                        <h1 class="fancy_header">Specefications</h1>
                        
                        <?php
                        include_once('type_api.php');
                        include_once('brand_api.php');
                        $text = $item->des;
                        $type  = bsf_type_get_by_id($item->type);
                        $brand = bsf_brand_get_by_id($item->brand);
                        echo '<table class="container desc-table" min-height:50px; min-width:300px;">
                        <tr><td>Description</td><td><pre>'. $text.'</pre></td></tr>
                        <tr><td>Type<br></td><td>'.  $type->type_name . '</td></tr>
                        <tr><td>Brand</td><td>'. $brand->brand_name.'</td></tr>
                        <tr><td>Price</td><td>'. $item->price.'$</td></tr>
                        <tr><td>quantity</td><td>'. $item->quantity. '</td></tr>
                        
                        
                        
                        </table>'

                        ?>
                        <?php
                        require_once('items_api.php');

                        $items = bsf_items_get('*', 'WHERE type=' . $item->type);
                        if ($items == NULL)
                            die('Not items selected');

                        $count = count($items);

                        if ($count == 0)
                            die('count = 0');?>
                        <br>
                        <form method="post" action="add_to_cart.php?id=<?php echo $item->item_id; ?>">
                            <label>Quantity</label><input class="col-sm-2" type="number" name="qty">
                            <button type="submit" class="btn btn-outline-primary btn-block">Add To Cart</button>
                        </form>

                    </div>



                    <div class="col-sm-12">

                        <div class="list-items">

                            <h2>Deals recommended for you</h2>


                            <div class="row">

                                <?php
                                $images2 = array();
                                for ($i = 0; $i < $count; $i++) {
                                    $images2 = bsf_images_get('*', 'WHERE `item`=' . $items[$i]->item_id);
                                    $image2 = $images2[0];
                                    ?>
                                    <div class="item-box col-sm-3">
                                        <form method="post" action="add_to_cart.php?id=<?php echo $items[$i]->item_id; ?>">
                                            <a href="item_page.php?id=<?php echo $items[$i]->item_id ?>'"><img class="item-img img-fluid" src=" <?php echo $image2 ? $image2->image_path : 'css/logo.png' ?>"></a>
                                            <br>
                                            <br>
                                            <p><small><?php echo $items[$i]->item_name; ?></small></p>
                                            <p><?php echo $items[$i]->price; ?>$</p>
                                            <button type="submit" class="btn btn-outline-primary btn-block">Add to Cart</button>
                                        </form>
                                    </div>

                                <?php } ?>
                                


                            </div>
                        </div>

                    </div>
                </div>


        </div>
    </body>


    <?php require_once('z_FOOTER.php'); ?>

    </html>
