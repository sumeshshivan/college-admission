<?php

	// Basic functions

function redirect_to( $location = NULL) {
	if ( $location != NULL) {
		header("location: {$location}");
		exit;
	}
}

function output_message( $message = "") {
	if (!empty($message)) {
		return "<p class=\"message\">{$message}</p>";
	} else {
		return "";
	}
}

function __autoload($class_name) {
	$class_name = strtolower( $class_name);
	$path = "../includes/{$class_name}.php";
	if(file_exists($path)) {
		require_once($path);
	} else {
		die("The file {$class_name}.php could not be found");
	}		
}

function resizejpeg($dir, $img, $max_w, $max_h, $th_w, $th_h) {
    // get original images width and height
    list($or_w, $or_h, $or_t) = getimagesize($dir .$img);

    // make sure image is a jpeg
    if ($or_t == 2) {
    
        // obtain the image's ratio
        $ratio = ($or_h / $or_w);

        // original image
        $or_image = imagecreatefromjpeg($dir .$img);

        // resize image
        if ($or_w > $max_w || $or_h > $max_h) {

            // first resize by width (less than $max_w)
            if ($or_w > $max_w) {
                $rs_w = $max_w;
                $rs_h = $ratio * $max_h;
            } else {
                $rs_w = $or_w;
                $rs_h = $or_h;
            }

            // then resize by height (less than $max_h)
            if ($rs_h > $max_h) {
                $rs_w = $max_w / $ratio;
                $rs_h = $max_h;
            }

            // copy old image to new image
            $rs_image = imagecreatetruecolor($rs_w, $rs_h);
            imagecopyresampled($rs_image, $or_image, 0, 0, 0, 0, $rs_w, $rs_h, $or_w, $or_h);
        } else {
            $rs_w = $or_w;
            $rs_h = $or_h;

            $rs_image = $or_image;
        }
    
        // generate resized image
        //imagejpeg($rs_image, $dir.$img, 100);

        
        $ratio = $rs_h/$rs_w;
       
        $rt = 4/3;

        $src_x = 0;
        $src_y = 0;

        if($ratio<$rt) {
        	$x = $rs_h/4;
	     	$new_w = round(3*$x);
	     	$new_h = round($rs_h);
        	$th_image = imagecreatetruecolor($new_w, $new_h);
        	$src_x = ($rs_w-$new_w)/2;

        }
        else {
        	$x = $rs_w/3;
        	$new_h = round(4*$x);
        	$new_w = round($rs_w);
        	$th_image = imagecreatetruecolor($new_w, $new_h);
        	$src_y = ($rs_h-$new_h)/2;
        }

        //$new_w = (($rs_w / 4));
        //$new_h = (($rs_h / 4));

        imagecopyresized($th_image, $rs_image, 0, 0, $src_x, $src_y, $new_w, $new_h,$new_w, $new_h);//, $rs_w, $rs_h);
        //imagecopyresized($th_image, $rs_image, 0, 0, $new_w, $new_h, $rs_w, $rs_h, $rs_w, $rs_h);

        // generate thumbnail
        imagejpeg($th_image, $dir . $img, 100);

        return true;
    } 
    
    // Image type was not jpeg!
    else {
        return false;
    }
}

?>