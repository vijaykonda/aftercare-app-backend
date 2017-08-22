<?php
////////////////////////////////////////////
//////////////// RECORDINGS ////////////////
////////////////////////////////////////////

// add record
if ("$ac" === "recordadd") {

	$q = "INSERT INTO `recordings` (`userId`, `startDate`, `endDate`, `flossed`, `rinsed`, `coinsGenerated`) VALUES ('$userId', '$startDate', '$endDate', '$flossed', '$rinsed', '$coinsGenerated')";
	$qq = mysqli_query($dblink, $q);
	$t = mysqli_insert_id($dblink);
	$err = mysqli_error($dblink);
	if ($t > 0) { echo "OK|RECORD ADD OK|$t"; } else { echo "ERR|$err"; }

}



?>