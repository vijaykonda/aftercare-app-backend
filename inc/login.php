<?php
///////////////////////////////////////
//////////////// USERS ////////////////
///////////////////////////////////////

// LOGIN USER
if ("$ac" === "login") {

if ("$email" !== "" && "$password" !== "") { $login_type = "password"; }
if ("$email" !== "" && "$googleID" !== "" && "googleAccessToken" !== "") { $login_type = "google"; }
if ("$email" !== "" && "$facebookID" !== "" && "$facebookAccessToken" !== "") { $login_type = "facebook"; }
if ("$email" !== "" && "$twitterID" !== "" && "$twitterAccessToken" !== "" && "$twitterAccessTokenSecret" !== "") { $login_type = "twitter"; }

if ("$login_type" === "password") {
	$password = md5($password);
	$qn = mysqli_query($dblink, "SELECT * FROM `users` WHERE `email` = '$email' and `password` = '$password'");
	if (mysqli_num_rows($qn) == 1) { $login = 1; }
}

if ("$login_type" === "google") {

	$gg_check = check_gg_login ($googleID, $googleAccessToken);
	
	if ($gg_check) { 
		mysqli_query($dblink, "UPDATE `users` SET `googleAccessToken` = '$googleAccessToken' WHERE `email` = '$email' and `googleID` = '$googleID'");
	}
	
	$qn = mysqli_query($dblink, "SELECT * FROM `users` WHERE `email` = '$email' and `googleID` = '$googleID' and `googleAccessToken` = '$googleAccessToken'");
	if (mysqli_num_rows($qn) == 1) { $login = 1; }	
}

if ("$login_type" === "facebook") {

	$fb_check = check_fb_login ($facebookID, $facebookAccessToken);

	if ($fb_check) { 
		mysqli_query($dblink, "UPDATE `users` SET `facebookAccessToken` = '$facebookAccessToken' WHERE `email` = '$email' and `facebookID` = '$facebookID'");
	}

	$qn = mysqli_query($dblink, "SELECT * FROM `users` WHERE `email` = '$email' and `facebookID` = '$facebookID' and `facebookAccessToken` = '$facebookAccessToken'");
	if (mysqli_num_rows($qn) == 1) {
	$login = 1;
	}
}

if ("$login_type" === "twitter") {
	$tw_check = check_tw_login ($twitterID, $twitterAccessToken, $twitterAccessTokenSecret);
	
	if ($tw_check) { 
		mysqli_query($dblink, "UPDATE `users` SET `twitterAccessToken` = '$twitterAccessToken', `twitterAccessTokenSecret` = '$twitterAccessTokenSecret' WHERE `email` = '$email' and `facebookID` = '$facebookID'");
	}

	$qn = mysqli_query($dblink, "SELECT * FROM `users` WHERE `email` = '$email' and `twitterID` = '$twitterID' and `twitterAccessToken` = '$twitterAccessToken' and `twitterAccessTokenSecret` = '$twitterAccessTokenSecret'");
	if (mysqli_num_rows($qn) == 1) {
	$login = 1;
	}
}

	if ($login) { 
	$qnf = mysqli_fetch_array($qn);
	$token = randnom(32);
	$token_date = mktime()+30*86400;
	$upd = mysqli_query($dblink, "UPDATE `users` SET `token` = '$token', `token_date` = '$token_date' WHERE `id` = '$qnf[id]' and `email` = '$qnf[email]'");
	
	$qu = mysqli_fetch_array(mysqli_query($dblink, "SELECT * FROM `users` WHERE `id` = '$qnf[id]' and `email` = '$qnf[email]' and `token` = '$token'"));
	
	$token_valid_to = date('c', $qu['token_date']);
	
	$response = array(
        'token' => $qu['token'],
        'token_valid_to' => $token_valid_to
    );
	
	echo json_encode($response);
	} else {

	 header("HTTP/1.1 401 Unauthorized");
	
	 $response = array(
			'code' => 401,
			'message' => 'Wrong password or email!'
    );
	
	echo json_encode($response);

 }
}




?>