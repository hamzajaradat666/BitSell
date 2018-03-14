<?php

include('db_connect.php');

function bsf_customers_get($select ='*', $extra = '') {
	global $bs_db_handle;
	$query = sprintf("SELECT %s FROM `customers` %s", $select, $extra);
	$query_result = mysqli_query($query);

	if (!$query_result)
		return NULL;

	$customers_count = mysqli_num_rows($query_result);

	if ($customers_count == 0)
		return NULL;

	$customers = array();
	for ($i=0; $i < $customers_count ; $i++) { 
		$customers[count($customers)] = mysqli_fetch_object($query_result); # return a first row as an Object.
	}
	@mysqli_free_result($query_result); # clear query result.


	return $customers;
}

function bsf_customers_get_by_id($customer_id) {
	$customer_id = (int)$customer_id; # if is not int, will return 0;
	if ($customer_id == 0)
		return NULL;

	$result = bsf_customers_get('*', 'WHERE `customer_id` = ' . $customer_id);
	if ($result == NULL)
		return NULL;

	$customer = $result[0];
	return $customer;
}

function bsf_customers_add($first_name, $last_name, $email, $password, $phone, $fax, $company, $address1, $address2, $post_code, $city, $country, $region, $isadmin) {
	global $bs_db_handle;
	# secure check 
	if (empty($first_name) || empty($last_name) || empty($password) || empty($email)     || empty($phone)  || 
		empty($address1)   || empty($address2)  || empty($post_code)|| empty($country)   || empty($isadmin)|| 
		empty($post_code)  || empty($city)      || empty($region)   || empty($fax)) return false;


	$new_fname     = mysqli_real_escape_string(strip_tags($first_name), $bs_db_handle);
	$new_lname     = mysqli_real_escape_string(strip_tags($last_name), $bs_db_handle);
	$new_email     = mysqli_real_escape_string(strip_tags($email), $bs_db_handle);
	$new_phone     = (int)$phone;
	$new_fax       = (int)$fax;
	$new_company   = mysqli_real_escape_string(strip_tags($company), $bs_db_handle);
	$new_address1  = mysqli_real_escape_string(strip_tags($address1), $bs_db_handle);
	$new_address2  = mysqli_real_escape_string(strip_tags($address2), $bs_db_handle);
	$new_pc        = (int)$post_code;
	$new_city      = mysqli_real_escape_string(strip_tags($city), $bs_db_handle);
	$new_country   = mysqli_real_escape_string(strip_tags($country), $bs_db_handle);
	$new_region    = mysqli_real_escape_string(strip_tags($region), $bs_db_handle);
	$new_password  = @md5($password);
	$new_isadmin   = (int)$isadmin;


	$query = sprintf("INSERT INTO `customers` VALUES(NULL, %s, %s, %s, %s, %d, %d, %s, %s, %s, %d, %s, %s, %d, %s)", $new_fname, $new_lname, $new_email, $new_password,
	                  $new_phone, $new_fax, $new_company, $new_address1, $new_address2, $new_pc, $new_country, $new_region, $new_isadmin, $new_city);

	$query_result = mysqli_query($query);

	if (!$query_result)
		return FALSE;

	return TRUE;
}

function bsf_customers_delete_by_id($customer_id) {
	$customer_id = (int)$customer_id;

	if ($customer_id == 0) # security
		return FALSE;

	$query = sprintf("DELETE FROM `customers` WHERE `customer_id` = %d", $customer_id);

	$query_result = mysqli_query($query);

	if (!$query_result)
		return FALSE;

	return TRUE;
}

function bsf_customers_update($customer_id, $first_name = NULL, $last_name = NULL , $email = NULL, $password = NULL, $phone = NULL, $fax = NULL, $company = NULL, $address1 = NULL, $address2 = NULL, $post_code = NULL, $city = NULL, $country = NULL, $region = NULL, $isadmin = -1) {
	global $bs_db_handle;
	$customer_id = (int)$customer_id;
	if ($customer_id == 0) # security
		return FALSE;

	$new_isadmin = (int)$isadmin;

	$customer = bsf_customers_get_by_id($customer_id);
	if (!$customer) # check if the customer is exit.
		return FALSE;

	

	if (empty($first_name) && empty($last_name) && empty($password) && empty($email) && empty($phone)  && 
		empty($address1)   && empty($address2)  && empty($post_code)&& empty($country)   && 
	    empty($city) && empty($region) && empty($fax) && ($customer->isadmin == $new_isadmin)) return FALSE;

	    $query = "UPDATE `cutomers` SET ";
	$fields = array(); # all parameters is not emtpy will store in $fields;
    
    if (!empty($first_name)) {
    	$new_fname = mysqli_escape_string(strip_tags($first_name), $bs_db_handle);
    	$fields[count($fields)] = " `first_name` = '$new_fname'";}

    if (!empty($last_name)) {
    	$new_lname = mysqli_escape_string(strip_tags($last_name), $bs_db_handle);
    	$fields[count($fields)] = " `last_name` = '$new_lname'";}

    if (!empty($email)) {
    	$new_email = mysqli_escape_string(strip_tags($email), $bs_db_handle);
    	$fields[count($fields)] = " `email` = '$new_email'";}

    if (!empty($password)) {
    	$new_password = md5(mysqli_escape_string(strip_tags($password), $bs_db_handle));
    	$fields[count($fields)] = " `password` = '$new_password'";}

    if (!empty($phone)) {
    	$new_phone = (int)$phone;
    	if ($new_phone == 0)
    		return FALSE;

    	$fields[count($fields)] = " `phone` = '$new_phone'";}

    if (!empty($fax)) {
    	$new_fax = (int)$fax;
    	$fields[count($fields)] = " `fax` = '$new_fax'";}

    if (!empty($company)) {
    	$new_company = mysqli_escape_string(strip_tags($company), $bs_db_handle);
    	$fields[count($fields)] = " `company` = '$new_company'";}

    if (!empty($address1)) {
    	$new_address1 = mysqli_escape_string(strip_tags($address1), $bs_db_handle);
    	$fields[count($fields)] = " `address1` = '$new_address1'";}

    if (!empty($address2)) {
    	$new_address2 = mysqli_escape_string(strip_tags($address2), $bs_db_handle);
    	$fields[count($fields)] = " `address2` = '$new_address2'";}

    if (!empty($post_code)) {
    	$new_pc = (int)$post_code;
    	$fields[count($fields)] = " `post_code` = '$new_pc'";}

    if (!empty($country)) {
    	$new_country = mysqli_escape_string(strip_tags($country), $bs_db_handle);
    	$fields[count($fields)] = " `country` = '$new_country'";}

    if (!empty($region)) {
    	$new_region = mysqli_escape_string(strip_tags($region), $bs_db_handle);
    	$fields[count($fields)] = " `region` = '$new_region'";}
	
	if($new_isadmin == -1)
	$new_isadmin = $customer -> isadmin;

    $fields[count($fields)] = "`isadmin` = '$new_isadmin'";

    $query = "UPDATE `cutomers` SET";
	if(count($fields) == 1) {
		$query .= $fields[0] . " WHERE `customer_id` = " . $customer_id;
		$query_result = mysqli_query($query);
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

    $query .= " WHERE `customer_id` = " . $customer_id;
	$query_result = mysqli_query($query);
	if($query_result)
		return true;
	else
		return false;

}


?>
