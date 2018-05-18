<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 4/25/2018
 * Time: 11:14 AM
 */

require_once 'session.php';

if ($_SESSION['user info'] == false)
    header('Location: index.php');
else {
    $_SESSION['user info'] = false;
    header('Location: index.php');

}


