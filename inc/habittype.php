<?php
////////////////////////////////////////////
//////////////// HABIT TYPES ///////////////
////////////////////////////////////////////

// add habit type
if ("$ac" === "habittypeadd") {

	$q = "INSERT INTO `HabitType` (`type`) VALUES ('$type')";
	$qq = mysqli_query($dblink, $q);
	$t = mysqli_insert_id($dblink);
	$err = mysqli_error($dblink);
	if ($t > 0) { echo "OK|HABIT TYPE ADD OK|$t"; } else { echo "ERR|$err"; }

}

// del habit type
if ("$ac" === "habittypedel") {

	if ($habittypeid < 1) { echo "ERR|NO HABIT TYPE ID"; } else {
	$q = "DELETE FROM `HabitType` WHERE `id` = '$habittypeid'";
	$qq = mysqli_query($dblink, $q);
	$err = mysqli_error($dblink);
	
	if ("$err" === "") {
		if (mysqli_affected_rows($dblink) > 0) {
			echo "OK|HABIT TYPE DEL OK"; 
			} else {
			echo "ERR|HABIT TYPE NOT EXIST"; 	
		} 
	} else { echo "ERR|$err"; }
	

	}

}

// edit habit type
if ("$ac" === "habittypeedit") {

	if ($habittypeid < 1) { echo "ERR|NO HABIT TYPE ID"; } else {
	$q = "UPDATE `HabitType` SET `type` = '$type' WHERE `id` = '$habittypeid'";
	$qq = mysqli_query($dblink, $q);
	$err = mysqli_error($dblink);
	
	if ("$err" === "") {
	
		if (mysqli_affected_rows($dblink) > 0) {
			echo "OK|HABIT TYPE UPDATE OK"; 
			} else {
			echo "ERR|HABIT TYPE NOT EXIST"; 	
		} 
	
	} else { echo "ERR|$err"; }
	

	}

}

// view habit type
if ("$ac" === "habittypeview") {

	if ($habitid < 1) { echo "ERR|NO HABIT TYPE ID"; } else {
	$q = "SELECT * FROM `HabitType` WHERE `id` = '$habitid'";
	$qq = mysqli_query($dblink, $q);
	$qqq = mysqli_fetch_array($qq);
	$err = mysqli_error($dblink);
	
	if ("$err" === "") {
	
	echo "OK|ID:$qqq[id]|type:$qqq[type]";
		 
	
	} else { echo "ERR|$err"; }
	

	}

}

?>