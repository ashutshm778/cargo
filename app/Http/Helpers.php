<?php

if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        $root = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        return $root;
    }
}

if (!function_exists('getFileBaseURL')) {
    function getFileBaseURL()
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return env('AWS_URL') . '/';
        } else {
            return getBaseURL() . 'public/';
        }
    }
}

if (!function_exists('compressImage')) {
 function compressImage($source, $destination, $quality) {
    // Get image info
    $imgInfo = getimagesize($source);
    $mime = $imgInfo['mime'];

    // Create a new image from file
    switch($mime){
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
           imagejpeg($image, $destination, $quality);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            imagealphablending($image, false);
            imagesavealpha($image, true);
            $scaleQuality = round((90/100) * 9);
                $invertScaleQuality = 9 - $scaleQuality;
                if (imagetypes() & IMG_PNG) {
                    imagepng($image, $destination, $invertScaleQuality);
                }
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            imagegif($image, $destination, $quality);
            break;
        default:
            $image = imagecreatefromjpeg($source);
           imagejpeg($image, $destination, $quality);
    }


    // Return compressed image
    return $destination;
  }
}
