<?php
# bit sell : bs
$bs_db_host     = '127.0.0.1';
$bs_db_dbname   = 'bitsell';
$bs_db_username = 'root';
$bs_db_password = '';

$bs_db_handle = mysqli_connect($bs_db_host, $bs_db_username, $bs_db_password);

if (!$bs_db_handle) {
	die('Connection failed ' . mysqli_connect_error());
}

$bs_db_select = mysqli_select_db($bs_db_handle, $bs_db_dbname);

if (!$bs_db_select) {
	mysqli_close($bs_db_handle);
	die('selection problem');
}

mysqli_query($bs_db_handle, "SET NAMES 'utf8'");


function bsf_db_close() {
    
	global $bs_db_handle;
	@mysqli_close($bs_db_handle);
}



