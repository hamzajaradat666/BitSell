<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 5/2/2018
 * Time: 7:12 PM
 */

require_once 'db_connect.php';
require_once 'brand_api.php';
require_once 'session.php';
if (!isset($_GET['name']) || empty($_GET['name']))
    die('1');


$name = mysqli_real_escape_string($bs_db_handle, strip_tags($_GET['name']));

$result = bsf_brands_add($name);

if (!$result)
    die('212');

if (!$result)
    die('2');
else
    header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '?status=success');

