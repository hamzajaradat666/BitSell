<?php
include('db_connect.php');

# returns selected users as an array of objects ($users)
function bsf_users_get($select ='*', $extra = '') {
	global $bs_db_handle;
	$query = sprintf("SELECT %s FROM `users` %s", $select, $extra);
	$query_result = mysqli_query($bs_db_handle, $query);

	if (!$query_result) {
		return NULL;}

	$users_count = mysqli_num_rows($query_result);

	if ($users_count == 0)
		return NULL;

	$users = array();
	for ($i=0; $i < $users_count ; $i++) { 
		$users[count($users)] = mysqli_fetch_object($query_result); # return a first row as an Object.
	}
	@mysqli_free_result($query_result); # clear query result.


	return $users;
}
# get user object by id from users table in bit_sell database
function bsf_users_get_by_id($user_id) {
	$user_id = (int)$user_id; # if$new_username is not int, will return 0;
	if ($user_id == 0)
		return NULL;

	$result = bsf_users_get('*', 'WHERE `user_id` = ' . $user_id);
	if ($result == NULL)
		return NULL;

	$user = $result[0];
	return $user;
}
# add a new user to users table in bit_sell database
function bsf_users_add($username, $email, $password, $isadmin) {
	global $bs_db_handle;
	# secure check

	if (empty($username) || empty($password) || empty($email))
	    return false;


	$new_username     = mysqli_real_escape_string($bs_db_handle, strip_tags($username));
	$new_email        = mysqli_real_escape_string($bs_db_handle, strip_tags($email));
	if (!filter_var($new_email, FILTER_VALIDATE_EMAIL))
	    return false;
	$new_password = md5(mysqli_real_escape_string($bs_db_handle, strip_tags($password)));

	$new_isadmin   = (int)$isadmin;
	if(($new_isadmin != 0) && ($new_isadmin != 1))
	    $new_isadmin = 0;

    $query = sprintf("INSERT INTO `users` VALUES(NULL, '%s', '%s', '%s', %d)",$new_username, $new_email, $new_password, $new_isadmin);
    $query_result = mysqli_query($bs_db_handle,$query);

	if (!$query_result)
		return FALSE;


	return TRUE;
}
# delete a user from users table in bit_sell database (return true if user deleted)
function bsf_users_delete_by_id($user_id) {
    global $bs_db_handle;
	$user_id = (int)$user_id;

	if ($user_id == 0) # security
		return FALSE;

	$query = sprintf("DELETE FROM `users` WHERE `user_id` = %d", $user_id);

	$query_result = mysqli_query($bs_db_handle, $query);

	if (!$query_result)
		return FALSE;

	return TRUE;
}
# update data of a specific user (by id) (all parameters is optimal expect $user_id (return true if user updated)
function bsf_users_update($user_id, $username = NULL, $email = NULL, $password = NULL, $isadmin = -1) {
    global $bs_db_handle;
	$user_id = (int)$user_id;
	if ($user_id == 0) # security
		return FALSE;
    $new_isadmin = (int)$isadmin;

	$user = bsf_users_get_by_id($user_id);
	if (!$user) # check if the user is exit.
		return FALSE;
	if (empty($first_name) && empty($password) && empty($email) && ($user->isadmin == $new_isadmin))
	    return FALSE;


	$fields = array();	$new_isadmin = (int)$isadmin;

    if($new_isadmin == -1)
        $new_isadmin = (int)$user->isadmin;
    $fields[count($fields)] = "`isadmin` = $new_isadmin";

    if (!empty($username)) {
    	$new_username = mysqli_escape_string($bs_db_handle, strip_tags($username));
    	$fields[count($fields)] = "`username` =  '$new_username'";}
    if (!empty($email)) {
    	$new_email = mysqli_escape_string($bs_db_handle, strip_tags($email));
    	if(!filter_var($new_email,FILTER_VALIDATE_EMAIL))
    		return false;
    	$fields[count($fields)] = " `email` = '$new_email'";}

    if (!empty($password)) {
    	$new_password = md5(mysqli_escape_string($bs_db_handle, strip_tags($password)));
    	$fields[count($fields)] = " `password` = '$new_password'";}


    $query = "UPDATE `users` SET ";
	if(count($fields) == 1) {
		$query .= $fields[0] . " WHERE `user_id` = " . $user_id;
		$query_result = mysqli_query($bs_db_handle, $query);
		if($query_result)
			return true;
		else
			return false;
	}

	for ($i = 0; $i < count($fields); $i++) {
        $query .= $fields[$i];
        if($i != count($fields) - 1)
        	$query .= " , ";
    }

    $query .= " WHERE `user_id` = " . $user_id;
	$query_result = mysqli_query($bs_db_handle, $query);
	if($query_result)
		return true;
	else
		return false;

}
# get user object by email from users table in bit_sell database
function bsf_users_get_by_email($email) {
	global $bs_db_handle;

	$new_email = mysqli_escape_string($bs_db_handle, strip_tags($email));
	if(!filter_var($new_email, FILTER_VALIDATE_EMAIL))
		return null;

	$result = bsf_users_get('*', "WHERE `email` =  '$new_email'");

	if($result != NULL)
		$user = $result[0];
	else
		return NULL;

	return $user;

}

function bsf_users_get_by_username($username) {
    global $bs_db_handle;
    $new_username = mysqli_escape_string($bs_db_handle, strip_tags($username));

    $result = bsf_users_get('*', "WHERE `username` = '$new_username'");

    if ($result != NULL)
        $user = $result[0];
    else
        return NULL;

    return $user;

}






