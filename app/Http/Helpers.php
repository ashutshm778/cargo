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

<?php

if (!function_exists('compressImage')) {
    function compressImage($source, $destination, $quality) {
        // Get image info
        $imgInfo = getimagesize($source);
        $mime = $imgInfo['mime'];

        // Create a new image from file
        switch ($mime) {
            case 'image/jpeg':
                $image = @imagecreatefromjpeg($source);
                if ($image === false) {
                    return false;
                }
                imagejpeg($image, $destination, $quality);
                break;
            case 'image/png':
                $image = @imagecreatefrompng($source);
                if ($image === false) {
                    return false;
                }
                imagealphablending($image, false);
                imagesavealpha($image, true);
                $scaleQuality = round(($quality / 100) * 9);
                $invertScaleQuality = 9 - $scaleQuality;
                imagepng($image, $destination, $invertScaleQuality);
                break;
            case 'image/gif':
                $image = @imagecreatefromgif($source);
                if ($image === false) {
                    return false;
                }
                imagegif($image, $destination);
                break;
            default:
                return false; // Unsupported image type
        }

        // Free up memory
        imagedestroy($image);

        // Return compressed image
        return $destination;
    }
}

