<?php
require_once 'db_connect.php';
require_once 'items_api.php';
require_once 'cart_session.php';
$items = $_SESSION['cart'];
$cartitems = explode(',', $items);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css" />



</head>

<body class="bg-dark">
    <img src="css/bg-log2.jpg" style="z-index:-99; position:fixed; margin-top:-5%;">


<br>
    
    <div class="container text-center" style="margin-top: 50px;">

        <div class="col-md-5">
            <a href="index.php"><img class="img-responsive" src="css/logo4.png" style="posistion:absolute"></a>

        </div>

        <div class="col-md-7 text-left">
            <ul>
                <li class="row list-inline columnCaptions">
                    <span>QTY</span>
                    <span>ITEM</span>
                    <span>Price</span>
                </li>
                <?php
                $total = 0;


                foreach($cartitems as $key => $id) {
                    $sql = bsf_items_get_by_id($id);
                    if (!$sql) {
                        //echo 'No items in cart';
                    } else {
               echo '<li class="row">
                        <span class="quantity">1</span>
                        <span class="itemName">'. $sql->item_name .'</span>
                        <span class="popbtn"><a class="	glyphicon glyphicon-remove" href="delcart.php?remove='. $key .'"></a></span>
                        <span class="price">$'. $sql->price .'</span>
                    </li>'; }?>
                <?php
                $total = $total + @$sql->price;
                } ?>
                <span class="price"><?php echo "TOTAL: $" . $total ?> </span>

            </ul>
        </div>

    </div>
    <!-- -->
<?php 
    
   
        
   echo '<table id="cart" class="table table-hover table-condensed">
       
            <tr>
                <td><a href="index.php" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>';
                 if($sql)    
                echo '<td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>';
            echo '</tr>
    </table>';
    
    
    ?>


    <!-- The popover content -->

 <!--   <div id="popover" style="display: none">
        <a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
        <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
    </div>-->

    <!-- JavaScript includes -->

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/customjs.js"></script>

</body>

</html>
