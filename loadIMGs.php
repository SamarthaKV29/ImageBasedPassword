<?php
function loadImgs()
{
    $imgArr = null;
    $imgloc = "\\assets\\imgs\lock1\\";
    $handle = opendir(dirname("./") . $imgloc);
    $path = dirname("./") . $imgloc;
    $i = 1;
    while ($file = readdir($handle)) {
        if ($file != "." && $file != ".." && strstr($file, ".png") || strstr($file, ".jpg")) {
            $imgArr[$i++] = "<img class='pimgs animated zoomIn img-fluid rounded-30 m-1' id='pic" . $i . "' src='" . $path . $file . "' />";
        }
    }
    return $imgArr;
    //
}
