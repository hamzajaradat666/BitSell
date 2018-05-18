<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 4/24/2018
 * Time: 6:53 PM
 */
function bsf_brands_get($select = '*', $extra = '') {
    global $bs_db_handle;
    $query = sprintf("SELECT %s FROM `brands` %s", $select, $extra);
    $query_result = mysqli_query($bs_db_handle, $query);

    if (!$query_result)
        return NULL;

    $brands_count = mysqli_num_rows($query_result);
    if ($brands_count == 0)
        return NULL;
    $brands = array();
    for ($i = 0; $i < $brands_count; $i++)
        $brands[count($brands)] = mysqli_fetch_object($query_result);

    mysqli_free_result($query_result);

    return $brands;
}

function bsf_brand_get_by_id($id) {
    global $bs_db_handle;
    $id = (int)$id;
    if ($id == 0)
        return null;

    $query = sprintf("SELECT * FROM brands WHERE brand_id = '%d'", $id);
    $query_result = mysqli_query($bs_db_handle, $query);

    if (!$query_result)
        return null;

    if (mysqli_num_rows($query_result) == 0)
        return null;

    $brand = mysqli_fetch_object($query_result);


    return $brand;
}

function bsf_brand_delete_by_id($id) {
    global $bs_db_handle;
    $_id = (int)$id;
    if ($_id == 0)
        return FALSE;
    $brand = bsf_brand_get_by_id($_id);
    if (!$brand)
        return FALSE;

    $query = sprintf("DELETE FROM `brands` WHERE `brand_id`= %d", $_id);
    $query_result = mysqli_query($bs_db_handle, $query);

    if (!$query_result)
        return FALSE;

    return TRUE;
}

function bsf_brands_add($brand_name) {
    global $bs_db_handle;

    $name = mysqli_real_escape_string($bs_db_handle, strip_tags($brand_name));

    $query = sprintf("INSERT INTO `brands` VALUES(null, '%s')", $name);
    $query_result = mysqli_query($bs_db_handle, $query);
    if (!$query_result)
        return FALSE;

    return TRUE;

}