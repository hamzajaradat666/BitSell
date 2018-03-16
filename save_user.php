<?php

if (!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password']))
    die('bad access'); # if data sent from register.php

if ($_POST['password2'] != $_POST['password'])
    die('confirm password is incorrect');

require_once("users_api.php");

$user_email = bsf_users_get_by_email($_POST['email']);

if (!$user_email)
    $result = bsf_users_add(trim($_POST['username']), trim($_POST['email']), trim($_POST['password']), 0);
else
{
    bsf_db_close();
    die( "User exist");
}

bsf_db_close();

if(!$result)
    die("failed");
else
    die("Success");


