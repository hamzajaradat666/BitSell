<?php
require_once 'db_connect.php';
require_once 'session.php';

if ($_SESSION['user info'] == false)
    header('Location: index.php');


require_once ('users_api.php');

if (!isset($_GET['id']))
    die('bad access');

$_id = (int)$_GET['id'];
if($_SESSION['user info']->isadmin != 1) {
    if ($_SESSION['user info']->user_id != $_id)
        header('Location: index.php?status=failed');
}




$user = bsf_users_get_by_id($_id);
if ($user == NULL) {
    bsf_db_close();
    die('bad user id'); }

$result = bsf_users_delete_by_id($_id);
bsf_db_close();
if ($result)
    header('Location: admin_panel_users.php?id='. $_SESSION['user info']->user_id .'status=success');
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


a