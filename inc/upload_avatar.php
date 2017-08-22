<?php
//////////////////////////////////////
///////// UPLOAD AVATAR //////////////
//////////////////////////////////////

if ("$ac" === "upload_avatar") {
	
	$pic = $_FILES['pic'];
	
	if ('$pic' !== '') { 
	
    $hh = $pic['tmp_name'];
	$rkod = strtolower(randnom(7));
	$novoime = "$rkod.jpg";
	$folder = strtolower(randnom(5));
	$datadir = "$datadir/pics/$folder";
	
	if (!is_dir("$datadir")) { mkdir("$datadir");  chmod("$datadir", 0777); }
	if (!is_dir("$datadir/l")) { mkdir("$datadir/l");  chmod("$datadir/l", 0777); }
	if (!is_dir("$datadir/m")) { mkdir("$datadir/m");  chmod("$datadir/m", 0777); }
	if (!is_dir("$datadir/h")) { mkdir("$datadir/h");  chmod("$datadir/h", 0777); }
	if (!is_dir("$datadir/x")) { mkdir("$datadir/x");  chmod("$datadir/x", 0777); }
	
	$ddd = copy($hh, "$datadir/x/$novoime");

	$thumb_l = "$datadir/l/$novoime";
	make_thumb("$datadir/x/$novoime", $thumb_l, $max_x=192, $max_y=192, $ratio=1, $bigger=1 );
	chmod ("$thumb_l", 0664);
	
	$thumb_m = "$datadir/m/$novoime";
	make_thumb("$datadir/x/$novoime", $thumb_m, $max_x=256, $max_y=256, $ratio=1, $bigger=1 );
	chmod ("$thumb_m", 0664);

	$thumb_h = "$datadir/h/$novoime";
	make_thumb("$datadir/x/$novoime", $thumb_h, $max_x=384, $max_y=384, $ratio=1, $bigger=1 );
	chmod ("$thumb_h", 0664);
	
	if (is_file("$datadir/x/$novoime") && is_file("$thumb_l") && is_file("$thumb_m") && is_file("$thumb_h")) {
		$dt = mktime();
		$q = mysqli_query($dblink, "INSERT INTO `avatars` (`folder`, `pic`, `dt`) VALUES ('$folder', '$rkod', '$dt')");
		$t = mysqli_insert_id($dblink);
		if ($t > 0) {
		
		$response = array(
		'avatar_id' => $rkod,
        'xhdpi_link' => "$site_link"."db/pics/$folder/x/$rkod.jpg",
		'hdpi_link' => "$site_link"."db/pics/$folder/h/$rkod.jpg",
		'mdpi_link' => "$site_link"."db/pics/$folder/m/$rkod.jpg",
		'ldpi_link' => "$site_link"."db/pics/$folder/l/$rkod.jpg"
    );
	
	header("HTTP/1.1 200 OK");
	echo json_encode($response);
	
	} else {

	header("HTTP/1.1 500 Internal Server Error");
	
	$response = array(
        'error' =>array(
			'code' => 500,
			'message' => 'No upload file!'
		)
    );
	
	echo json_encode($response);

 }
		
		}
	}
	
	
}


?>