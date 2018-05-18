<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 4/27/2018
 * Time: 9:36 PM
 */
require_once 'db_connect.php';
require_once 'items_api.php';
require_once 'type_api.php';
require_once 'images_api.php';
if (!isset($_GET['type']) || empty($_GET['type']))
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=fail');

$search_query = (int)$_GET['type'];

$search_result = bsf_items_get('*', "WHERE `type`=" . $search_query);
if (!$search_result) {
    header('Location: index.php?status=no_result');
    bsf_db_close();
}

?>
<html>
<head>
    <title>
        Search - <?php echo $search_query; ?>
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
    <?php require_once 'session.php'?>
    <?php require_once 'z_HEADER.php'?>
   <h3><?php echo bsf_type_get_by_id($_GET['type'])->type_name?></h3>
    <div class="row">
<?php
$count = count($search_result);

if ($count == 0) {
    header('Location: index.php?status=no_result');
    bsf_db_close();
}

for ($i = 0; $i < $count; $i++) {
    $images = bsf_images_get('*', 'WHERE `item`=' . $search_result[$i]->item_id);
    $image = $images[0];
    $path = $image ? $image->image_path : 'css/logo.png';
    
        $item_block = '<div class="item-box col-sm-3">'.
                    '<a href="item_page.php?id=' . $search_result[$i]->item_id. '"><img class="item-img img-fluid" src="' . $path . '"></a>'.
                    '<br>'.
                    '<br>'.
                    "<p><small>". $search_result[$i]->item_name ."</small></p>".

                    '<p>'. $search_result[$i]->price .'$</p>'.
                    '<form method="post" action="add_to_cart.php?id='.$search_result[$i]->item_id.'"><button type="submit" class="btn btn-outline-primary btn-block">Add To Cart</button></div></form>';


                echo $item_block;      
    
        ?>
    
    

<?php } ?>

    </div>

    <?php require_once 'z_FOOTER.php'?>
</body>

</html>
