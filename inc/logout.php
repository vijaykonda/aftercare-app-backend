<?
$token = $headers['Token'];

// VIEW USER
if ("$ac" === "logout") {

	if (check_valid_token($token)) {

	$qq = mysqli_query($dblink, "UPDATE `users` SET `googleAccessToken` = '', `facebookAccessToken` = '', `twitterAccessToken` = '', `token` = '', `token_date` = '', `lastModifiedDate` = NOW() WHERE `token` = '$token'");

	if (!check_valid_token($token)) {

		$response = array(
			'code' => '200',
			'messge' => 'OK'
		);
	
		header("HTTP/1.1 200 OK");
		echo json_encode($response);

		} 	else  {
	
		$response = array(
			'code' => '400',
			'messge' => 'misc. error'
		);
	
		header("HTTP/1.1 200 OK");
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