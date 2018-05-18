<?php
require_once 'db_connect.php';
require_once 'images_api.php';
require_once 'items_api.php';
            // connect to database
           
            // define how many results you want per page
            $results_per_page = 2;
            // find out the number of results stored in database
                
                $items = bsf_items_get();
            if ($items == NULL)
                    die('Not items selected');

                $item_count = count($items);

                if ($item_count == 0)
                        die('count = 0');

            // determine number of total pages available
            $number_of_pages = ceil($item_count/$results_per_page);
            
            // determine which page number visitor is currently on
            
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            // determine the sql LIMIT starting number for the results on the displaying page
            $this_page_first_result = ($page-1)*$results_per_page;
            
            // retrieve selected results from database and display them on page
            /*$sql='SELECT * FROM items LIMIT ' . $this_page_first_result . ',' .  $results_per_page;*/
            
            for($i=$page*$results_per_page-$results_per_page;$i<$results_per_page*$page;$i++) {
                $images = @bsf_images_get('*', 'WHERE `item`=' . $items[$i]->item_id);

                $image = $images[0];
                
                if($i==count($items))break;
                $path = $image ? $image->image_path : 'css/logo.png';
                
                $item_block = '<div class="item-box col-sm-3">'.
                    '<a href="item_page.php?id=' . $items[$i]->item_id. '"><img class="item-img img-fluid" src="' . $path . '"></a>'.
                    '<br>'.
                    '<br>'.
                    "<p><small>". $items[$i]->item_name ."</small></p>".

                    '<p>'. $items[$i]->price .'$</p>'.
                    '<form method="post" action="add_to_cart.php?id='.$items[$i]->item_id.'"><button type="submit" class="btn btn-outline-primary btn-block">Add To Cart</button></div></form>';


                echo $item_block;

            } 
        
            ?>

