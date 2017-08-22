<?php

// функции за обработка на картинки

function create_image($source_file)
{
    $image_info = getImageSize($source_file);
	    
    switch ($image_info['mime']) {
        case 'image/gif':
            if (imagetypes() & IMG_GIF)  {
                $source_image = imageCreateFromGIF($source_file) ;
            } else {
                $ermsg = 'GIF images are not supported<br />';
            }
            break;
        case 'image/jpeg':
            if (imagetypes() & IMG_JPG)  {
                $source_image = imageCreateFromJPEG($source_file) ;
            } else {
                $ermsg = 'JPEG images are not supported<br />';
            }
            break;
        case 'image/png':
            if (imagetypes() & IMG_PNG)  {
                $source_image = imageCreateFromPNG($source_file) ;
            } else {
                $ermsg = 'PNG images are not supported<br />';
            }
            break;
        default:
            return;
            break;
    }

	return $source_image;
}


function resize_image($source_file, $dest_file) 
{
	$source_image = create_image($source_file);
		
	$source_width = imagesx($source_image) ;
	$source_height = imagesy($source_image) ;

	$fixedwidth = 0;

	if($fixedwidth == 1) // Fixed width
	{
		$dest_width = 135;
		$dest_height = round($source_height * $dest_width / $source_width) ; 
		$dest_image = imageCreateTrueColor($dest_width, $dest_height);
	}
	else // Fixed height
	{
		$dest_height = 13;	
		$dest_width = round($source_width * $dest_height / $source_height) ; 
		$dest_image = imageCreateTrueColor($dest_width, $dest_height);
	}

	imageCopyResampled($dest_image, $source_image, 0, 0, 0, 0, $dest_width, $dest_height, $source_width, $source_height);
	imagegif($dest_image, $dest_file);
	imageDestroy($source_image);
	imageDestroy($dest_image);
}


function resize_image_to_image($source_image, $fixedwidth = 1, $dest_width, $dest_height) 
{
	$source_width = imagesx($source_image) ;
	$source_height = imagesy($source_image) ;

	if($fixedwidth == 1) // Fixed width
	{
		$dest_height = round($source_height * $dest_width / $source_width) ; 
		$dest_image = imageCreateTrueColor($dest_width, $dest_height);
	}
	else // Fixed height
	{
		$dest_width = round($source_width * $dest_height / $source_height) ; 
		$dest_image = imageCreateTrueColor($dest_width, $dest_height);
	}

	imageCopyResampled($dest_image, $source_image, 0, 0, 0, 0, $dest_width, $dest_height, $source_width, $source_height);

	imageDestroy($source_image);
	return $dest_image;
}


function crop_image_to_image($source_image, $fixedwidth = 1, $dest_width, $dest_height)
{
	// otrqzva horizontalna lenta po sredata na kartinkata

	$source_width = imagesx($source_image);
	$source_height = imagesy($source_image);

	if($fixedwidth == 1) // Fixed width
	{
		$dest_width = $source_width;
		$source_x = 0;
		$source_y = ($source_height - $dest_height)/2;
		$dest_image = imageCreateTrueColor($dest_width, $dest_height);
	}
	else // Fixed height
	{
		$dest_height = $source_height;	
		$source_x = ($source_width - $dest_width)/2;
		$source_y = 0;
		$dest_image = imageCreateTrueColor($dest_width, $dest_height);
	}

	imagecopy($dest_image, $source_image, 0, 0, $source_x, $source_y, $dest_width, $dest_height);

	imagedestroy($source_image);
	return $dest_image;
}


function resize_to_fixed_area($source_file, $dest_file, $fixed_area = 23000) 
{
	$source_image = create_image($source_file);
	$source_width = imagesx($source_image);
	$source_height = imagesy($source_image);

	$source_area = $source_width * $source_height;

	if($source_area < $fixed_area) 
	{
		$dest_width = $source_width;
		$dest_height = $source_height;
	}
	else
	{
		$dest_width = round(sqrt($fixed_area * $source_width / $source_height));
		$dest_height = round(sqrt($fixed_area * $source_height / $source_width));
	}

	$dest_image = imagecreatetruecolor($dest_width, $dest_height);

	imagecopyresampled($dest_image, $source_image, 0, 0, 0, 0, $dest_width, $dest_height, $source_width, $source_height);
	imagejpeg($dest_image, $dest_file, 90);
	imagedestroy($source_image);
	imagedestroy($dest_image);

	return 1;
}


function convert_to_jpeg($source_file, $dest_file) 
{
	$source_image = create_image($source_file);
	if(!$source_image) return;

	$source_width = imagesx($source_image);
	$source_height = imagesy($source_image);

	$dest_width = $source_width;
	$dest_height = $source_height;
	$dest_image = imagecreatetruecolor($dest_width, $dest_height);

	imagecopyresampled($dest_image, $source_image, 0, 0, 0, 0, $dest_width, $dest_height, $source_width, $source_height);
	imagejpeg($dest_image, $dest_file, 100);
	imagedestroy($source_image);
	imagedestroy($dest_image);

	return 1;
}


function resize_and_crop($source_file, $dest_file, $dest_width, $dest_height) 
{
	$source_image = create_image($source_file);

	$source_width = imagesx($source_image);
	$source_height = imagesy($source_image);
		
	$relation_wh = $dest_width/$dest_height;
	$fixedwidth = ($source_width / $source_height > $relation_wh) ? 0 : 1;

	$resized_image = resize_image_to_image($source_image, $fixedwidth, $dest_width, $dest_height);
	$dest_image = crop_image_to_image($resized_image, $fixedwidth, $dest_width, $dest_height);
//	$dest_image = resize_image_to_image($source_image, $fixedwidth, $dest_width, $dest_height);

	imagejpeg($dest_image, $dest_file, 100);
}


function upload_picture($field_name, $pictures_dir, $id)
{
	if($_FILES[$field_name]['tmp_name']!= '')
	{
		$picture = $_FILES[$field_name]['name'];
		$pictureName = $id.".jpg";

		resize_to_fixed_area($_FILES[$field_name]['tmp_name'], "$pictures_dir/big/$pictureName", 480000);
		resize_to_fixed_area("$pictures_dir/big/$pictureName", "$pictures_dir/small/$pictureName");
	}

	return $picture;
}

function make_thumb( $image, $thumb, $max_x, $max_y, $ratio=1, $bigger=1 )
{
	preg_match( "'^(.*)\.(gif|jpe?g|png)$'i", $image, $ext );
	switch ( strtolower( $ext[2] ) )
	{
		case 'jpg' :
		case 'jpeg':
		 	$im  = imagecreatefromjpeg( $image );
			break;
		case 'gif' :
		 	$im  = imagecreatefromgif( $image );
			break;
		case 'png':
			$im  = imagecreatefrompng( $image );
			break;
		default:
			return false;
	}
  
	$x = imagesx( $im );
	$y = imagesy( $im );
	if ( $ratio )
	{
		if ( !$bigger && $max_x>$x && $max_y>$y )
		{
			imagejpeg( $im, $thumb, 100 );
			return 0;
		}
		if ( ( $max_x/$max_y )<( $x/$y ) )
		{
			$save = imagecreatetruecolor( $x/( $x/$max_x ), $y/( $x/$max_x ) );
		}
		else {
			$save = imagecreatetruecolor( $x/( $y/$max_y ), $y/( $y/$max_y ) );
		}
	}
	else
	{
		if ( !$bigger && $max_x>$x && $max_y>$y )
		{
			imagejpeg( $im, $thumb, 100 );
			return 0;
		}
		$save = imagecreatetruecolor( $max_x, $max_y );
	}
	imagecopyresampled( $save, $im, 0, 0, 0, 0, imagesx( $save ), imagesy( $save ), $x, $y);
	imagedestroy( $im );
	imagejpeg( $save, $thumb, 100 );
	imagedestroy( $save );
}

function imgToJPG( $image, $newImage )
{
	preg_match( "'^(.*)\.(gif|jpe?g|png)$'i", $image, $ext );
	switch ( strtolower( $ext[2] ) )
	{
		case 'jpg' :
		case 'jpeg':
		 	$im  = imagecreatefromjpeg( $image );
			break;
		case 'gif' :
		 	$im  = imagecreatefromgif( $image );
			break;
		case 'png':
			$im  = imagecreatefrompng( $image );
			break;
		default:
			return false;
	}
	
	$x = imagesx( $im );
	$y = imagesy( $im );
	$save = imagecreatetruecolor( $x, $y );
	imagecopyresampled( $save, $im, 0, 0, 0, 0, $x, $y, $x, $y);
	imagejpeg( $save, $newImage, 100 );
	imagedestroy( $im );
	imagedestroy( $save );
}

function crop_image($source, $dest, $nw, $nh) {
		   $size = getimagesize($source);
          $w = $size[0];
          $h = $size[1];

		  $simg = imagecreatefromjpeg($source);
          $dimg = imagecreatetruecolor($nw, $nh);
          $wm = $w/$nw;
          $hm = $h/$nh;
          $h_height = $nh/2;
          $w_height = $nw/2;
          if($w> $h) {
          $adjusted_width = $w / $hm;
          $half_width = $adjusted_width / 2;
          $int_width = $half_width - $w_height;
          imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
          } elseif(($w <$h) || ($w == $h)) {
          $adjusted_height = $h / $wm;
          $half_height = $adjusted_height / 2;
          $int_height = $half_height - $h_height;
          imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
	      } else {
          imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);
         }
          imagejpeg($dimg,$dest,100);
      }


function make_thumb_wt( $image, $thumb, $max_x, $max_y, $ratio=1, $bigger=1 )
{
	global $datadir;
	preg_match( "'^(.*)\.(gif|jpe?g|png)$'i", $image, $ext );
	switch ( strtolower( $ext[2] ) )
	{
		case 'jpg' :
		case 'jpeg':
		 	$im  = imagecreatefromjpeg( $image );
			break;
		case 'gif' :
		 	$im  = imagecreatefromgif( $image );
			break;
		case 'png':
			$im  = imagecreatefrompng( $image );
			break;
		default:
			return false;
	}
  
//	$WaterMark_Transparency = "15"; 
//	$WaterMark = imagecreatefrompng("$datadir/watermark/logo.png");
 
	$x = imagesx( $im );
	$y = imagesy( $im );
	if ( $ratio )
	{
		if ( !$bigger && $max_x>$x && $max_y>$y )
		{
			imagejpeg( $im, $thumb, 100 );
			return 0;
		}
		if ( ( $max_x/$max_y )<( $x/$y ) )
		{
			$save = imagecreatetruecolor( $x/( $x/$max_x ), $y/( $x/$max_x ) );
		}
		else {
			$save = imagecreatetruecolor( $x/( $y/$max_y ), $y/( $y/$max_y ) );
		}
	}
	else
	{
		if ( !$bigger && $max_x>$x && $max_y>$y )
		{
			imagejpeg( $im, $thumb, 100 );
			return 0;
		}
		$save = imagecreatetruecolor( $max_x, $max_y );
	}

imagecopyresampled( $save, $im, 0, 0, 0, 0, imagesx( $save ), imagesy( $save ), $x, $y);

//$WaterMark_width = imagesx($WaterMark); 
//$WaterMark_height = imagesy($WaterMark); 
//$MaterMark_x = (imagesx( $save ) - $WaterMark_width); 
//$MaterMark_y = (imagesy( $save ) - $WaterMark_height); 
//imagecopymerge($save, $WaterMark, $MaterMark_x, $MaterMark_y, 0, 0, $WaterMark_width, $WaterMark_height, $WaterMark_Transparency); 

	imagedestroy( $im );
	imagejpeg( $save, $thumb, 100 );
	imagedestroy( $save );
}



?>