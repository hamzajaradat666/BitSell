<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 4/24/2018
 * Time: 6:04 PM
 */

function bsf_types_get($select = '*', $extra = '')
{
  global $bs_db_handle;
  $query = sprintf("SELECT %s FROM `types`", $select, $extra);
  $query_result = mysqli_query($bs_db_handle, $query);

  if (!$query_result)
    return NULL;

    $types_count = mysqli_num_rows($query_result);
    if ($types_count == 0) {
      return NULL;
    }
    $types = array();
    for ($i=0; $i < $types_count; $i++) {
      $types[count($types)] = mysqli_fetch_object($query_result);
    }

    @mysqli_free_result($query_result); # clear query result.

    return $types;

}

function bsf_type_get_by_id($id) {
    global $bs_db_handle;
    $id = (int)$id;
    if ($id == 0)
        return null;
    $query = sprintf("SELECT * FROM `types` WHERE `type_id` = '%d'", $id);
    $query_result = mysqli_query($bs_db_handle,  $query);

    if (!$query_result)
        return null;


    if (mysqli_num_rows($query_result) == 0)
        return null;

    $type = mysqli_fetch_object($query_result);

    @mysqli_free_result($query_result);
    return $type;

}

function bsf_type_delete_by_id($id) {
    global $bs_db_handle;
    $_id = (int)$id;
    if ($_id == 0)
        return FALSE;
    $type = bsf_type_get_by_id($_id);
    if (!$type)
        return FALSE;

    $query = sprintf("DELETE FROM `types` WHERE `type_id`= %d", $_id);
    $query_result = mysqli_query($bs_db_handle, $query);

    if (!$query_result)
        return FALSE;

    return TRUE;
}

function bsf_types_add($type_name) {
    global $bs_db_handle;

    $name = mysqli_real_escape_string($bs_db_handle, strip_tags($type_name));

    $query = sprintf("INSERT INTO `types` VALUES(null, '%s')", $name);

    $query_result = mysqli_query($bs_db_handle, $query);
    if (!$query_result)
        return FALSE;

    return TRUE;

}