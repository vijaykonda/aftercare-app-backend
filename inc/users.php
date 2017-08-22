<?php
///////////////////////////////////////
//////////////// USERS ////////////////
///////////////////////////////////////

// ADD USER
if ("$ac" === "useradd") {
// check for email exist
$emq = mysqli_num_rows(mysqli_query($dblink, "SELECT * FROM `users` WHERE `email` = '$email'"));

if ($emq > 0) { echo "ERR|EMAIL EXIST"; } else {

	if (strlen($password) > 4) {	$mpassword = md5($password); }
	
	$q = "INSERT INTO `users` 
		(`email`, `password`, `firstname`, `lastname`, `birthday`, `postalCode`, `country`, `city`, `gender`, `googleID`, `googleAccessToken`, `facebookID`, `facebookAccessToken`, `twitterID`, `twitterAccessToken`, `lastLoginDate`, `createdDate`, `avatar`, `lastModifiedDate`)
		VALUES
		('$email', '$mpassword', '$firstname', '$lastname', '$birthday', '$postalCode', '$country', '$city', '$gender', '$googleID', '$googleAccessToken', '$facebookID', '$facebookAccessToken', '$twitterID', '$twitterAccessToken', '$lastLoginDate', NOW(), '$avatar', NOW())";
	$qq = mysqli_query($dblink, $q);	
	$t = mysqli_insert_id($dblink);
	$err = mysqli_error($dblink);
	if ($t > 0) { echo "OK|USED ADD OK"; } else { echo "ERR|$err"; }
	}
}

// EDIT USER
if ("$ac" === "useredit") {

}

// VIEW USER
if ("$ac" === "userview") {
	$qq = mysqli_query($dblink, "SELECT * FROM `users` WHERE `id` = '$id' and `email` = '$email'");
	$qqq = mysqli_fetch_array($qq);
	if ("$qqq[email]" !== "") {
	echo "OK|email:$qqq[email]|firstname:$qqq[firstname]|lastname:$qqq[lastname]|birthday:$qqq[birthday]|postalCode:$qqq[postalCode]|country:$qqq[country]|city:$qqq[city]|gender:$qqq[gender]|googleID:$qqq[googleID]|googleAccessToken:$qqq[googleAccessToken]facebookID:$qqq[facebookID]|facebookAccessToken:$qqq[facebookAccessToken]|twitterID:$qqq[twitterID]|twitterAccessToken:$qqq[twitterAccessToken]|lastLoginDate:$qqq[lastLoginDate]|createdDate:$qqq[createdDate]|avatar:$qqq[avatar]|lastModifiedDate:$qqq[lastModifiedDate]";
	} else {
	echo "ERR|USER NOT FOUND!";
	}
}

// CHANGE PASSWORD USER
if ("$ac" === "userchpass") {
	

}






?>