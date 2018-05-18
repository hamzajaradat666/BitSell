<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 4/25/2018
 * Time: 10:43 AM
 */
session_start();

if (!isset($_SESSION['user info']))
    # user is not login
    $_SESSION['user info'] = false;

