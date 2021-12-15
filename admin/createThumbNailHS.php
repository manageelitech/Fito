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
	$n_width=950;
	$n_height=350;
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
    $n_width=950;
    $n_height=450;
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
    // echo "Creating thumb nail.";

}
function createThumbnb($add,$timg,$type)
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
    $n_width=350;
    $n_height=164;
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
    // echo "Creating thumb nail.";

}
function createThumbsl($add,$timg,$type)
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
    $n_width=1920;
    $n_height=800;
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
    // echo "Creating thumb nail.";

}
function createThumbsup($add,$timg,$type)
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
    $n_width=750;
    $n_height=550;
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
    // echo "Creating thumb nail.";

}

function createThumbfdbk($add,$timg,$type)
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
    $n_width=80;
    $n_height=80;
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
    // echo "Creating thumb nail.";

}

function createThumbdistributor($add,$timg,$type)
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
    $n_width=200;
    $n_height=200;
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
    // echo "Creating thumb nail.";

}

function createThumbproducts($add,$timg,$type)
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
    $n_width=551;
    $n_height=483;
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
    // echo "Creating thumb nail.";

}
?>