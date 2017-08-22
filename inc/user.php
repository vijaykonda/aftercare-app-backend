<?
$token = $headers['Token'];

// VIEW USER
if ("$ac" === "user") {

	if (check_valid_token($token)) {


	$qq = mysqli_query($dblink, "SELECT * FROM `users` WHERE `token` = '$token'");
	$qqq = mysqli_fetch_array($qq);
	if ("$qqq[email]" !== "") {
	
	$av = mysqli_fetch_array(mysqli_query($dblink, "SELECT * FROM `avatars` WHERE `pic` = '$qqq[avatar]'"));
	
	$response = array();
	
	if ("$qqq[id]" !== "") { $response['id'] = $qqq['id']; }
	if ("$qqq[firstname]" !== "") { $response['firstname'] = $qqq['firstname']; }
	if ("$qqq[lastname]" !== "") { $response['lastname'] = $qqq['lastname']; }
	if ("$qqq[gender]" !== "") { $response['gender'] = $qqq['gender']; }
	if ("$qqq[email]" !== "") { $response['email'] = $qqq['email']; }
	if ("$qqq[birthday]" !== "") { $response['birthday'] = $qqq['birthday']; }
	if ("$qqq[postalCode]" !== "") { $response['postalCode'] = $qqq['postalCode']; }
	if ("$qqq[country]" !== "") { $response['country'] = $qqq['country']; }
	if ("$qqq[city]" !== "") { $response['city'] = $qqq['city']; }
	if ("$qqq[googleID]" !== "") { $response['googleID'] = $qqq['googleID']; }
	if ("$qqq[facebookID]" !== "") { $response['facebookID'] = $qqq['facebookID']; }
	if ("$qqq[twitterID]" !== "") { $response['twitterID'] = $qqq['twitterID']; }
	if ("$qqq[lastLoginDate]" !== "") { $response['lastLoginDate'] = $qqq['lastLoginDate']; }
	if ("$qqq[createdDate]" !== "") { $response['createdDate'] = $qqq['createdDate']; }
	if ("$qqq[lastModifiedDate]" !== "") { $response['lastModifiedDate'] = $qqq['lastModifiedDate']; }
	if ("$av[pic]" !== "") {
		$response['avatar'] = array(
			'avatar_id' => "$av[pic]",
        	'xhdpi_link' => "$site_link"."db/pics/$av[folder]/x/$av[pic].jpg",
			'hdpi_link' => "$site_link"."db/pics/$av[folder]/h/$av[pic].jpg",
			'mdpi_link' => "$site_link"."db/pics/$av[folder]/m/$av[pic].jpg",
			'ldpi_link' => "$site_link"."db/pics/$av[folder]/l/$av[pic].jpg");
	}
	
	header("HTTP/1.1 200 OK");
	echo json_encode($response);
	
	} else {

	$response = array(
        'code' => '400',
		'messge' => 'no valid token'
    );
	
	header("HTTP/1.1 400 Bad Request");
	echo json_encode($response);
	
	}
} else {

	$response = array(
        'code' => '400',
		'messge' => 'no valid token'
    );
	
	header("HTTP/1.1 400 Bad Request");
	echo json_encode($response);
	
	}

}

?>