<?php 

 function createThumb($add,$timg,$type)
 {
	 //echo "Creating thumb nail.";
	switch ($type) 
	{
  		case "image/gif":
   		 	$im=imagecreatefromgif($add);
   		 	break;
 		case "image/jpeg":
    		$im=imagecreatefromjpeg($add);
    		break;
  		case "image/jpg":
    		$im=imagecreatefromjpeg($add);
			break;
		case "image/png";
			$im=imagecreatefrompng($add);
			break;
		case "image/JPG";
			$im=imagecreatefromjpeg($add);
			break;
  		default:
    		echo "";
	}
	
	$width=ImageSx($im); // Original picture width is stored
	$height=ImageSy($im); // Original picture height is stored
	$n_width=400;
	$n_height=$height/($width / $n_width);
	$newimage=imagecreatetruecolor($n_width,$n_height);
	imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
	
	switch ($type) 
	{
  		case "image/gif":
   		 	imagegif($newimage,$timg);
   		 	break;
 		case "image/jpeg":
    		imagejpeg($newimage,$timg);
    		break;
  		case "image/jpg":
    		imagejpeg($newimage,$timg);
			break;
		case "image/png";
			imagepng($newimage,$timg);
			break;
		case "image/JPG";
			imagejpeg($newimage,$timg);
			break;
  		default:
    		
	}
	chmod("$timg",0777);
		// echo "Creating thumb nail.";
	 
 }
function createThumbs($add,$timg,$type)
{
    //echo "Creating thumb nail.";
    switch ($type)
    {
        case "image/gif":
            $im=imagecreatefromgif($add);
            break;
        case "image/jpeg":
            $im=imagecreatefromjpeg($add);
            break;
        case "image/jpg":
            $im=imagecreatefromjpeg($add);
            break;
        case "image/png";
            $im=imagecreatefrompng($add);
            break;
        case "image/JPG";
            $im=imagecreatefromjpeg($add);
            break;
        default:
            echo "";
    }

    $width=ImageSx($im); // Original picture width is stored
    $height=ImageSy($im); // Original picture height is stored
    $n_width=120;
    $n_height=120;
    $newimage=imagecreatetruecolor($n_width,$n_height);
    imagecopyresampled($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);

    switch ($type)
    {
        case "image/gif":
            imagegif($newimage,$timg);
            break;
        case "image/jpeg":
            imagejpeg($newimage,$timg,90);
            break;
        case "image/jpg":
            imagejpeg($newimage,$timg,90);
            break;
        case "image/png";
            imagepng($newimage,$timg);
            break;
        case "image/JPG";
            imagejpeg($newimage,$timg,90);
            break;
        default:

    }
    chmod("$timg",0777);
}
?>