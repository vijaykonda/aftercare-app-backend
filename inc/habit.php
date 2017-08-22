<?php
///////////////////////////////////////
//////////////// HABIT ////////////////
///////////////////////////////////////

// add habit
if ("$ac" === "habitadd") {

	$q = "INSERT INTO `habit` (`userId`, `habittypeId`, `date`) VALUES ('$userId', '$habittypeId', '$date')";
	$qq = mysqli_query($dblink, $q);
	$t = mysqli_insert_id($dblink);
	$err = mysqli_error($dblink);
	if ($t > 0) { echo "OK|HABIT ADD OK|$t"; } else { echo "ERR|$err"; }

}

// del habit
if ("$ac" === "habitdel") {

	if ($habitid < 1) { echo "ERR|NO HABIT ID"; } else {
	$q = "DELETE FROM `habit` WHERE `id` = '$habitid'";
	$qq = mysqli_query($dblink, $q);
	$err = mysqli_error($dblink);
	
	if ("$err" === "") {
	
		if (mysqli_affected_rows($dblink) > 0) {
			echo "OK|HABIT DEL OK"; 
			} else {
			echo "ERR|HABIT NOT EXIST"; 	
		} 
	
	} else { echo "ERR|$err"; }
	

	}

}

// edit habit
if ("$ac" === "habitedit") {

	if ($habitid < 1) { echo "ERR|NO HABIT ID"; } else {
	$q = "UPDATE `habit` SET `userId` = '$userId', `habittypeId` = '$habittypeId', `date` = '$date' WHERE `id` = '$habitid'";
	$qq = mysqli_query($dblink, $q);
	$err = mysqli_error($dblink);
	
	if ("$err" === "") {
	
		if (mysqli_affected_rows($dblink) > 0) {
			echo "OK|HABIT UPDATE OK"; 
			} else {
			echo "ERR|HABIT NOT EXIST"; 	
		} 
	
	} else { echo "ERR|$err"; }
	

	}

}

// view habit
if ("$ac" === "habitview") {

	if ($habitid < 1) { echo "ERR|NO HABIT ID"; } else {
	$q = "SELECT * FROM `habit` WHERE `id` = '$habitid'";
	$qq = mysqli_query($dblink, $q);
	$qqq = mysqli_fetch_array($qq);
	$err = mysqli_error($dblink);
	
	if ("$err" === "") {
	
	echo "OK|ID:$qqq[id]|userId:$qqq[userId]|habittypeId:$qq[habittypeId]|date:$qqq[date]";
		 
	
	} else { echo "ERR|$err"; }
	

	}

}

?>