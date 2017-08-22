<?php
///////////////////////////////////////////////////
//////////////// USER REGISTRATION ////////////////
///////////////////////////////////////////////////

//$json_str = file_get_contents('php://input');
//$json_obj = json_decode($json_str);
//print_r($json_obj);
//$_POST = array_merge($_POST, (array) );

// echo "$password $email ....";

if ("$ac" === "userreg") {

if ("$password" !== "") { $type = "password"; }
if ("$googleID" !== "" && "googleAccessToken" !== "") { $type = "google"; }
if ("$facebookID" !== "" && "$facebookAccessToken" !== "") { $type = "facebook"; }
if ("$twitterID" !== "" && "$twitterAccessToken" !== "" && "$twitterAccessTokenSecret" !== "") { $type = "twitter"; }

if ("$email" === "" or "$firstname" === "") { $err = "one or more empty field"; }

$emq = mysqli_num_rows(mysqli_query($dblink, "SELECT * FROM `users` WHERE `email` = '$email'"));

if ($emq > 0) { $err = "EMAIL EXIST"; } else {

	if ("$type" === "password") {
		if (strlen($password) > 5) {
			$mpassword = md5($password);
		 } else {
			$err = "password too short";
		 }
	}

	if ("$type" === "google") { 
		$gg_check = check_gg_login ($googleID, $googleAccessToken);
		if (!$gg_check) { $err = $gg_check; }
	}
	
	if ("$type" === "facebook") {
		$fb_check = check_fb_login ($facebookID, $facebookAccessToken);
		if (!$fb_check) { $err = $fb_check; }
	}
	
	if ("$type" === "twitter") {
		$tw_check = check_tw_login ($twitterID, $twitterAccessToken, $twitterAccessTokenSecret);
		if (!$tw_check) { $err = $tw_check; }
	}

}

if ("$type" === "") { $err = "no type";}

if ("$err" === "") {

	$avatar = $avatar['avatar_id'];

	$q = "INSERT INTO `users` 
		(`email`, `password`, `firstname`, `lastname`, `birthday`, `postalCode`, `country`, `city`, `gender`, `googleID`, `googleAccessToken`, `facebookID`, `facebookAccessToken`, `twitterID`, `twitterAccessToken`, `twitterAccessTokenSecret`, `lastLoginDate`, `createdDate`, `avatar`, `lastModifiedDate`)
		VALUES
		('$email', '$mpassword', '$firstname', '$lastname', '$birthday', '$postalCode', '$country', '$city', '$gender', '$googleID', '$googleAccessToken', '$facebookID', '$facebookAccessToken', '$twitterID', '$twitterAccessToken', '$twitterAccessTokenSecret', NOW(), NOW(), '$avatar', NOW())";
	$qq = mysqli_query($dblink, $q);	
	$t = mysqli_insert_id($dblink);
	$err = mysqli_error($dblink);
	if ($t > 0) {
	
	$token = randnom(32);
	$token_date = mktime()+30*86400;
	$upd = mysqli_query($dblink, "UPDATE `users` SET `token` = '$token', `token_date` = '$token_date' WHERE `id` = '$t' and `email` = '$email'");
	
	$qu = mysqli_fetch_array(mysqli_query($dblink, "SELECT * FROM `users` WHERE `id` = '$t' and `email` = '$email' and `token` = '$token'"));

	$token_valid_to = date('c', $qu['token_date']);

	$response = array(
        'token' => $qu['token'],
        'token_valid_to' => $token_valid_to
    );

	header("HTTP/1.1 201 Created");
	echo json_encode($response);
	
	}
 
	}
	
	if ("$err" !== "") {
     header("HTTP/1.1 400 Bad Request");
	 $response = array(
        'code' => '400',
		'message' => $err
    );
	echo json_encode($response);
 }	
}



?>