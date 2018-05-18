<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 5/1/2018
 * Time: 11:27 PM
 */

function bsf_images_get($select = '*', $extra = '') {
    global $bs_db_handle;
    $query = sprintf("SELECT %s FROM `images` %s", $select, $extra);

    $query_result = mysqli_query($bs_db_handle, $query);
    if (!$query_result)
        return NULL;

    $images_count = mysqli_num_rows($query_result);

    if ($images_count == 0)
        return NULL;

    $images = array();
    for ($i = 0; $i < $images_count; $i++)
        $images[count($images)] = mysqli_fetch_object($query_result);

    @mysqli_free_result($query_result);

    return $images;
}

function bsf_images_get_by_id($id) {
    $_id = (int)$id;
    if ($_id == 0)
        return NULL;

    $images = bsf_images_get('*', 'WHERE `image_id`=' . $_id);
    $image = $images[0];

    if (!$image)
        return NULL;
    return $image;


}

function bsf_images_add($image_path, $item) {
    global $bs_db_handle;
    $item = (int)$item;
    if ($item == 0)
        return FALSE;
    $query = sprintf("INSERT INTO `images` VALUES(null, '%s', %d)", $image_path, $item);
    $query_result = mysqli_query($bs_db_handle, $query);

    if (!$query_result)
        return FALSE;

    return TRUE;
}

function bsf_images_delete_by_id($id) {
    global $bs_db_handle;
    $id = (int)$id;

    if ($id == 0)
        return FALSE;

    $image = bsf_images_get_by_id($id);

    if (!$image)
        return FALSE;
    unlink($image->image_path);
    $query = sprintf("DELETE FROM `images` WHERE `image_id`= %d", $id);
    $query_result = mysqli_query($bs_db_handle, $query);
    if (!$query_result)
        return FALSE;

    return TRUE;
}