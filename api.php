<?php
	include "libs/init.php";

//print_r($_POST);
//print_r($_GET);
//print_r($_REQUEST);

foreach($_POST as $key => $value) {
	$$key = rem_html($value);
}

$ob_json = json_decode(file_get_contents('php://input'));
$json_arr = object_to_array($ob_json);

// print_r($json_arr);

if (is_array($json_arr)) {
	foreach($json_arr as $key => $value) {
		$$key = $value;
	}
}

header("Content-type:application/json");
$ac = rem_html($_GET['ac']);
$headers = apache_request_headers();

// Тест
if ("$ac" === "test") {
	echo "TEST OK";
}

////////////// USERS ////////////////
include "inc/users.php";
include "inc/user.php";
include "inc/userreg.php";
include "inc/login.php";
include "inc/logout.php";
include "inc/upload_avatar.php";

////////////// HABIT ////////////////
include "inc/habit.php";

////////////// HABIT TYPE ////////////////
include "inc/habittype.php";

////////////// RECORDINGS ////////////////
include "inc/recordings.php";


?>