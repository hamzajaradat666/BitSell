<?php

# returns selected items as an array of objects ($items)
function bsf_items_get($select = '*', $extra = '') {
    global $bs_db_handle;
    $query = sprintf("SELECT %s FROM `items` %s", $select, $extra);
    $query_result = mysqli_query($bs_db_handle, $query);
    $items_count = mysqli_num_rows($query_result);

    if(!$query_result)
        return NULL;

    if ($items_count == 0)
        return NULL;

    $items = array();
    for ($i = 0; $i < $items_count; $i++) {
        $items[count($items)] = mysqli_fetch_object($query_result); # return a first row as an Object.
       }

    @mysqli_free_result($query_result); # clear query result.

    return $items;

}
# get item object by id from items table in bit_sell database
function bsf_items_get_by_id($item_id) {
    $item_id = (int)$item_id;
    if($item_id == 0)
        return NULL;

    $result = bsf_items_get('*', "WHERE `item_id` = " . $item_id);

    if (!$result)
        return NULL;

    $item = $result[0];
    return $item;
}
# add a new item to items table in bit_sell database
function bsf_items_add($price, $brand, $type, $in_stock, $item_name) {
    global $bs_db_handle;

    $new_instock    = (int)$in_stock;
    $new_price      = (float)$price;
    $new_brand      = (int)$brand;
    $new_type       = (int)$type;
    if($in_stock != 0 && $in_stock != 1)
        $new_instock = 0;

    if(empty($price) || empty($brand) || empty($type) || empty($item_name))
        return false;

    $new_item_name  = mysqli_escape_string($bs_db_handle, strip_tags($item_name));

    $query = sprintf("INSERT INTO `items` VALUES(NULL, %f, %d, %d, %d , '%s')", $new_price, $new_brand, $new_type, $new_instock, $new_item_name);
    $query_result = mysqli_query($bs_db_handle, $query);
    echo $query;
    if(!$query_result)
        return false;

    return true;


}
# delete an item from items table in bit_sell database (return true if item deleted)
function bsf_items_delete_by_id($item_id) {
    global $bs_db_handle;

    $item_id = (int)$item_id;
    if($item_id == 0) # secure

        return false;

    $query = sprintf("DELETE FROM `items` WHERE `item_id` = %d", $item_id);
    $query_result = mysqli_query($bs_db_handle, $query);

    if(!$query_result)
        return false;

    return true;

}
# update data of a specific item (by id) (all parameters is optimal expect $item_id (return true if item updated)
function bsf_items_update($item_id, $price = null, $brand = null, $type = null, $in_stock = -1, $item_name = null) {
    global $bs_db_handle;
    $item_id = (int)$item_id;
    if ($item_id == 0)
        return false;

    $new_instock = (int)$in_stock;

    $item = bsf_items_get_by_id($item_id);
    if(!$item)
        return false;


    if(empty($price) && empty($brand) && empty($type) && empty($item_name))
        return false;

    $fields = array();
    if($new_instock == -1)
        $new_instock = (int)$item -> in_stock;

    $fields[count($fields)] = "`in_stock` = $new_instock";

    if(!empty($price)) {
        $new_price = (float)$price;
        if($new_price == 0)
            return false;
        $fields[count($fields)] = "`price` = $new_price";
    }

    if(!empty($brand)) {
        $new_brand = (int)$brand;
        if ($new_brand == 0)
            return false;
        $fields[count($fields)] = "`brand` = $new_brand";
    }

    if(!empty($type)) {
        $new_type = (int)$type;
        if($new_type == 0)
            return false;
        $fields[count($fields)] = "`type` = $new_type";
    }

    if(!empty($item_name)) {
        $new_item_name = mysqli_escape_string($bs_db_handle, strip_tags($item_name));
        $fields[count($fields)] = "`item_name` = '$new_item_name'";
    }

    $query = "UPDATE `items` SET ";
    if (count($fields) == 1) {
        $query .= $fields[0] . "WHERE `item_id` = " . $item_id;
        $query_result = mysqli_query($bs_db_handle, $query);
        if(!$query_result)
            return false;
        else
            return true;
    }

    for($i = 0; $i < count($fields); $i++) {
        $query .= $fields[$i];

        if($i != count($fields) - 1)
            $query .= ", ";
    }

    $query .= "WHERE `item_id` = " . $item_id;
    $query_result = mysqli_query($bs_db_handle, $query);

    if(!$query_result)
        return false;
    else
        return true;

}

include('db_connect.php');


?>