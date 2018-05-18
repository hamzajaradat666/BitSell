<?php
require_once 'db_connect.php';
if (!isset($_GET['id']))
    die('bad access1');

$_id = (int)$_GET['id'];
if ($_id == 0)
    die('bad access2');
require_once ('users_api.php');

$user = bsf_users_get_by_id($_id);
bsf_db_close();

if ($user == NULL)
    die('bad user id');

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $user->username?> - profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<p>Username: <?php echo $user->username?></p>
<p>Email:    <?php echo $user->email?></p>



</body>


</html>
