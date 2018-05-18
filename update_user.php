<?php
require_once 'db_connect.php';
require_once("users_api.php");
if (!isset($_GET['id']))
    die('bad access1');

$_id = (int)$_GET['id'];

if ($_id == 0)
    die('bad access2');


if (!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password']))
    die('bad access'); # if data sent from register.php

if ($_POST['password2'] != $_POST['password'])
    die('confirm password is incorrect');


$user= bsf_users_get_by_email($_POST['email']);
if ($user != NULL && $user->user_id != $_id) {
    bsf_db_close();
    die( "Email exist");
}

$user= bsf_users_get_by_username($_POST['username']);
if ($user != NULL && $user->user_id != $_id) {
    bsf_db_close();
    die("User exist");
}

$pass = $_POST['password'];
if (strlen($pass) == 0)
    $pass = NULL;

$result = bsf_users_update($_id, trim($_POST['username']), trim($_POST['email']), $pass);


bsf_db_close();

if(!$result)
    die("failed");
else {
    if ($user->isadmin == 1)
        header('Location: admin_panel.php');
    else
        header('Location: index.php');
}


