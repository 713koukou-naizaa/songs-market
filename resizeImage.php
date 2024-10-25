<?php

function resizeImage($pFile, $pWidth, $pHeight)
{
    // get original image dimensions
    list($originalWidth, $originalHeight) = getimagesize($pFile);

    // calculate aspect ratio to fit image within desired dimensions
    $aspectRatio = $originalWidth / $originalHeight;
    if ($pWidth / $pHeight > $aspectRatio) {
        $pWidth = $pHeight * $aspectRatio;
    } else {
        $pHeight = $pWidth / $aspectRatio;
    }

    // create blank final image with desired dimensions
    $newImage = imagecreatetruecolor($pWidth, $pHeight);

    // load original image based
    $source = imagecreatefrompng($pFile);

    // copy & resize original image into new
    imagecopyresampled($newImage, $source,
    0, 0,
    0, 0,
    $pWidth, $pHeight,
    $originalWidth, $originalHeight);

    // output new image to browser
    header('Content-Type: image/png');
    imagepng($newImage);

    // free mem
    imagedestroy($newImage);
    imagedestroy($source);
}

$file = $_GET['file'];
$width = $_GET['width'];
$height = $_GET['height'];


resizeImage($file, $width, $height);


