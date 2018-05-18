<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 4/25/2018
 * Time: 10:11 AM
 */
require_once 'db_connect.php';
require_once 'session.php';
if ((!isset($_POST['email'])) || (!isset($_POST['password']))) {
  header('location: login.php?status=failed');
    die('email or password is not set');
}

require_once 'users_api.php';
global $bs_db_handle;
if ((empty($_POST['email'])) || (empty($_POST['password']))) {
    bsf_db_close();
    header('location: login.php?status=failed');
    die('Fill information');
}

$user = bsf_users_get_by_email($_POST['email']);

if (!$user) {
  header('location: login.php?status=failed');
    die('bad user');
  }

$password = md5(mysqli_real_escape_string($bs_db_handle, strip_tags($_POST['password'])));;
bsf_db_close();

//if password is correct strcmp() returns 0
if (strcmp($password, $user->password) != 0) {
  header('location: login.php?status=failed');
    die('bad user');
}

$_SESSION['user info'] = $user;
header('Location: index.php');
