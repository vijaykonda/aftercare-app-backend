<?php
// functions :)

// Check Facebook ID and token
function check_fb_login ($fb_id, $fb_token) {
	global $fb_app_id;
	global $fb_app_secret;
	
	require_once "libs/Facebook/autoload.php";

	$fb = new Facebook\Facebook([
	  'app_id' => $fb_app_id,
	  'app_secret' => $fb_app_secret,
	  'default_graph_version' => 'v2.10',
	  ]);

	try {
	  $response = $fb->get('/me?fields=id,name', $fb_token);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	 $err = $e->getMessage();
	//  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	 $err = $e->getMessage();
	//  exit;
	}
	
	$user = $response->getGraphUser();
	if ("$fb_id" === "$user[id]") { return true; } else { return $err; }
}

///// check Twitter login
function check_tw_login ($tw_id, $tw_token, $tw_token_secret) {
	global $tw_api_key;
	global $tw_api_secret;

require_once "libs/twitteroauth/autoload.php";
//use Abraham\TwitterOAuth\TwitterOAuth;

	$consumer_key = $tw_api_key;
	$consumer_secret = $tw_api_secret;

	$connection = new Abraham\TwitterOAuth\TwitterOAuth($consumer_key, $consumer_secret, $tw_token, $tw_token_secret);
	$result = $connection->get("account/verify_credentials");
	
	// print_r($result);
	$tid = $result->id;
	if ("$tid" === "$tw_id") { return true; } else { return "Invalid token"; }

}

///// check Google+  login
function check_gg_login ($gg_id, $gg_token) {
	global $gg_client_id;

	require_once 'libs/google/vendor/autoload.php';
	
	$client = new Google_Client(['client_id' => $gg_client_id]);
	$payload = $client->verifyIdToken($gg_token);
	if ($payload) {
		$userid = $payload['sub'];
	} else {
		$err = "Invalid ID token";
	}

	// print_r($result);
	if ("$userid" === "$gg_id") { return true; } else { return $err; }

}

/// valid token
function check_valid_token ($token) {
	global $dblink;
	$qq = mysqli_query($dblink, "SELECT * FROM `users` WHERE `token` = '$token'");
	$qn = mysqli_num_rows($qq);
	if ($qn) { return true; } else { return false; }
}


?>