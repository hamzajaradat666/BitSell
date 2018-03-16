<?php

require_once ('users_api.php');

if (!isset($_GET['id']))
    die('bad access');

$_id = (int)$_GET['id'];

if (!isset($_GET['c']) || $_GET['c'] != 1) {
    die('<a href= delete_user.php?id=' . $_id . '&c=1>Are you sure?</a>');
}


$user = bsf_users_get_by_id($_id);
if ($user == NULL) {
    bsf_db_close();
    die('bad user id'); }

$result = bsf_users_delete_by_id($_id);
bsf_db_close();
if ($result)
    die('success');
else
    die('failure');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

</html>


